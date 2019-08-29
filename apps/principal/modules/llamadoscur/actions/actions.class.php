<?php

/**
 * llamadoscur actions.
 *
 * @package    alba
 * @subpackage llamadoscur
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class llamadoscurActions extends autollamadoscurActions
{

  public function executeIndex($request)
  {
    return $this->forward('llamadoscur', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Llamadoscur', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/llamadoscur')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/llamadoscur');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('llamadoscur', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('llamadoscur', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (LlamadoscurPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoscurs. Make sure they do not have any associated items.');
      return $this->forward('llamadoscur', 'list');
    }

    return $this->redirect('llamadoscur/list');
  }

  public function executeEdit($request)
  {
    $this->llamadoscur = $this->getLlamadoscurOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateLlamadoscurFromRequest();

      try
      {
        $this->saveLlamadoscur($this->llamadoscur);
        $this->guardar1($this->llamadoscur);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Llamadoscurs.');
        return $this->forward('llamadoscur', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('llamadoscur/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('llamadoscur/list');
      }
      else
      {
        return $this->redirect('llamadoscur/edit?id='.$this->llamadoscur->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->llamadoscur = LlamadoscurPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->llamadoscur);

    try
    {
      $this->deleteLlamadoscur($this->llamadoscur);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoscur. Make sure it does not have any associated items.');
      return $this->forward('llamadoscur', 'list');
    }

    return $this->redirect('llamadoscur/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->llamadoscur = $this->getLlamadoscurOrCreate();
    $this->updateLlamadoscurFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveLlamadoscur($llamadoscur)
  {
    $llamadoscur->save();

  }

  protected function deleteLlamadoscur($llamadoscur)
  {
    $llamadoscur->delete();
  }

  protected function updateLlamadoscurFromRequest()
  {
    $llamadoscur = $this->getRequestParameter('llamadoscur');

    if (isset($llamadoscur['llamado']))
    {
      $this->llamadoscur->setLlamado($llamadoscur['llamado']);
    }
    if (isset($llamadoscur['fecha_inicio']))
    {
      if ($llamadoscur['fecha_inicio'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($llamadoscur['fecha_inicio']))
          {
            $value = $dateFormat->format($llamadoscur['fecha_inicio'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $llamadoscur['fecha_inicio'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->llamadoscur->setFechaInicio($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->llamadoscur->setFechaInicio(null);
      }
    }
    if (isset($llamadoscur['fecha_final']))
    {
      if ($llamadoscur['fecha_final'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($llamadoscur['fecha_final']))
          {
            $value = $dateFormat->format($llamadoscur['fecha_final'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $llamadoscur['fecha_final'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->llamadoscur->setFechaFinal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->llamadoscur->setFechaFinal(null);
      }
    }
  }

  protected function getLlamadoscurOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $llamadoscur = new Llamadoscur();
    }
    else
    {
      $llamadoscur = LlamadoscurPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($llamadoscur);
    }

    return $llamadoscur;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/llamadoscur/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/llamadoscur/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/llamadoscur/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/llamadoscur/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = LlamadoscurPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/llamadoscur/sort') == 'asc')
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
      'llamadoscur{llamado}' => 'Llamado:',
      'llamadoscur{fecha_inicio}' => 'Fecha inicio:',
      'llamadoscur{fecha_final}' => 'Fecha final:',
    );
  }

protected function guardar1($llamadoscur)
  {
    $h1= sfPropelFinder::from('Llamadoscur')->
     where ('Id','like',$llamadoscur->getId())->
     find();
     
     foreach ($h1 as $css1)  
       {
        $fecha1=date("d-m-Y",strtotime($llamadoscur->getFechaInicio()));
        $fecha2=date("d-m-Y",strtotime($llamadoscur->getFechaFinal()));
        $css1->setFechai($fecha1);
       	$css1->setFechaf($fecha2);
        $css1->save();
        }
   }

}
