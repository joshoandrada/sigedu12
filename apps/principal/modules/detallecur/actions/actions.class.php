<?php

/**
 * detallecur actions.
 *
 * @package    alba
 * @subpackage detallecur
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class detallecurActions extends autodetallecurActions
{
  public function executeIndex($request)
  {
    return $this->forward('detallecur', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/detallecursada/filters');

    // pager
    $this->pager = new sfPropelPager('Detallecursada', 10);
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
    return $this->forward('detallecur', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('detallecur', 'edit');
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
      return $this->forward('detallecur', 'list');
    }

    return $this->redirect('detallecur/list');
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
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Detallecursadas.');
        return $this->forward('detallecur', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('detallecur/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('detallecur/list');
      }
      else
      {
        return $this->redirect('detallecur/edit?id='.$this->detallecursada->getId());
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
      return $this->forward('detallecur', 'list');
    }

    return $this->redirect('detallecur/list');
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
        if (isset($filters['fecha']['from']) && $filters['fecha']['from'] !== '')
        {
          $filters['fecha']['from'] = $this->getContext()->getI18N()->getTimestampForCulture($filters['fecha']['from'], $this->getUser()->getCulture());
        }
        if (isset($filters['fecha']['to']) && $filters['fecha']['to'] !== '')
        {
          $filters['fecha']['to'] = $this->getContext()->getI18N()->getTimestampForCulture($filters['fecha']['to'], $this->getUser()->getCulture());
        }
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
    if (isset($this->filters['fk_alumno_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(DetallecursadaPeer::FK_ALUMNO_ID, '');
      $criterion->addOr($c->getNewCriterion(DetallecursadaPeer::FK_ALUMNO_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fk_alumno_id']) && $this->filters['fk_alumno_id'] !== '')
    {
      $c->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->filters['fk_alumno_id']);
    }
    if (isset($this->filters['fecha_is_empty']))
    {
      $criterion = $c->getNewCriterion(DetallecursadaPeer::FECHA, '');
      $criterion->addOr($c->getNewCriterion(DetallecursadaPeer::FECHA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecha']))
    {
      if (isset($this->filters['fecha']['from']) && $this->filters['fecha']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(DetallecursadaPeer::FECHA, date('Y-m-d', $this->filters['fecha']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecha']['to']) && $this->filters['fecha']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(DetallecursadaPeer::FECHA, date('Y-m-d', $this->filters['fecha']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(DetallecursadaPeer::FECHA, date('Y-m-d', $this->filters['fecha']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
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
    );
  }

}
