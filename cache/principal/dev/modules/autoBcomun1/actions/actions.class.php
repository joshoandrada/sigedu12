<?php

/**
 * autoBcomun1 actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoBcomun1
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoBcomun1Actions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('bcomun1', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Comun', 13);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/comun')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/comun');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('bcomun1', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('bcomun1', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (ComunPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Comuns. Make sure they do not have any associated items.');
      return $this->forward('bcomun1', 'list');
    }

    return $this->redirect('bcomun1/list');
  }

  public function executeEdit($request)
  {
    $this->comun = $this->getComunOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateComunFromRequest();

      try
      {
        $this->saveComun($this->comun);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Comuns.');
        return $this->forward('bcomun1', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('bcomun1/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('bcomun1/list');
      }
      else
      {
        return $this->redirect('bcomun1/edit?id='.$this->comun->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->comun = ComunPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->comun);

    try
    {
      $this->deleteComun($this->comun);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Comun. Make sure it does not have any associated items.');
      return $this->forward('bcomun1', 'list');
    }

    return $this->redirect('bcomun1/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->comun = $this->getComunOrCreate();
    $this->updateComunFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveComun($comun)
  {
    $comun->save();

  }

  protected function deleteComun($comun)
  {
    $comun->delete();
  }

  protected function updateComunFromRequest()
  {
    $comun = $this->getRequestParameter('comun');

    if (isset($comun['fk_establecimiento_id']))
    {
    $this->comun->setFkEstablecimientoId($comun['fk_establecimiento_id'] ? $comun['fk_establecimiento_id'] : null);
    }
    if (isset($comun['fk_carrera_id']))
    {
    $this->comun->setFkCarreraId($comun['fk_carrera_id'] ? $comun['fk_carrera_id'] : null);
    }
    if (isset($comun['nombre']))
    {
      $this->comun->setNombre($comun['nombre']);
    }
    if (isset($comun['descripcion']))
    {
      $this->comun->setDescripcion($comun['descripcion']);
    }
    if (isset($comun['orden']))
    {
      $this->comun->setOrden($comun['orden']);
    }
    if (isset($comun['anio']))
    {
      $this->comun->setAnio($comun['anio']);
    }
  }

  protected function getComunOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $comun = new Comun();
    }
    else
    {
      $comun = ComunPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($comun);
    }

    return $comun;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/comun/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/comun/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/comun/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/comun/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = ComunPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/comun/sort') == 'asc')
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
      'comun{id}' => 'ID:',
      'comun{fk_establecimiento_id}' => 'Fk establecimiento:',
      'comun{fk_carrera_id}' => 'Fk carrera:',
      'comun{nombre}' => 'Descripción:',
      'comun{descripcion}' => 'Carrera:',
      'comun{orden}' => 'Orden:',
      'comun{anio}' => 'Año:',
    );
  }
}
