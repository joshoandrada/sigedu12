<?php

/**
 * cursada actions.
 *
 * @package    alba
 * @subpackage cursada
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
require('fpdf.php');
class cursadaActions extends autocursadaActions
{

 public function executeImprimir()
  {
$docid=$this->getRequestParameter('idd1');
$idren=$this->getRequestParameter('idrendida');
$idllama=$this->getRequestParameter('idllamado');

   $h2= sfPropelFinder::from('Alumno')->
	 where ('Id','like',$docid)->
	 find();
	 foreach ($h2 as $doc)  
         {
	 $nom= $doc->getNombre();
	 $ape= $doc->getApellido();
	 $matri= $doc->getMatricula();
         $tipodoc= $doc->getFkTipodocumentoId(); 
         $numdoc= $doc->getNroDocumento();
         $fechanac= $doc->getFechaNacimiento();
         $fecha2 = date('d',strtotime($fechanac))."/".date('n',strtotime($fechanac))."/".date('Y',strtotime($fechanac));         

         //$nacio= $doc->getFechaf();
         // vive
         $dir= $doc->getDireccion();
         $ciud= $doc->getCiudad();
         $provid= $doc->getFkProvinciaId();
         $paisid= $doc->getFkPaisId();
         // otros
         $mail= $doc->getEmail();
         $estado= $doc->getFkEstadoAlumnoId();
         $telfijo= $doc->getTelefono();
         $idcarre= $doc->getFkCarreraId();
         //$titulo= $doc->getTitulo();
         $sexoa= $doc->getSexo();
         if ($sexoa='M')
            {
            $activol='Masculino'; 
            }
          else
            {
            $activol='Femenino'; 
            }

          } 

    $h13= sfPropelFinder::from('Estadosalumnos')->
	 where ('Id','like',$estado)->
	 find();
	 foreach ($h13 as $l13)  
         {
	 $nomestado= $l13->getNombre();
         } 

    $h3= sfPropelFinder::from('Tipodocumento')->
	 where ('Id','like',$tipodoc)->
	 find();
	 foreach ($h3 as $l3)  
         {
	 $nomdocu= $l3->getNombre();
         } 
    $h5= sfPropelFinder::from('Pais')->
	 where ('Id','like',$paisid)->
	 find();
	 foreach ($h5 as $l5)  
         {
	 $nompais= $l5->getNombreLargo();
         } 
    $h6= sfPropelFinder::from('Provincia')->
	 where ('Id','like',$provid)->
	 find();
	 foreach ($h6 as $l6)  
         {
	 $nomprov= $l6->getNombreCorto();
         } 
    $h14= sfPropelFinder::from('RelAlumnoDivision')->
	 where ('FkAlumnoId','like',$docid)->
	 find();
	 foreach ($h14 as $l14)  
         {
	 $divid= $l14->getFkDivisionId();
         } 

    $h15= sfPropelFinder::from('Division')->
	 where ('Id','like',$divid)->
	 find();
	 foreach ($h15 as $l15)  
         {
	 $anio= $l15->getFkAnioId();
         $turno= $l15->getFkTurnoId();
         $ori= $l15->getFkOrientacionId();
          } 
     
    $h15a= sfPropelFinder::from('Anio')->
	 where ('Id','like',$anio)->
	 find();
	 foreach ($h15a as $l15a)  
         {
          $desanio=$l15a->getDescripcion();
         } 

    $h15b= sfPropelFinder::from('Turno')->
	 where ('Id','like',$turno)->
	 find();
	 foreach ($h15b as $l15b)  
         {
          $desturno=$l15b->getDescripcion();
         } 
    $h15c= sfPropelFinder::from('Carrera')->
	 where ('Id','like',$idcarre)->
	 find();
	 foreach ($h15c as $l15c)  
         {
          $desc=$l15c->getDescripcion();
          $anioc=$l15c->getAnio();
          $desori=$desc.' - '.$anioc;
         } 

    $h22= sfPropelFinder::from('Llamadoscur')->
	 where ('Id','like',$idllama)->
	 find();
	 foreach ($h22 as $alu2)  
         {
	 $tllama= $alu2->getTurno();
	 $llamado= $alu2->getLlamado();
	 $fini= $alu2->getFechai();
         $ffin= $alu2->getFechaf();
         $id=$alu2->getId();
         
          } 


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha2 = $dias[date('w',strtotime($fee))]." ".date('d',strtotime($fee))." de ".$meses[date('n',strtotime($fee))-1]. " del ".date('Y',strtotime($fee));

$llama= $llamado.'º Llamado - desde:'.$fini.' hasta: '.$ffin.' ('.$id.')';


  //  $h4=sfPropelFinder::from('RelAnioActividadDocente')->
    //        where('FkDocenteId', 'like', $docid)->
    //        find();
	//	foreach ($h4 as $c3)
	//	{
//		 $anioid = $c3->getFkAnioActividadId();
//
 //                $h7=sfPropelFinder::from('RelAnioActividad')->
   //              where('Id', 'like', $anioid)->
  //               find();
//		 foreach ($h7 as $c7)
//		   {
//		    $actid = $c7->getFkActividadId();
 //		   }
//		}


$config = sfTCPDFPluginConfigHandler::loadConfig();
$pdf = new sfTCPDF();
$pdf->SetFont('FreeSerif', '', 8);
$pdf->getAliasNbPages();
$pdf->SetMargins(12, 10, 8);
$pdf->SetAutoPageBreak(true,5);  


$pdf->AddPage();
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('helvetica', 'BU', 12); $pdf->Cell(0, 23, '', 1, 1, 'C');
// $idusu =  $this->getUser()->getAttribute('fk_ciclolectivo_id');

///////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////

$pdf->SetXY(0, 14);$pdf->Cell(0, 7, 'Cursada Nº '.$idren, 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);

$pdf->SetXY(0, 22);$pdf->Cell(0, 7, $llama, 0, 1, 'C');

$pdf->SetXY(12, 35);$pdf->Cell(0, 7, 'Nombre y Apellido :  '.$nom.' '.$ape, 1, 0, 'L');
$pdf->SetXY(115, 35);$pdf->Cell(0, 7, 'Documento : '.$nomdocu.' - '.$numdoc, 1, 0, 'L');
$pdf->SetXY(170, 35);$pdf->Cell(0, 7, 'Matricula : '.$matri, 1, 1, 'L');


$pdf->SetXY(12, 42);$pdf->Cell(0, 7, 'Estado : '.$nomestado, 1, 0, 'L');
//$pdf->SetXY(70, 42);$pdf->Cell(0, 7, 'Estado : '.$nomestado, 1, 0, 'L');
$pdf->SetXY(80, 42);$pdf->Cell(0, 7, 'Orientacion : '.$desori, 1, 1, 'L');
//$pdf->SetXY(170, 42);$pdf->Cell(0, 7, 'Turno : ', 1, 1, 'L');

$pdf->SetXY(167, 21);$pdf->SetFont('helvetica','B',6); $pdf->Cell(30,6,'ISFD Dra Carolina',0,1,'R');
$pdf->SetXY(165, 23);$pdf->SetFont('helvetica','B',6); $pdf->Cell(30,6,'  Tobar Garcia',0,1,'R');

$pdf->Ln(7);
$pdf->Image('logo.jpg', 182,12, 8, 10, 'JPG');
$pdf->Image('sis.jpg', 25,15, 21, 9, 'JPG');

$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('helvetica','B',6);

$pdf->SetXY(13, 27);
$hoy = date("d").'/'.date("m").'/'.date("Y");
$pdf->SetFont('helvetica','N',7);$pdf->Cell(10,8,'fecha: '.$hoy,0,0,'L');

$pdf->SetXY(150, 27);
$pdf->SetFont('helvetica','N',7);$pdf->Cell(10,8,'id_alumno: '.$docid,0,0,'L');


$pdf->SetXY(12, 51);

$pdf->SetFont('helvetica','B',7);
$pdf->Cell(8,7,'Ord.',1,0,'C');
//$pdf->Cell(9,7,'Perm.',1,0,'C');
$pdf->Cell(101,7,'   Materia ',1,0,'L');		
$pdf->Cell(20,7,'Estado',1,0,'C');
$pdf->Cell(14,7,'Nota',1,0,'C');
$pdf->Cell(29,7,'Concepto',1,0,'C');
//$pdf->Cell(8,7,'Libro',1,0,'C');
//$pdf->Cell(8,7,'Folio',1,0,'C');
$pdf->Cell(18,7,'Fecha',1,1,'C');


$pdf->SetXY(12, 59);
$acu=0;
$ii=0;
       $a1=sfPropelFinder::from('Detallecursada')->
       where('FkAlumnoId', 'like', $docid)->
       where('FkCursadaId', 'like', $idren)->       
       find();
       foreach ($a1 as $aa1)
       {
               $actid = $aa1->getFkActividadId();
               //$orden = $aa1->getFkCursadaId();
               $dcursada = $aa1->getFkDcursadaId();
               $resultado = $aa1->getResult();
               $concep = $aa1->getEstado();
               $forden = $aa1->getFecha();
               //$folio = $aa1->getFolio();

               //$h11=sfPropelFinder::from('Cursada')->
                //where('Id', 'like', $idren)->
                //find();
                //foreach ($h11 as $c11)
                //{
                //$forden = $c11->getfecha(); 
                //}

               $fecha5 = date('d',strtotime($forden))."/".date('n',strtotime($forden))."/".date('Y',strtotime($forden));         

               $h10=sfPropelFinder::from('Estadomate')->
                where('Id', 'like', $dcursada)->
                find();
                foreach ($h10 as $c10)
                {
                $estadom = $c10->getNombre(); 
                }
               $h9=sfPropelFinder::from('Actividad')->
               where('Id', 'like', $actid)->
               find();
               foreach ($h9 as $c9)
	       {
               $nomact = $c9->getNombre(); 
               }

                $ii++; 
		$pdf->SetFont('helvetica','N',7);
		$pdf->Cell(8,7,$ii,1,0,'C');
                //$pdf->Cell(9,7,$orden,1,0,'C');
		$pdf->Cell(101,7,' '.$nomact.' ('.$actid.')',1,0,'L');		
		$pdf->Cell(20,7,$estadom,1,0,'C');
		$pdf->Cell(14,7,$resultado,1,0,'C');

     $n=$resultado;
     $numero= intval($n);
     $dec=($n-intval($n))*100;
     
     switch ($numero){
                case 10:
		{
		$num = "diez";
		break;
		}		
                case 9:
		{
		$num = "nueve";
		break;
		}
		case 8:
		{
		$num = "ocho";
		break;
		}
		case 7:
		{
		$num = "siete";
		break;
		}
		case 6:
		{
		$num = "seis";
		break;
		}
		case 5:
		{
		$num = "cinco";
		break;
		}
		case 4:
		{
		$num = "cuatro";
		break;
		}
		case 3:
		{
		$num = "tres";
		break;
		}
		case 2:
		{
		$num = "dos";
		break;
		}
		case 1:
		{
		$num = "uno";
		break;
		}
	}

	if ($dec >= 90 && $dec <= 99){
	 $num_letra = "noventa ";
          }
	 if ($dec >= 80 && $dec <= 89){
         $num_letra = "ochenta ";
          }
         if ($dec >= 70 && $dec <= 79){
         $num_letra = "setenta ";
		if ($dec > 70){
		$num_letra = "setenta y cinco";
                }
          }
         if ($dec >= 60 && $dec <= 69){
         $num_letra = "sesenta ";
	  }
         if ($dec >= 50 && $dec <= 59){
      	$num_letra = "cincuenta ";
          }
        if ($dec >= 40 && $dec <= 49){
	$num_letra = "cuarenta ";
	}
        if ($dec >= 30 && $dec <= 39){
	$num_letra = "treinta ";
	}
        if ($dec >= 20 && $dec <= 29){
	$num_letra = "veinte ";
		if ($dec > 20){
		$num_letra = "veinticinco";
                }
	}
        if ($dec >= 10 && $dec <= 19){
	$num_letra = "diez ";
	}
if ($dec==0){
$notaletra= $num;
} else {
$notaletra= $num.' con '.$num_letra;
}
		$pdf->Cell(29,7,$notaletra,1,0,'C');
               // $pdf->Cell(8,7,$libro,1,0,'C');
               // $pdf->Cell(8,7,$folio,1,0,'C');
                $pdf->Cell(18,7,$fecha5,1,1,'C');
               
                //$acu=$acu+$horas;
                             
            }

$pdf->Output('fichaAlumno.pdf', 'I');
 throw new sfStopException();


  }



  public function executeIndex($request)
  {
    return $this->forward('cursada', 'list');
  }

   public function executeAgregar()
   {
   $cur=$_POST['id'];
   $nota=$_POST['nota'];
   $act=$_POST['idactividad'];
   $cursa = sfPropelFinder::from('Detallecursada')->
               where('Id', 'like', $cur)->
               where('Fk_actividad_id', 'like', $act)->
               find();
    
	foreach($cursa as $c)
	{
	 //$anterior=$c->getTotal();
	 if ($nota <= 10)
	 {
	  $rec = new Detallecursada();
	  $rec->setResult($nota);
	  //$rec->setMonto($monto);
	  if ($nota >= 4)
          { 
          $estado="Aprobo";
           }
           else
          { 
          $estado="Reprobo";
          }
          $rec->setEstado($estado);
          $rec->save();
	  //$this->Audpreupdate($pac);
	  //$c->setTotal($anterior-$monto);
	  //$c->save();
	  //$this->Aupostupdate($pac);
	 }
	 else
	 {
	  return $this->redirect('cuentas/mensaje3');
	 }
	}
//	$this->ImprimirRecibo();
   }
   
   public function executeNota()
   {
   $cur=(int)$this->getRequestParameter('id');
   $this->id=$cur;

   }
  
  public function executeMensaje2()
 {
 }
 public function executeMensaje3()
 {
 } 

  public function executeList($request)
  {

   // $h12= sfPropelFinder::from('Usuario')->
   //  where ('Id','like',5)->
   //  find();
   //  foreach ($h12 as $c12)  
   //    {
   //    $alum=$c12->getNroDocumento();        
   //     }
   $usu =  $this->getUser()->getAttribute('id');
   $h10= sfPropelFinder::from('Usuario')->
     where ('Id','like',$usu)->
     find();
     foreach ($h10 as $c10)  
       {
       $alu=$c10->getFKAlumno();        
       }
     
 

    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cursada/filters');

    // pager
    $this->pager = new sfPropelPager('Cursada', 10);
    $c = new Criteria();

    $c->add(CursadaPeer::FK_ALUMNO_ID,$alu, Criteria::EQUAL);

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
        $this->guardarOrden($this->cursada);
        //$this->Ausave($this->getRequestParameter('id'));
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Cursadas.');
        return $this->forward('cursada', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('cursada/edit?id='.$this->cursada->getId());
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
      $this->borrarOrden($this->cursada);
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
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/cursada/filters');

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
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/cursada');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/cursada/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/cursada/filters');
      }
    }
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
    if (isset($this->filters['fk_alumno_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(CursadaPeer::FK_ALUMNO_ID, '');
      $criterion->addOr($c->getNewCriterion(CursadaPeer::FK_ALUMNO_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fk_alumno_id']) && $this->filters['fk_alumno_id'] !== '')
    {
      $c->add(CursadaPeer::FK_ALUMNO_ID, $this->filters['fk_alumno_id']);
    }
    if (isset($this->filters['matricula_is_empty']))
    {
      $criterion = $c->getNewCriterion(CursadaPeer::MATRICULA, '');
      $criterion->addOr($c->getNewCriterion(CursadaPeer::MATRICULA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['matricula']) && $this->filters['matricula'] !== '')
    {
      $c->add(CursadaPeer::MATRICULA, strtr($this->filters['matricula'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['fecha_is_empty']))
    {
      $criterion = $c->getNewCriterion(CursadaPeer::FECHA, '');
      $criterion->addOr($c->getNewCriterion(CursadaPeer::FECHA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecha']))
    {
      if (isset($this->filters['fecha']['from']) && $this->filters['fecha']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CursadaPeer::FECHA, date('Y-m-d', $this->filters['fecha']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecha']['to']) && $this->filters['fecha']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CursadaPeer::FECHA, date('Y-m-d', $this->filters['fecha']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CursadaPeer::FECHA, date('Y-m-d', $this->filters['fecha']['to']), Criteria::LESS_EQUAL);
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
protected function borrarOrden($cursada)  //Funcion para borrar las la consulta
  {
	$va=sfPropelFinder::from('Detallecursada')->
        where('FkCursadaId', 'like',$cursada->getId())->
	      delete();
  }
  
protected function guardarOrden($cursada)
  {

   // $t1= sfPropelFinder::from('Detallepm')->
   //  where('OpracticaId', 'like', $opracticasmedicas->getId())->find();
   //  $acu=0;  
   //    foreach($t1 as $t1s)
//	    {
//	     $c1 = $t1s->getPracticaId();
//         $t2= sfPropelFinder::from('Practicas')->
//             where('Id', 'like', $c1)->find();
//               foreach($t2 as $t21)
//                  {
//                   $costo= $t21->getCostoPract(); 
//                   $acu=$acu+$costo;
//                   }
//             }

   	$h= sfPropelFinder::from('Cursada')->
     where ('Id','like',$cursada->getId())->
     find();
     foreach ($h as $css)  
       {
        //$css->setTotal($acu);
       	$css->setAuxi(1);
        $css->save();
        }
       ///////////////  /////////////   ///////////

        $ciclo =  $this->getUser()->getAttribute('fk_ciclolectivo_id');
        
        $ht= sfPropelFinder::from('Turno')->
        where ('FkCiclolectivoId','like',$ciclo)->
        find();
        foreach ($ht as $ct)  
         {
          $idturno1= $ct->getId();
         }
        $idturno2= $idturno1-1;
 
   	$h= sfPropelFinder::from('Detallecursada')->
        where ('FkCursadaId','like',$cursada->getId())->
        find();
        foreach ($h as $css)  
         {
          $idmateria= $css->getFkActividadId();
          $idalu= $css->getFkAlumnoId();

       	  $h1= sfPropelFinder::from('Relactividaddivision')->
          where ('FkActividadId','like',$idmateria)->
          find();
          foreach ($h1 as $ss)  
           {
           $orden= $ss->getId();
           
            $h2= sfPropelFinder::from('Division')->
                where ('Orden','like',$orden)->
               _and ('FkTurnoId','like',$idturno2)->
               _or ('FkTurnoId','like',$idturno1)->
                 find();
               foreach ($h2 as $ee)  
                 {
                    $iddiv= $ee->getId();
                    $rec = new RelAlumnoDivision();
                    $rec->setFkDivisionId($iddiv);
                    $rec->setFKAlumnoId($idalu);
                    $rec->save();
                 }

            }
        }
  }

 public function executeOrden()
 {

  $idusu=$this->getRequestParameter('idu');

   $h10= sfPropelFinder::from('Usuario')->
     where ('Id','like',$idusu)->
     find();
     foreach ($h10 as $c10)  
       {
       $idalu=$c10->getFKAlumno();        
        }

   $h1= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$idalu)->
	     find();
	 foreach ($h1 as $alu1)  
         {
	 $matrialu= $alu1->getMatricula();
          } 

    $h2= sfPropelFinder::from('Llamadoacur')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h2 as $alu2)  
         {
	 $llamada= $alu2->getFkLlamadoscurId();
          } 
        $c = CursadaPeer::Ingresacur($idalu,$matrialu,$llamada);
        $c1=new Criteria();
        $c1->addAscendingOrderByColumn(CursadaPeer::ID);
        $c3 = CursadaPeer::DoSelect($c1);
        foreach ($c3 as $cs3)
          {
             $ncur = $cs3->getid();
          }
      return $this->redirect('cursada/edit?id='.$ncur);
  }
	
}
