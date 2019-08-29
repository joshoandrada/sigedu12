<?php

/**
 * llamadoacur actions.
 *
 * @package    alba
 * @subpackage llamadoacur
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class llamadoacurActions extends autollamadoacurActions
{

  public function executeIndex($request)
  {
    return $this->forward('llamadoacur', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Llamadoacur', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/llamadoacur')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/llamadoacur');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('llamadoacur', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('llamadoacur', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (LlamadoacurPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoacurs. Make sure they do not have any associated items.');
      return $this->forward('llamadoacur', 'list');
    }

    return $this->redirect('llamadoacur/list');
  }

  public function executeEdit($request)
  {
    $this->llamadoacur = $this->getLlamadoacurOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateLlamadoacurFromRequest();

      try
      {
        $this->saveLlamadoacur($this->llamadoacur);
        $this->guardarDato($this->llamadoacur);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Llamadoacurs.');
        return $this->forward('llamadoacur', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('llamadoacur/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('llamadoacur/list');
      }
      else
      {
        return $this->redirect('llamadoacur/edit?id='.$this->llamadoacur->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->llamadoacur = LlamadoacurPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->llamadoacur);

    try
    {
      $this->deleteLlamadoacur($this->llamadoacur);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoacur. Make sure it does not have any associated items.');
      return $this->forward('llamadoacur', 'list');
    }

    return $this->redirect('llamadoacur/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->llamadoacur = $this->getLlamadoacurOrCreate();
    $this->updateLlamadoacurFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveLlamadoacur($llamadoacur)
  {
    $llamadoacur->save();

  }

  protected function deleteLlamadoacur($llamadoacur)
  {
    $llamadoacur->delete();
  }

  protected function updateLlamadoacurFromRequest()
  {
    $llamadoacur = $this->getRequestParameter('llamadoacur');

    if (isset($llamadoacur['fecha_inicio']))
    {
      if ($llamadoacur['fecha_inicio'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($llamadoacur['fecha_inicio']))
          {
            $value = $dateFormat->format($llamadoacur['fecha_inicio'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $llamadoacur['fecha_inicio'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->llamadoacur->setFechaInicio($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->llamadoacur->setFechaInicio(null);
      }
    }
    if (isset($llamadoacur['fecha_final']))
    {
      if ($llamadoacur['fecha_final'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($llamadoacur['fecha_final']))
          {
            $value = $dateFormat->format($llamadoacur['fecha_final'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $llamadoacur['fecha_final'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->llamadoacur->setFechaFinal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->llamadoacur->setFechaFinal(null);
      }
    }
    if (isset($llamadoacur['turno']))
    {
      $this->llamadoacur->setTurno($llamadoacur['turno']);
    }
    if (isset($llamadoacur['llamado']))
    {
      $this->llamadoacur->setLlamado($llamadoacur['llamado']);
    }
    if (isset($llamadoacur['fk_llamadoscur_id']))
    {
    $this->llamadoacur->setFkLlamadoscurId($llamadoacur['fk_llamadoscur_id'] ? $llamadoacur['fk_llamadoscur_id'] : null);
    }
  }

  protected function getLlamadoacurOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $llamadoacur = new Llamadoacur();
    }
    else
    {
      $llamadoacur = LlamadoacurPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($llamadoacur);
    }

    return $llamadoacur;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/llamadoacur/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/llamadoacur/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/llamadoacur/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/llamadoacur/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = LlamadoacurPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/llamadoacur/sort') == 'asc')
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
      'llamadoacur{id}' => 'Id:',
      'llamadoacur{fecha_inicio}' => 'Fecha inicio:',
      'llamadoacur{fecha_final}' => 'Fecha final:',
      'llamadoacur{turno}' => 'Turno:',
      'llamadoacur{llamado}' => 'Llamado:',
      'llamadoacur{fk_llamadoscur_id}' => 'Fk llamadoscur:',
    );
  }

 protected function guardarDato($llamadoacur)
  {
 $h1= sfPropelFinder::from('Llamadoacur')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h1 as $alu)  
         {
	$alu->setFkLlamadoscurId($llamadoacur->getFkLlamadoscurId());
        $alu->save();
         } 

  }


}
