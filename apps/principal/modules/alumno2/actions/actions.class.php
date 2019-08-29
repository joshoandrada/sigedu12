<?php

/**
 * alumno2 actions.
 *
 * @package    alba
 * @subpackage alumno2
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class alumno2Actions extends autoalumno2Actions
{

 public function executeImpalumno()
{
$docid=$this->getRequestParameter('idd1');

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
         //$telmovil= $doc->getTelefonoMovil();
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
    $h15c= sfPropelFinder::from('Orientacion')->
	 where ('Id','like',$ori)->
	 find();
	 foreach ($h15c as $l15c)  
         {
          $desori=$l15c->getDescripcion();
         } 

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

$pdf->SetXY(0, 22);$pdf->Cell(0, 7, 'FICHA ALUMNO', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);
$pdf->SetXY(12, 35);$pdf->Cell(0, 7, 'Nombre y Apellido :  '.$nom.' '.$ape, 1, 0, 'L');
$pdf->SetXY(115, 35);$pdf->Cell(0, 7, 'Documento : '.$nomdocu.' - '.$numdoc, 1, 0, 'L');
$pdf->SetXY(170, 35);$pdf->Cell(0, 7, 'Matricula : '.$matri, 1, 1, 'L');

$pdf->SetXY(12, 42);$pdf->Cell(0, 7, 'Fecha Nacimiento : '.$fecha2, 1, 0, 'L');
$pdf->SetXY(55, 42);$pdf->Cell(0, 7, 'Direccion : '.$dir, 1, 0, 'L');
$pdf->SetXY(155, 42);$pdf->Cell(0, 7, 'Ciudad : '.$ciud, 1, 1, 'L');

$pdf->SetXY(12, 49);$pdf->Cell(0, 7, 'Provincia : '.$nomprov, 1, 0, 'L');
$pdf->SetXY(65, 49);$pdf->Cell(0, 7, 'Pais : '.$nompais, 1, 0, 'L');
$pdf->SetXY(120, 49);$pdf->Cell(0, 7, 'E-mail : '.$mail, 1, 1, 'L');

$pdf->SetXY(12, 56);$pdf->Cell(0, 7, 'Estado : '.$nomestado, 1, 0, 'L');
$pdf->SetXY(75, 56);$pdf->Cell(0, 7, 'Telefono : '.$telfijo, 1, 0, 'L');
$pdf->SetXY(140, 56);$pdf->Cell(0, 7, 'Sexo : '.$activol, 1, 1, 'L');

$pdf->SetXY(12, 63);$pdf->Cell(0, 7, 'Año : '.$desanio, 1, 0, 'L');
$pdf->SetXY(75, 63);$pdf->Cell(0, 7, 'Orientacion : '.$desori, 1, 0, 'L');
$pdf->SetXY(140, 63);$pdf->Cell(0, 7, 'Turno : '.$desturno, 1, 1, 'L');



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
$pdf->SetFont('helvetica','N',7);$pdf->Cell(10,8,'id: '.$docid,0,0,'L');


$pdf->SetXY(12, 72);

$pdf->SetFont('helvetica','B',7);
$pdf->Cell(8,7,'Ord.',1,0,'C');
$pdf->Cell(9,7,'Perm.',1,0,'C');
$pdf->Cell(83,7,'   Materia ',1,0,'L');		
$pdf->Cell(16,7,'E.Rend',1,0,'C');
$pdf->Cell(16,7,'resutado',1,0,'C');
$pdf->Cell(22,7,'Concepto',1,0,'C');
$pdf->Cell(10,7,'Libro',1,0,'C');
$pdf->Cell(10,7,'Folio',1,0,'C');
$pdf->Cell(16,7,'Fecha',1,1,'C');


$pdf->SetXY(12, 79);
$acu=0;
$ii=0;
       $a1=sfPropelFinder::from('Detallerendir')->
       where('FkAlumnoId', 'like', $docid)->
       find();
       foreach ($a1 as $aa1)
       {
               $actid = $aa1->getFkActividadId();
               $orden = $aa1->getFkCursadaId();
               $dcursada = $aa1->getFkDcursadaId();
               $resultado = $aa1->getResult();
               $concep = $aa1->getEstado();
               $libro = $aa1->getLibro();
               $folio = $aa1->getFolio();

               $h11=sfPropelFinder::from('Rendida')->
                where('Id', 'like', $orden)->
                find();
                foreach ($h11 as $c11)
                {
                $forden = $c11->getfecha(); 
                }
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
                $pdf->Cell(9,7,$orden,1,0,'C');
		$pdf->Cell(83,7,' '.$nomact.' ('.$actid.')',1,0,'L');		
		$pdf->Cell(16,7,$estadom,1,0,'C');
		$pdf->Cell(16,7,$resultado,1,0,'C');
		$pdf->Cell(22,7,$concep,1,0,'C');
                $pdf->Cell(10,7,$libro,1,0,'C');
                $pdf->Cell(10,7,$folio,1,0,'C');
                $pdf->Cell(16,7,$fecha5,1,1,'C');
                //$acu=$acu+$horas;
                             
            }

$pdf->Output('fichaAlumno.pdf', 'I');
 throw new sfStopException();
}


  function saveAlumno ($alumno) {
    $alumno->setSexo($this->getRequestParameter('sexo'));
		if($alumno->isNew())
		{
    	$alumno->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
		}
    $alumno->save();
    $this->guardarDatos($this->alumno);
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

  protected function addFiltersCriteria($c) {
    $c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID,$this->getUser()->getAttribute('fk_establecimiento_id'));
    
    if (isset($this->filters['division']) && $this->filters['division'] != '' && $this->filters['division'] != 0) {
        $c->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $this->filters['division']);
        $c->addJoin(AlumnoPeer::ID, RelAlumnoDivisionPeer::FK_ALUMNO_ID);
    }

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

  }

////////////////////////////////////


////////////////////////////////////
    public function executePorDivision($request) {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/alumno/filters');
        $filters = array('division' => $request->getParameter('division'));
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/alumno/filters');
        $this->redirect('alumno/list');
    }

   public function executeCambiarPais() {
        $this->pais_id = $this->getRequestParameter('pais_id');
        $this->provincia_id = $this->getRequestParameter('provincia_id');
        $c = new Criteria();
        $c->add(ProvinciaPeer::FK_PAIS_ID, $this->pais_id);
        $this->provincias = ProvinciaPeer::getEnOrden($c);
    }

 protected function guardarDatos($alumno)
  {
 $h2= sfPropelFinder::from('Alumno')->
     where ('Id','like',$alumno->getId())->
     find();
     foreach ($h2 as $h31)  
       {        
	$legap=$h31->getLegajoPrefijo();
        $legan=$h31->getLegajoNumero();
        //$legap=2016;
        //$legan=00;
        $mat = $legan."/".$legap;
        $nomalu=$h31->getNombre();
        $apealu=$h31->getApellido();
        $nomape = $nomalu." ".$apealu;
       }

    $h= sfPropelFinder::from('Alumno')->
     where ('Id','like',$alumno->getId())->
     find();
     foreach ($h as $css)  
       {        
	$css->setApellidoMaterno($nomape);
        $css->setMatricula($mat);
        $css->save();
        }
    }
}



