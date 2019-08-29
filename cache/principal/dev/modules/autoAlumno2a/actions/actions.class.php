<?php

/**
 * autoAlumno2a actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoAlumno2a
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 16948 2009-04-03 15:52:30Z fabien $
 */
class autoAlumno2aActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('alumno2a', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/alumno/filters');

    // pager
    $this->pager = new sfPropelPager('Alumno', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/alumno')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/alumno');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('alumno2a', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('alumno2a', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (AlumnoPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Alumnos. Make sure they do not have any associated items.');
      return $this->forward('alumno2a', 'list');
    }

    return $this->redirect('alumno2a/list');
  }

  public function executeEdit($request)
  {
    $this->alumno = $this->getAlumnoOrCreate();

    if ($request->isMethod('post'))
    {
      $this->updateAlumnoFromRequest();

      try
      {
        $this->saveAlumno($this->alumno);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Alumnos.');
        return $this->forward('alumno2a', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('alumno2a/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('alumno2a/list');
      }
      else
      {
        return $this->redirect('alumno2a/edit?id='.$this->alumno->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->alumno);

    try
    {
      $this->deleteAlumno($this->alumno);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Alumno. Make sure it does not have any associated items.');
      return $this->forward('alumno2a', 'list');
    }

    return $this->redirect('alumno2a/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->alumno = $this->getAlumnoOrCreate();
    $this->updateAlumnoFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveAlumno($alumno)
  {
    $alumno->save();

  }

  protected function deleteAlumno($alumno)
  {
    $alumno->delete();
  }

  protected function updateAlumnoFromRequest()
  {
    $alumno = $this->getRequestParameter('alumno');

    if (isset($alumno['legajo_numero']))
    {
      $this->alumno->setLegajoNumero($alumno['legajo_numero']);
    }
    if (isset($alumno['legajo_prefijo']))
    {
      $this->alumno->setLegajoPrefijo($alumno['legajo_prefijo']);
    }
    if (isset($alumno['apellido']))
    {
      $this->alumno->setApellido($alumno['apellido']);
    }
    if (isset($alumno['nombre']))
    {
      $this->alumno->setNombre($alumno['nombre']);
    }
    if (isset($alumno['sexo']))
    {
      $this->alumno->setSexo($alumno['sexo']);
    }
    if (isset($alumno['fk_tipodocumento_id']))
    {
    $this->alumno->setFkTipodocumentoId($alumno['fk_tipodocumento_id'] ? $alumno['fk_tipodocumento_id'] : null);
    }
    if (isset($alumno['nro_documento']))
    {
      $this->alumno->setNroDocumento($alumno['nro_documento']);
    }
    if (isset($alumno['fecha_nacimiento']))
    {
      if ($alumno['fecha_nacimiento'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($alumno['fecha_nacimiento']))
          {
            $value = $dateFormat->format($alumno['fecha_nacimiento'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $alumno['fecha_nacimiento'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->alumno->setFechaNacimiento($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->alumno->setFechaNacimiento(null);
      }
    }
    if (isset($alumno['fk_pais_id']))
    {
    $this->alumno->setFkPaisId($alumno['fk_pais_id'] ? $alumno['fk_pais_id'] : null);
    }
    if (isset($alumno['email']))
    {
      $this->alumno->setEmail($alumno['email']);
    }
    $this->alumno->setActivo(isset($alumno['activo']) ? $alumno['activo'] : 0);
    if (isset($alumno['fk_estadoalumno_id']))
    {
    $this->alumno->setFkEstadoalumnoId($alumno['fk_estadoalumno_id'] ? $alumno['fk_estadoalumno_id'] : null);
    }
    if (isset($alumno['direccion']))
    {
      $this->alumno->setDireccion($alumno['direccion']);
    }
    if (isset($alumno['ciudad']))
    {
      $this->alumno->setCiudad($alumno['ciudad']);
    }
    if (isset($alumno['fk_provincia_id']))
    {
    $this->alumno->setFkProvinciaId($alumno['fk_provincia_id'] ? $alumno['fk_provincia_id'] : null);
    }
    if (isset($alumno['telefono']))
    {
      $this->alumno->setTelefono($alumno['telefono']);
    }
    if (isset($alumno['observacion']))
    {
      $this->alumno->setObservacion($alumno['observacion']);
    }
  }

  protected function getAlumnoOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $alumno = new Alumno();
    }
    else
    {
      $alumno = AlumnoPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($alumno);
    }

    return $alumno;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/alumno/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/alumno/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/alumno/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/alumno/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nombre_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::NOMBRE, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::NOMBRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nombre']) && $this->filters['nombre'] !== '')
    {
      $c->add(AlumnoPeer::NOMBRE, strtr($this->filters['nombre'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['apellido_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::APELLIDO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::APELLIDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['apellido']) && $this->filters['apellido'] !== '')
    {
      $c->add(AlumnoPeer::APELLIDO, strtr($this->filters['apellido'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['nro_documento_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::NRO_DOCUMENTO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::NRO_DOCUMENTO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nro_documento']) && $this->filters['nro_documento'] !== '')
    {
      $c->add(AlumnoPeer::NRO_DOCUMENTO, strtr($this->filters['nro_documento'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['legajo_prefijo_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::LEGAJO_PREFIJO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::LEGAJO_PREFIJO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['legajo_prefijo']) && $this->filters['legajo_prefijo'] !== '')
    {
      $c->add(AlumnoPeer::LEGAJO_PREFIJO, strtr($this->filters['legajo_prefijo'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['fk_estadoalumno_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::FK_ESTADOALUMNO_ID, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::FK_ESTADOALUMNO_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fk_estadoalumno_id']) && $this->filters['fk_estadoalumno_id'] !== '')
    {
      $c->add(AlumnoPeer::FK_ESTADOALUMNO_ID, $this->filters['fk_estadoalumno_id']);
    }
    if (isset($this->filters['activo_is_empty']))
    {
      $criterion = $c->getNewCriterion(AlumnoPeer::ACTIVO, '');
      $criterion->addOr($c->getNewCriterion(AlumnoPeer::ACTIVO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['activo']) && $this->filters['activo'] !== '')
    {
      $c->add(AlumnoPeer::ACTIVO, $this->filters['activo']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/alumno/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = AlumnoPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/alumno/sort') == 'asc')
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
      'alumno{legajo_numero}' => 'Matricula Numero:',
      'alumno{legajo_prefijo}' => 'Matricula Año:',
      'alumno{apellido}' => 'Apellido:',
      'alumno{nombre}' => 'Nombres:',
      'alumno{sexo}' => 'Sexo:',
      'alumno{fk_tipodocumento_id}' => 'Tipo de Documento:',
      'alumno{nro_documento}' => 'Nro. Documento:',
      'alumno{fecha_nacimiento}' => 'Fecha Nacimiento:',
      'alumno{fk_pais_id}' => 'Nacionalidad:',
      'alumno{email}' => 'Email:',
      'alumno{activo}' => 'Datos actualizados:',
      'alumno{fk_estadoalumno_id}' => 'Estado:',
      'alumno{direccion}' => 'Direcci&oacute;n:',
      'alumno{ciudad}' => 'Ciudad:',
      'alumno{fk_provincia_id}' => 'Provincia:',
      'alumno{telefono}' => 'Tel&eacute;fono:',
      'alumno{observacion}' => 'Observaci&oacute;n:',
    );
  }
}
