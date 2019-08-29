<?php

/**
 * autoRendir actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoRendir
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoRendirActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('rendir', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Rendida', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/rendida')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/rendida');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('rendir', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('rendir', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (RendidaPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Rendidas. Make sure they do not have any associated items.');
      return $this->forward('rendir', 'list');
    }

    return $this->redirect('rendir/list');
  }

  public function executeEdit($request)
  {
    $this->rendida = $this->getRendidaOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateRendidaFromRequest();

      try
      {
        $this->saveRendida($this->rendida);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Rendidas.');
        return $this->forward('rendir', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('rendir/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('rendir/list');
      }
      else
      {
        return $this->redirect('rendir/edit?id='.$this->rendida->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->rendida = RendidaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->rendida);

    try
    {
      $this->deleteRendida($this->rendida);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Rendida. Make sure it does not have any associated items.');
      return $this->forward('rendir', 'list');
    }

    return $this->redirect('rendir/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->rendida = $this->getRendidaOrCreate();
    $this->updateRendidaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveRendida($rendida)
  {
    $rendida->save();

  }

  protected function deleteRendida($rendida)
  {
    $rendida->delete();
  }

  protected function updateRendidaFromRequest()
  {
    $rendida = $this->getRequestParameter('rendida');

    if (isset($rendida['alumno']))
    {
      $this->rendida->setAlumno($rendida['alumno']);
    }
    if (isset($rendida['fecha']))
    {
      if ($rendida['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($rendida['fecha']))
          {
            $value = $dateFormat->format($rendida['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $rendida['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->rendida->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->rendida->setFecha(null);
      }
    }
    if (isset($rendida['matricula']))
    {
      $this->rendida->setMatricula($rendida['matricula']);
    }
    if (isset($rendida['matricula']))
    {
      $this->rendida->setMatricula($rendida['matricula']);
    }
  }

  protected function getRendidaOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $rendida = new Rendida();
    }
    else
    {
      $rendida = RendidaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($rendida);
    }

    return $rendida;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/rendida/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/rendida/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/rendida/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/rendida/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = RendidaPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/rendida/sort') == 'asc')
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
      'rendida{id}' => 'ID:',
      'rendida{alumno}' => 'Alumno:',
      'rendida{fecha}' => 'Fecha de Emisión:',
      'rendida{matricula}' => 'Matricula:',
      'rendida{matricula}' => 'Matricula:',
    );
  }
}
