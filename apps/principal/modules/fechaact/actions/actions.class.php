<?php

/**
 * fechaact actions.
 *
 * @package    alba
 * @subpackage fechaact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class fechaactActions extends autofechaactActions
{
  public function executeIndex($request)
  {
    return $this->forward('fechaact', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/actividad/filters');

    // pager
    $this->pager = new sfPropelPager('Actividad', 8);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/actividad')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/actividad');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('fechaact', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('fechaact', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (ActividadPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Actividads. Make sure they do not have any associated items.');
      return $this->forward('fechaact', 'list');
    }

    return $this->redirect('fechaact/list');
  }

  public function executeEdit($request)
  {
    $this->actividad = $this->getActividadOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateActividadFromRequest();

      try
      {
        $this->saveActividad($this->actividad);
        $this->guardarfecha($this->actividad);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Actividads.');
        return $this->forward('fechaact', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fechaact/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fechaact/list');
      }
      else
      {
        return $this->redirect('fechaact/edit?id='.$this->actividad->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->actividad = ActividadPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->actividad);

    try
    {
      $this->deleteActividad($this->actividad);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Actividad. Make sure it does not have any associated items.');
      return $this->forward('fechaact', 'list');
    }

    return $this->redirect('fechaact/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->actividad = $this->getActividadOrCreate();
    $this->updateActividadFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveActividad($actividad)
  {
    $actividad->save();

  }

  protected function deleteActividad($actividad)
  {
    $actividad->delete();
  }

  protected function updateActividadFromRequest()
  {
    $actividad = $this->getRequestParameter('actividad');

    if (isset($actividad['fecha']))
    {
      if ($actividad['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($actividad['fecha']))
          {
            $value = $dateFormat->format($actividad['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $actividad['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->actividad->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->actividad->setFecha(null);
      }
    }
  }

  protected function getActividadOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $actividad = new Actividad();
    }
    else
    {
      $actividad = ActividadPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($actividad);
    }

    return $actividad;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/actividad/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/actividad');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/actividad/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/actividad/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/actividad/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/actividad/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/actividad/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nombre_is_empty']))
    {
      $criterion = $c->getNewCriterion(ActividadPeer::NOMBRE, '');
      $criterion->addOr($c->getNewCriterion(ActividadPeer::NOMBRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nombre']) && $this->filters['nombre'] !== '')
    {
      $c->add(ActividadPeer::NOMBRE, strtr($this->filters['nombre'], '*', '%'), Criteria::LIKE);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/actividad/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = ActividadPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/actividad/sort') == 'asc')
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
      'actividad{fecha}' => 'Fecha Acta:',
    );
  }
protected function guardarfecha($actividad)
  {

     $h= sfPropelFinder::from('Actividad')->
     where ('Id','like',$actividad->getId())->
     find();
     foreach ($h as $css)  
       {
        $fecha1=date("d-m-Y",strtotime($actividad->getFecha()));
       	$css->setFechaf($fecha1);
        $css->save();
       }


  }
}
