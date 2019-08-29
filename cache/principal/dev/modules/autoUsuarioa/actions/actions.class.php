<?php

/**
 * autoUsuarioa actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoUsuarioa
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoUsuarioaActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('usuarioa', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/usuario/filters');

    // pager
    $this->pager = new sfPropelPager('Usuario', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/usuario')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/usuario');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('usuarioa', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('usuarioa', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (UsuarioPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Usuarios. Make sure they do not have any associated items.');
      return $this->forward('usuarioa', 'list');
    }

    return $this->redirect('usuarioa/list');
  }

  public function executeEdit($request)
  {
    $this->usuario = $this->getUsuarioOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateUsuarioFromRequest();

      try
      {
        $this->saveUsuario($this->usuario);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Usuarios.');
        return $this->forward('usuarioa', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('usuarioa/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('usuarioa/list');
      }
      else
      {
        return $this->redirect('usuarioa/edit?id='.$this->usuario->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->usuario = UsuarioPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->usuario);

    try
    {
      $this->deleteUsuario($this->usuario);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Usuario. Make sure it does not have any associated items.');
      return $this->forward('usuarioa', 'list');
    }

    return $this->redirect('usuarioa/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->usuario = $this->getUsuarioOrCreate();
    $this->updateUsuarioFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveUsuario($usuario)
  {
    $usuario->save();

  }

  protected function deleteUsuario($usuario)
  {
    $usuario->delete();
  }

  protected function updateUsuarioFromRequest()
  {
    $usuario = $this->getRequestParameter('usuario');

    if (isset($usuario['usuario']))
    {
      $this->usuario->setUsuario($usuario['usuario']);
    }
    if (isset($usuario['clave']))
    {
      $this->usuario->setClave($usuario['clave']);
    }
    $this->usuario->setCorreoPublico(isset($usuario['correo_publico']) ? $usuario['correo_publico'] : 0);
    if (isset($usuario['email']))
    {
      $this->usuario->setEmail($usuario['email']);
    }
    $this->usuario->setActivo(isset($usuario['activo']) ? $usuario['activo'] : 0);
    if (isset($usuario['fk_establecimiento_id']))
    {
    $this->usuario->setFkEstablecimientoId($usuario['fk_establecimiento_id'] ? $usuario['fk_establecimiento_id'] : null);
    }
    if (isset($usuario['seguridad_pregunta']))
    {
      $this->usuario->setSeguridadPregunta($usuario['seguridad_pregunta']);
    }
    if (isset($usuario['seguridad_respuesta']))
    {
      $this->usuario->setSeguridadRespuesta($usuario['seguridad_respuesta']);
    }
  }

  protected function getUsuarioOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $usuario = new Usuario();
    }
    else
    {
      $usuario = UsuarioPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($usuario);
    }

    return $usuario;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/usuario/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/usuario');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/usuario/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/usuario/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/usuario/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/usuario/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/usuario/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['usuario_is_empty']))
    {
      $criterion = $c->getNewCriterion(UsuarioPeer::USUARIO, '');
      $criterion->addOr($c->getNewCriterion(UsuarioPeer::USUARIO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['usuario']) && $this->filters['usuario'] !== '')
    {
      $c->add(UsuarioPeer::USUARIO, strtr($this->filters['usuario'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['fk_establecimiento_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(UsuarioPeer::FK_ESTABLECIMIENTO_ID, '');
      $criterion->addOr($c->getNewCriterion(UsuarioPeer::FK_ESTABLECIMIENTO_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fk_establecimiento_id']) && $this->filters['fk_establecimiento_id'] !== '')
    {
      $c->add(UsuarioPeer::FK_ESTABLECIMIENTO_ID, $this->filters['fk_establecimiento_id']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/usuario/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = UsuarioPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/usuario/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'usuario{usuario}' => 'Usuario:',
      'usuario{clave}' => 'Clave:',
      'usuario{correo_publico}' => 'correo publico?:',
      'usuario{email}' => 'email:',
      'usuario{activo}' => 'esta activo?:',
      'usuario{fecha_creado}' => 'Creado:',
      'usuario{fecha_actualizado}' => 'Modificado:',
      'usuario{fk_establecimiento_id}' => 'Establecimiento:',
      'usuario{seguridad_pregunta}' => 'Pregunta:',
      'usuario{seguridad_respuesta}' => 'Respuesta:',
    );
  }
}
