<?php

/**
 * alumno3 actions.
 *
 * @package    alba
 * @subpackage alumno3
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class alumno3Actions extends autoalumno3Actions
{
  public function executeIndex($request)
  {
    return $this->forward('alumno3', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/alumno/filters');

    // pager
    $this->pager = new sfPropelPager('Alumno', 8);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/alumno')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/alumno');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('alumno3', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('alumno3', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (AlumnoPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Alumnos. Make sure they do not have any associated items.');
      return $this->forward('alumno3', 'list');
    }

    return $this->redirect('alumno3/list');
  }

  public function executeEdit($request)
  {
    $this->alumno = $this->getAlumnoOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateAlumnoFromRequest();

      try
      {
        $this->saveAlumno($this->alumno);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Alumnos.');
        return $this->forward('alumno3', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('alumno3/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('alumno3/list');
      }
      else
      {
        return $this->redirect('alumno3/edit?id='.$this->alumno->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->alumno);

    try
    {
      $this->deleteAlumno($this->alumno);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Alumno. Make sure it does not have any associated items.');
      return $this->forward('alumno3', 'list');
    }

    return $this->redirect('alumno3/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->alumno = $this->getAlumnoOrCreate();
    $this->updateAlumnoFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveAlumno($alumno)
  {
    $alumno->save();

  }

  protected function deleteAlumno($alumno)
  {
    $alumno->delete();
  }

  protected function updateAlumnoFromRequest()
  {
    $alumno = $this->getRequestParameter('alumno');

    if (isset($alumno['apellido']))
    {
      $this->alumno->setApellido($alumno['apellido']);
    }
    if (isset($alumno['nombre']))
    {
      $this->alumno->setNombre($alumno['nombre']);
    }
    if (isset($alumno['fk_tipodocumento_id']))
    {
    $this->alumno->setFkTipodocumentoId($alumno['fk_tipodocumento_id'] ? $alumno['fk_tipodocumento_id'] : null);
    }
    if (isset($alumno['nro_documento']))
    {
      $this->alumno->setNroDocumento($alumno['nro_documento']);
    }
    $this->alumno->setAdeuda(isset($alumno['adeuda']) ? $alumno['adeuda'] : 0);
  }

  protected function getAlumnoOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $alumno = new Alumno();
    }
    else
    {
      $alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($alumno);
    }

    return $alumno;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/alumno/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/alumno/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/alumno/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/alumno/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nro_documento_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::NRO_DOCUMENTO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::NRO_DOCUMENTO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nro_documento']) && $this->filters['nro_documento'] !== '')
    {
      $c->add(AlumnoPeer::NRO_DOCUMENTO, strtr($this->filters['nro_documento'], '*', '%'), Criteria::LIKE);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/alumno/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = AlumnoPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/alumno/sort') == 'asc')
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
      'alumno{apellido}' => 'Apellido:',
      'alumno{nombre}' => 'Nombres:',
      'alumno{fk_tipodocumento_id}' => 'Tipo de Documento:',
      'alumno{nro_documento}' => 'Nro. Documento:',
      'alumno{adeuda}' => 'Pag&oacute;?:',
    );
  }

 public function executeTodos()
 {
     $h= sfPropelFinder::from('Alumno')->
     where ('Id','>',0)->
     find();
     foreach ($h as $css)  
       {        
	$css->setAdeuda(0);
        $css->save();
        }
     return $this->redirect('alumno3/list');
  }

 public function executeTodos1()
 {
     $h= sfPropelFinder::from('Alumno')->
     where ('Id','>',0)->
     find();
     foreach ($h as $css)  
       {        
	$css->setAdeuda(1);
        $css->save();
        }
     return $this->redirect('alumno3/list');
  }

}
