<?php

/**
 * autoCursada actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoCursada
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoCursadaActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('cursada', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Cursada', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/cursada')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/cursada');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('cursada', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('cursada', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (CursadaPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Cursadas. Make sure they do not have any associated items.');
      return $this->forward('cursada', 'list');
    }

    return $this->redirect('cursada/list');
  }

  public function executeEdit($request)
  {
    $this->cursada = $this->getCursadaOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateCursadaFromRequest();

      try
      {
        $this->saveCursada($this->cursada);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Cursadas.');
        return $this->forward('cursada', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('cursada/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('cursada/list');
      }
      else
      {
        return $this->redirect('cursada/edit?id='.$this->cursada->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->cursada = CursadaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cursada);

    try
    {
      $this->deleteCursada($this->cursada);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Cursada. Make sure it does not have any associated items.');
      return $this->forward('cursada', 'list');
    }

    return $this->redirect('cursada/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->cursada = $this->getCursadaOrCreate();
    $this->updateCursadaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveCursada($cursada)
  {
    $cursada->save();

  }

  protected function deleteCursada($cursada)
  {
    $cursada->delete();
  }

  protected function updateCursadaFromRequest()
  {
    $cursada = $this->getRequestParameter('cursada');

    if (isset($cursada['alumno']))
    {
      $this->cursada->setAlumno($cursada['alumno']);
    }
    if (isset($cursada['fecha']))
    {
      if ($cursada['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cursada['fecha']))
          {
            $value = $dateFormat->format($cursada['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cursada['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cursada->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cursada->setFecha(null);
      }
    }
    if (isset($cursada['matricula']))
    {
      $this->cursada->setMatricula($cursada['matricula']);
    }
    if (isset($cursada['matricula']))
    {
      $this->cursada->setMatricula($cursada['matricula']);
    }
  }

  protected function getCursadaOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $cursada = new Cursada();
    }
    else
    {
      $cursada = CursadaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cursada);
    }

    return $cursada;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/cursada/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/cursada/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/cursada/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/cursada/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = CursadaPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/cursada/sort') == 'asc')
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
      'cursada{id}' => 'ID:',
      'cursada{alumno}' => 'Alumno:',
      'cursada{fecha}' => 'Fecha de Emisión:',
      'cursada{matricula}' => 'Matricula:',
      'cursada{matricula}' => 'Matricula:',
    );
  }
}
