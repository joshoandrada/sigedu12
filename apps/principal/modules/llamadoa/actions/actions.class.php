<?php

/**
 * llamadoa actions.
 *
 * @package    alba
 * @subpackage llamadoa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class llamadoaActions extends autollamadoaActions
{
  public function executeIndex($request)
  {
    return $this->forward('llamadoa', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Llamadoa', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/llamadoa')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/llamadoa');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('llamadoa', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('llamadoa', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (LlamadoaPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoas. Make sure they do not have any associated items.');
      return $this->forward('llamadoa', 'list');
    }

    return $this->redirect('llamadoa/list');
  }

  public function executeEdit($request)
  {
    $this->llamadoa = $this->getLlamadoaOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateLlamadoaFromRequest();

      try
      {
        $this->saveLlamadoa($this->llamadoa);
        $this->guardarDato($this->llamadoa);

      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Llamadoas.');
        return $this->forward('llamadoa', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('llamadoa/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('llamadoa/list');
      }
      else
      {
        return $this->redirect('llamadoa/edit?id='.$this->llamadoa->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->llamadoa = LlamadoaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->llamadoa);

    try
    {
      $this->deleteLlamadoa($this->llamadoa);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoa. Make sure it does not have any associated items.');
      return $this->forward('llamadoa', 'list');
    }

    return $this->redirect('llamadoa/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->llamadoa = $this->getLlamadoaOrCreate();
    $this->updateLlamadoaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveLlamadoa($llamadoa)
  {
    $llamadoa->save();

  }

  protected function deleteLlamadoa($llamadoa)
  {
    $llamadoa->delete();
  }

  protected function updateLlamadoaFromRequest()
  {
    $llamadoa = $this->getRequestParameter('llamadoa');

    if (isset($llamadoa['fk_llamados_id']))
    {
    $this->llamadoa->setFkLlamadosId($llamadoa['fk_llamados_id'] ? $llamadoa['fk_llamados_id'] : null);
    }
  }

  protected function getLlamadoaOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $llamadoa = new Llamadoa();
    }
    else
    {
      $llamadoa = LlamadoaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($llamadoa);
    }

    return $llamadoa;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/llamadoa/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/llamadoa/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/llamadoa/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/llamadoa/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = LlamadoaPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/llamadoa/sort') == 'asc')
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
      'llamadoa{fk_llamados_id}' => 'Llamado Actual:',
    );
  }

 protected function guardarDato($llamadoa)
  {
 $h1= sfPropelFinder::from('Llamadoa')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h1 as $alu)  
         {
	$alu->setFkLlamadosId($llamadoa->getFkLlamadosId());
        $alu->save();
         } 

  }


}
