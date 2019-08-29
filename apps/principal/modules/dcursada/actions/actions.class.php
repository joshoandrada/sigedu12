<?php

/**
 * dcursada actions.
 *
 * @package    alba
 * @subpackage dcursada
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class dcursadaActions extends autodcursadaActions
{
  public function executeIndex($request)
  {
    return $this->forward('dcursada', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/detallecursada/filters');

    // pager
    $this->pager = new sfPropelPager('Detallecursada', 8);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/detallecursada')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/detallecursada');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('dcursada', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('dcursada', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (DetallecursadaPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Detallecursadas. Make sure they do not have any associated items.');
      return $this->forward('dcursada', 'list');
    }

    return $this->redirect('dcursada/list');
  }

  public function executeEdit($request)
  {
    $this->detallecursada = $this->getDetallecursadaOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateDetallecursadaFromRequest();

      try
      {
        $this->saveDetallecursada($this->detallecursada);
         $this->guardarnom($this->detallecursada);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Detallecursadas.');
        return $this->forward('dcursada', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('dcursada/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('dcursada/list');
      }
      else
      {
        return $this->redirect('dcursada/edit?id='.$this->detallecursada->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->detallecursada = DetallecursadaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->detallecursada);

    try
    {
      $this->deleteDetallecursada($this->detallecursada);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Detallecursada. Make sure it does not have any associated items.');
      return $this->forward('dcursada', 'list');
    }

    return $this->redirect('dcursada/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->detallecursada = $this->getDetallecursadaOrCreate();
    $this->updateDetallecursadaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveDetallecursada($detallecursada)
  {
    $detallecursada->save();

  }

  protected function deleteDetallecursada($detallecursada)
  {
    $detallecursada->delete();
  }

  protected function updateDetallecursadaFromRequest()
  {
    $detallecursada = $this->getRequestParameter('detallecursada');

    if (isset($detallecursada['result']))
    {
      $this->detallecursada->setResult($detallecursada['result']);
    }
    if (isset($detallecursada['fecha']))
    {
      if ($detallecursada['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($detallecursada['fecha']))
          {
            $value = $dateFormat->format($detallecursada['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $detallecursada['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->detallecursada->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->detallecursada->setFecha(null);
      }
    }
    if (isset($detallecursada['libro']))
    {
      $this->detallecursada->setLibro($detallecursada['libro']);
    }
    if (isset($detallecursada['folio']))
    {
      $this->detallecursada->setFolio($detallecursada['folio']);
    }
    if (isset($detallecursada['fk_dcursada_id']))
    {
    $this->detallecursada->setFkDcursadaId($detallecursada['fk_dcursada_id'] ? $detallecursada['fk_dcursada_id'] : null);
    }
  }

  protected function getDetallecursadaOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $detallecursada = new Detallecursada();
    }
    else
    {
      $detallecursada = DetallecursadaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($detallecursada);
    }

    return $detallecursada;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/detallecursada/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/detallecursada');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/detallecursada/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/detallecursada/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/detallecursada/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/detallecursada/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/detallecursada/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nombre_is_empty']))
    {
      $criterion = $c->getNewCriterion(DetallecursadaPeer::NOMBRE, '');
      $criterion->addOr($c->getNewCriterion(DetallecursadaPeer::NOMBRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nombre']) && $this->filters['nombre'] !== '')
    {
      $c->add(DetallecursadaPeer::NOMBRE, $this->filters['nombre']);
    }
    if (isset($this->filters['result_is_empty']))
    {
      $criterion = $c->getNewCriterion(DetallecursadaPeer::RESULT, '');
      $criterion->addOr($c->getNewCriterion(DetallecursadaPeer::RESULT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['result']) && $this->filters['result'] !== '')
    {
      $c->add(DetallecursadaPeer::RESULT, $this->filters['result']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/detallecursada/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = DetallecursadaPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/detallecursada/sort') == 'asc')
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
      'detallecursada{result}' => 'Resultado:',
      'detallecursada{fecha}' => 'Fecha:',
      'detallecursada{libro}' => 'Libro:',
      'detallecursada{folio}' => 'Folio:',
      'detallecursada{fk_dcursada_id}' => 'Estado:',
    );
  }
//// va siempre /////////////

//  public function executeEdit($request)
//  {
//    $this->detallecursada = $this->getDetallecursadaOrCreate();
//    if ($request->isMethod('post'))
//    {
//      $this->updateDetallecursadaFromRequest();
//      try
//      {
//        $this->saveDetallecursada($this->detallecursada);
//        $this->guardarnom($this->detallecursada);

//      }

protected function guardarnom($detallecursada)
  {

  	$h1= sfPropelFinder::from('Estadomate')->
     where ('Id','like',$detallecursada->getFkDcursadaId())->
     find();
     foreach ($h1 as $css1)  
       {
       	$desc=$css1->getNombre();
       }

  	$h= sfPropelFinder::from('Detallecursada')->
     where ('Id','like',$detallecursada->getId())->
     find();
     foreach ($h as $css)  
       {
       	$css->setEstado($desc);
        $css->save();
       }

  }	

}
