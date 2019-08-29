<?php

/**
 * llamados actions.
 *
 * @package    alba
 * @subpackage llamados
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class llamadosActions extends autollamadosActions
{

  public function executeIndex($request)
  {
    return $this->forward('llamados', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Llamados', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/llamados')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/llamados');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('llamados', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('llamados', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (LlamadosPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamadoss. Make sure they do not have any associated items.');
      return $this->forward('llamados', 'list');
    }

    return $this->redirect('llamados/list');
  }

  public function executeEdit($request)
  {
    $this->llamados = $this->getLlamadosOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateLlamadosFromRequest();

      try
      {
        $this->saveLlamados($this->llamados);
        $this->guardar1($this->llamados);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Llamadoss.');
        return $this->forward('llamados', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('llamados/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('llamados/list');
      }
      else
      {
        return $this->redirect('llamados/edit?id='.$this->llamados->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->llamados = LlamadosPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->llamados);

    try
    {
      $this->deleteLlamados($this->llamados);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Llamados. Make sure it does not have any associated items.');
      return $this->forward('llamados', 'list');
    }

    return $this->redirect('llamados/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->llamados = $this->getLlamadosOrCreate();
    $this->updateLlamadosFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveLlamados($llamados)
  {
    $llamados->save();

  }

  protected function deleteLlamados($llamados)
  {
    $llamados->delete();
  }

  protected function updateLlamadosFromRequest()
  {
    $llamados = $this->getRequestParameter('llamados');

    if (isset($llamados['turno']))
    {
      $this->llamados->setTurno($llamados['turno']);
    }
    if (isset($llamados['fecha_inicio']))
    {
      if ($llamados['fecha_inicio'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($llamados['fecha_inicio']))
          {
            $value = $dateFormat->format($llamados['fecha_inicio'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $llamados['fecha_inicio'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->llamados->setFechaInicio($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->llamados->setFechaInicio(null);
      }
    }
    if (isset($llamados['fecha_final']))
    {
      if ($llamados['fecha_final'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($llamados['fecha_final']))
          {
            $value = $dateFormat->format($llamados['fecha_final'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $llamados['fecha_final'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->llamados->setFechaFinal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->llamados->setFechaFinal(null);
      }
    }
    if (isset($llamados['llamado']))
    {
      $this->llamados->setLlamado($llamados['llamado']);
    }
  }

  protected function getLlamadosOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $llamados = new Llamados();
    }
    else
    {
      $llamados = LlamadosPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($llamados);
    }

    return $llamados;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/llamados/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/llamados/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/llamados/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/llamados/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = LlamadosPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/llamados/sort') == 'asc')
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
      'llamados{turno}' => 'Turno:',
      'llamados{fecha_inicio}' => 'Fecha inicio:',
      'llamados{fecha_final}' => 'Fecha final:',
      'llamados{llamado}' => 'Llamado:',
    );
  }

protected function guardar1($llamados)
  {

    $h1= sfPropelFinder::from('Llamados')->
     where ('Id','like',$llamados->getId())->
     find();
     
     foreach ($h1 as $css1)  
       {
        $fecha1=date("d-m-Y",strtotime($llamados->getFechaInicio()));
        $fecha2=date("d-m-Y",strtotime($llamados->getFechaFinal()));
        $css1->setFechai($fecha1);
       	$css1->setFechaf($fecha2);
        $css1->save();
        }
  }	









}
