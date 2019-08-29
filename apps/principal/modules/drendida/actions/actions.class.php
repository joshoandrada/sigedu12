<?php

/**
 * drendida actions.
 *
 * @package    alba
 * @subpackage drendida
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class drendidaActions extends autodrendidaActions
{

  public function executeIndex($request)
  {
    return $this->forward('drendida', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/detallerendir/filters');

    // pager
    $this->pager = new sfPropelPager('Detallerendir', 8);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/detallerendir')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/detallerendir');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('drendida', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('drendida', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (DetallerendirPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Detallerendirs. Make sure they do not have any associated items.');
      return $this->forward('drendida', 'list');
    }

    return $this->redirect('drendida/list');
  }

  public function executeEdit($request)
  {
    $this->detallerendir = $this->getDetallerendirOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateDetallerendirFromRequest();

      try
      {
        $this->saveDetallerendir($this->detallerendir);
        $this->guardarnom1($this->detallerendir);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Detallerendirs.');
        return $this->forward('drendida', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('drendida/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('drendida/list');
      }
      else
      {
        return $this->redirect('drendida/edit?id='.$this->detallerendir->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->detallerendir = DetallerendirPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->detallerendir);

    try
    {
      $this->deleteDetallerendir($this->detallerendir);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Detallerendir. Make sure it does not have any associated items.');
      return $this->forward('drendida', 'list');
    }

    return $this->redirect('drendida/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->detallerendir = $this->getDetallerendirOrCreate();
    $this->updateDetallerendirFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveDetallerendir($detallerendir)
  {
    $detallerendir->save();

  }

  protected function deleteDetallerendir($detallerendir)
  {
    $detallerendir->delete();
  }

  protected function updateDetallerendirFromRequest()
  {
    $detallerendir = $this->getRequestParameter('detallerendir');

    if (isset($detallerendir['result']))
    {
      $this->detallerendir->setResult($detallerendir['result']);
    }
    if (isset($detallerendir['libro']))
    {
      $this->detallerendir->setLibro($detallerendir['libro']);
    }
    if (isset($detallerendir['folio']))
    {
      $this->detallerendir->setFolio($detallerendir['folio']);
    }
    if (isset($detallerendir['fecha']))
    {
      if ($detallerendir['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($detallerendir['fecha']))
          {
            $value = $dateFormat->format($detallerendir['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $detallerendir['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->detallerendir->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->detallerendir->setFecha(null);
      }
    }
    if (isset($detallerendir['fk_dcursada_id']))
    {
    $this->detallerendir->setFkDcursadaId($detallerendir['fk_dcursada_id'] ? $detallerendir['fk_dcursada_id'] : null);
    }
  }

  protected function getDetallerendirOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $detallerendir = new Detallerendir();
    }
    else
    {
      $detallerendir = DetallerendirPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($detallerendir);
    }

    return $detallerendir;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/detallerendir/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/detallerendir');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/detallerendir/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/detallerendir/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/detallerendir/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/detallerendir/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/detallerendir/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['libro_is_empty']))
    {
      $criterion = $c->getNewCriterion(DetallerendirPeer::LIBRO, '');
      $criterion->addOr($c->getNewCriterion(DetallerendirPeer::LIBRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['libro']) && $this->filters['libro'] !== '')
    {
      $c->add(DetallerendirPeer::LIBRO, $this->filters['libro']);
    }
    if (isset($this->filters['result_is_empty']))
    {
      $criterion = $c->getNewCriterion(DetallerendirPeer::RESULT, '');
      $criterion->addOr($c->getNewCriterion(DetallerendirPeer::RESULT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['result']) && $this->filters['result'] !== '')
    {
      $c->add(DetallerendirPeer::RESULT, $this->filters['result']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/detallerendir/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = DetallerendirPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/detallerendir/sort') == 'asc')
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
      'detallerendir{result}' => 'Nota:',
      'detallerendir{libro}' => 'Libro:',
      'detallerendir{folio}' => 'Folio:',
      'detallerendir{fecha}' => 'Fecha:',
      'detallerendir{fk_dcursada_id}' => 'Estado:',
    );
  }
//  public function executeEdit($request)
//  {
//    $this->detallerendir = $this->getDetallerendirOrCreate();

//    if ($request->isMethod('post'))
//    {
//      $this->updateDetallerendirFromRequest();

//      try
//      {
//        $this->saveDetallerendir($this->detallerendir);
//        $this->guardarnom1($this->detallerendir);
//      }

protected function guardarnom1($detallerendir)
  {

  	$h1= sfPropelFinder::from('Estadomateren')->
     where ('Id','like',$detallerendir->getFkDcursadaId())->
     find();
     foreach ($h1 as $css1)  
       {
       	$desc=$css1->getNombre();
       }

  	$h= sfPropelFinder::from('Detallerendir')->
     where ('Id','like',$detallerendir->getId())->
     find();
     foreach ($h as $css)  
       {
       	$css->setEstado($desc);
        $css->save();
       }

  }	

}
