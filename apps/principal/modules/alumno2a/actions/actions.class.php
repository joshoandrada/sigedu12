<?php

/**
 * alumno2a actions.
 *
 * @package    alba
 * @subpackage alumno2a
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class alumno2aActions extends autoalumno2aActions
{
/////////estado//////
 public function executeReporte()
  {
$estado=$this->getRequestParameter('esta');
//$idren=$this->getRequestParameter('idrendida');
//$idllama=$this->getRequestParameter('idllamado');

     $h1= sfPropelFinder::from('Estadosalumnos')->
   where ('Id','like',$estado)->
   find();
   foreach ($h1 as $l41)  
         {
   $nom_estado= $l41->getNombre();
         } 

$h2= sfPropelFinder::from('Alumno')->
      where ('FkEstadoalumnoId','like',$estado)->
      find();
      foreach ($h2 as $doc)  
             {
         $nom= $doc->getNombre();
         $uu++; 
             }



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

$pdf->SetXY(0, 14);$pdf->Cell(0, 7, 'LISTADO ALUMNOS', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);

$pdf->SetXY(0, 22);$pdf->Cell(0, 7, 'Estado : '.$nom_estado.'       Cantidad Total : '.$uu, 0, 1, 'C');

$pdf->SetXY(167, 21);$pdf->SetFont('helvetica','B',6); $pdf->Cell(30,6,'ISFD Dra Carolina',0,1,'R');
$pdf->SetXY(165, 23);$pdf->SetFont('helvetica','B',6); $pdf->Cell(30,6,'  Tobar Garcia',0,1,'R');

$pdf->Ln(7);
$pdf->Image('logo.jpg', 182,12, 8, 10, 'JPG');
$pdf->Image('sis.jpg', 20,15, 21, 9, 'JPG');

$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('helvetica','B',6);

$pdf->SetXY(13, 27);
$hoy = date("d").'/'.date("m").'/'.date("Y");
$pdf->SetFont('helvetica','N',7);$pdf->Cell(12,8,'fecha: '.$hoy,0,0,'L');
//$pdf->SetFont('helvetica','N',7);$pdf->Cell(80,8,'Ciclo: '.$nomciclo,0,1,'R');

$pdf->SetXY(12, 34);

$pdf->SetFont('helvetica','B',7);
$pdf->Cell(12,7,'Ord.',1,0,'C');
//$pdf->Cell(9,7,'Perm.',1,0,'C');
$pdf->Cell(51,7,' Apellido/s ',1,0,'C');    
$pdf->Cell(55,7,' Nombre/s ',1,0,'C');    
$pdf->Cell(40,7,'Tipo y Nro Documento ',1,0,'C');
$pdf->Cell(32,7,'Matricula',1,1,'C');
//$pdf->Cell(29,7,'Concepto',1,0,'C');
//$pdf->Cell(8,7,'Libro',1,0,'C');
//$pdf->Cell(8,7,'Folio',1,0,'C');
//$pdf->Cell(18,7,'Fecha',1,1,'C');


$pdf->SetXY(12, 42);
$acu=0;
$ii=0;


      $h2= sfPropelFinder::from('Alumno')->
      where ('FkEstadoalumnoId','like',$estado)->
      find();
      foreach ($h2 as $doc)  
             {
         $nom= $doc->getNombre();
         $ape= $doc->getApellido();
         $matri= $doc->getMatricula();
               $tipodoc= $doc->getFkTipodocumentoId(); 
               $numdoc= $doc->getNroDocumento();
              
             $h3= sfPropelFinder::from('Tipodocumento')->
      where ('Id','like',$tipodoc)->
      find();
      foreach ($h3 as $doc1)  
             {
                $nomdoc= $doc1->getNombre();
             }

                $ii++; 
    $pdf->SetFont('helvetica','N',8);
    $pdf->Cell(12,6,$ii,1,0,'C');
                //$pdf->Cell(9,7,$orden,1,0,'C');
    $pdf->Cell(51,6,' '.$ape,1,0,'L');
    $pdf->Cell(55,6,' '.$nom,1,0,'L');
    $pdf->Cell(40,6,$nomdoc.'  '.$numdoc,1,0,'C');
          $pdf->Cell(32,6,$matri,1,1,'C');
             }
 

//$pdf->SetXY(150, 27);
//$pdf->SetFont('helvetica','N',7);$pdf->Cell(10,8,'Cantidad Total: '.$ii,0,0,'L');


//$pagenumber = '{nb}';
//    if($this->PageNo() == 2){
//        $pdf->Cell(173,10, ' FOOTER TEST  -  '.$pagenumber, 0, 0);
//      }

 $pdf->SetY(-15);
 $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/'.$pdf->getNumPages(),0,0,'C');



$pdf->Output('fichaAlumno.pdf', 'I');
 throw new sfStopException();

}
////////finestado//////
public function executeReporteano()
  {
$ano=$this->getRequestParameter('ano');
//$idren=$this->getRequestParameter('idrendida');
//$idllama=$this->getRequestParameter('idllamado');

 //  $h1= sfPropelFinder::from('Estadosalumnos')->
 //  where ('Id','like',$estado)->
 //  find();
 //  foreach ($h1 as $l41)  
 //        {
 //  $nom_estado= $l41->getNombre();
 //        } 

   $h2= sfPropelFinder::from('Alumno')->
   where ('LegajoPrefijo','like',$ano)->
   find();
      foreach ($h2 as $doc)  
             {
         $año= $doc->getLegajoPrefijo();
         $uu++; 
             }



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

$pdf->SetXY(0, 14);$pdf->Cell(0, 7, 'LISTADO ALUMNOS', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);

$pdf->SetXY(0, 22);$pdf->Cell(0, 7, 'Año : '.$año.'       Cantidad Total : '.$uu, 0, 1, 'C');

$pdf->SetXY(167, 21);$pdf->SetFont('helvetica','B',6); $pdf->Cell(30,6,'ISFD Dra Carolina',0,1,'R');
$pdf->SetXY(165, 23);$pdf->SetFont('helvetica','B',6); $pdf->Cell(30,6,'  Tobar Garcia',0,1,'R');

$pdf->Ln(7);
$pdf->Image('logo.jpg', 182,12, 8, 10, 'JPG');
$pdf->Image('sis.jpg', 20,15, 21, 9, 'JPG');

$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('helvetica','B',6);

$pdf->SetXY(13, 27);
$hoy = date("d").'/'.date("m").'/'.date("Y");
$pdf->SetFont('helvetica','N',7);$pdf->Cell(12,8,'fecha: '.$hoy,0,0,'L');
//$pdf->SetFont('helvetica','N',7);$pdf->Cell(80,8,'Ciclo: '.$nomciclo,0,1,'R');

$pdf->SetXY(12, 34);

$pdf->SetFont('helvetica','B',7);
$pdf->Cell(12,7,'Ord.',1,0,'C');
//$pdf->Cell(9,7,'Perm.',1,0,'C');
$pdf->Cell(51,7,' Apellido/s ',1,0,'C');    
$pdf->Cell(55,7,' Nombre/s ',1,0,'C');    
$pdf->Cell(40,7,'Tipo y Nro Documento ',1,0,'C');
$pdf->Cell(32,7,'Matricula',1,1,'C');
//$pdf->Cell(29,7,'Concepto',1,0,'C');
//$pdf->Cell(8,7,'Libro',1,0,'C');
//$pdf->Cell(8,7,'Folio',1,0,'C');
//$pdf->Cell(18,7,'Fecha',1,1,'C');


$pdf->SetXY(12, 42);
$acu=0;
$ii=0;


      $h2= sfPropelFinder::from('Alumno')->
      where ('LegajoPrefijo','like',$ano)->
      find();
      foreach ($h2 as $doc)  
             {
         $nom= $doc->getNombre();
         $ape= $doc->getApellido();
         $matri= $doc->getMatricula();
               $tipodoc= $doc->getFkTipodocumentoId(); 
               $numdoc= $doc->getNroDocumento();
              
             $h3= sfPropelFinder::from('Tipodocumento')->
      where ('Id','like',$tipodoc)->
      find();
      foreach ($h3 as $doc1)  
             {
                $nomdoc= $doc1->getNombre();
             }

                $ii++; 
    $pdf->SetFont('helvetica','N',8);
    $pdf->Cell(12,6,$ii,1,0,'C');
                //$pdf->Cell(9,7,$orden,1,0,'C');
    $pdf->Cell(51,6,' '.$ape,1,0,'L');
    $pdf->Cell(55,6,' '.$nom,1,0,'L');
    $pdf->Cell(40,6,$nomdoc.'  '.$numdoc,1,0,'C');
          $pdf->Cell(32,6,$matri,1,1,'C');
             }
 

//$pdf->SetXY(150, 27);
//$pdf->SetFont('helvetica','N',7);$pdf->Cell(10,8,'Cantidad Total: '.$ii,0,0,'L');


//$pagenumber = '{nb}';
//    if($this->PageNo() == 2){
//        $pdf->Cell(173,10, ' FOOTER TEST  -  '.$pagenumber, 0, 0);
//      }

 $pdf->SetY(-15);
 $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/'.$pdf->getNumPages(),0,0,'C');



$pdf->Output('fichaAlumno.pdf', 'I');
 throw new sfStopException();

}
////////finestado//////

//////imprimir//////////
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
         $carreid= $doc->getFkCarreraId();
         $dir= $doc->getDireccion();
         $ciud= $doc->getCiudad();
         $provid= $doc->getFkProvinciaId();
         $paisid= $doc->getFkPaisId();
         // otros
         $mail= $doc->getEmail();
         $estado= $doc->getFkEstadoAlumnoId();
         $telfijo= $doc->getTelefono();
         $carre= $doc->getFkCarreraId();
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

$dia=date("d");
$mes=date("m");
$ano=date("Y");

$dianaz=date("d",strtotime($fechanac));
$mesnaz=date("m",strtotime($fechanac));
$anonaz=date("Y",strtotime($fechanac));


if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }
if ($mesnaz > $mes) {
$ano=($ano-1);}

$edad=($ano-$anonaz);

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

    $h22= sfPropelFinder::from('Carrera')->
	 where ('Id','like',$carreid)->
	 find();
	 foreach ($h22 as $l22)  
         {
          $descarre=$l22->getDescripcion();
         } 

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
$pdf->SetXY(155, 42);$pdf->Cell(0, 7, 'Edad : '.$edad.' años', 1, 1, 'L');

$pdf->SetXY(12, 49);$pdf->Cell(0, 7, 'Carrera : '.$descarre, 1, 0, 'L');
$pdf->SetXY(80, 49);$pdf->Cell(0, 7, 'Estado : '.$nomestado, 1, 0, 'L');
$pdf->SetXY(120, 49);$pdf->Cell(0, 7, 'E-mail : '.$mail, 1, 1, 'L');

$pdf->SetXY(12, 58);$pdf->Cell(0, 7, ' Materias Cursadas ', 1, 1, 'C');
//$pdf->SetXY(75, 56);$pdf->Cell(0, 7, 'Telefono : '.$telfijo, 1, 0, 'L');
//$pdf->SetXY(140, 56);$pdf->Cell(0, 7, 'Sexo : '.$activol, 1, 1, 'L');

//$pdf->SetXY(12, 63);$pdf->Cell(0, 7, 'Año : '.$desanio, 1, 0, 'L');
//$pdf->SetXY(75, 63);$pdf->Cell(0, 7, 'Orientacion : '.$desori, 1, 0, 'L');
//$pdf->SetXY(140, 63);$pdf->Cell(0, 7, 'Turno : '.$desturno, 1, 1, 'L');



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


$pdf->SetXY(12, 65);

$pdf->SetFont('helvetica','B',7);
$pdf->Cell(8,7,'Ord',1,0,'C');
$pdf->Cell(7,7,'Perm',1,0,'C');
$pdf->Cell(89,7,'   Materia ',1,0,'L');		
$pdf->Cell(20,7,'Estado',1,0,'C');
$pdf->Cell(9,7,'Nota',1,0,'C');

$pdf->Cell(29,7,'Concepto',1,0,'C');
$pdf->Cell(8,7,'Libro',1,0,'C');
$pdf->Cell(8,7,'Folio',1,0,'C');
$pdf->Cell(12,7,'Fecha',1,1,'C');


//$pdf->Cell(35,7,'Concepto',1,0,'C');
//$pdf->Cell(8,7,'Libro',1,0,'C');
//$pdf->Cell(8,7,'Folio',1,0,'C');
//$pdf->Cell(22,7,'Fecha',1,1,'C');


$pdf->SetXY(12, 72);
$acu=0;
$ii=0;
//////////////////////inicio cursadas/////////////////

       $b1=sfPropelFinder::from('Detallecursada')->
       where('FkAlumnoId', 'like', $docid)->
       find();
       foreach ($b1 as $bb1)
       {
               $actid1 = $bb1->getFkActividadId();
               $orden1 = $bb1->getFkCursadaId();
               $dcursada1 = $bb1->getFkDcursadaId();
               $resultado1 = $bb1->getResult();
               $concep1 = $bb1->getEstado();
               $libro1 = $bb1->getLibro();
               $folio1 = $bb1->getFolio();
	       $fec1= $bb1->getFecha();
	       $fecha61 = date('d',strtotime($fec1))."/".date('n',strtotime($fec1))."/".date('y',strtotime($fec1)); 
               $g11=sfPropelFinder::from('Cursada')->
                where('Id', 'like', $orden1)->
                find();


                foreach ($g11 as $i11)
                {
                $forden2 = $i11->getfecha(); 
                }
               $fecha52 = date('d',strtotime($forden2))."/".date('n',strtotime($forden2))."/".date('y',strtotime($forden2));         

               $hg10=sfPropelFinder::from('Estadomate')->
                where('Id', 'like', $dcursada1)->
                find();
                foreach ($hg10 as $cg10)
                {
                $estadom3 = $cg10->getNombre(); 
                }
               $hg9=sfPropelFinder::from('Actividad')->
               where('Id', 'like', $actid1)->
               find();
               foreach ($hg9 as $cg9)
	       {
               $nomact4 = $cg9->getNombre(); 
               $anio4 = $cg9->getAnio(); 
               }
                $ii++; 
		$pdf->SetFont('helvetica','N',7);
		$pdf->Cell(8,7,$orden1,1,0,'C');
    $pdf->Cell(7,7,$anio4,1,0,'C');
		$pdf->Cell(89,7,' '.$nomact4.' ('.$actid1.')',1,0,'L');		
		$pdf->Cell(20,7,$estadom3,1,0,'C');
		$pdf->Cell(9,7,$resultado1,1,0,'C');
    $n1=$resultado1;
    $numero1= intval($n1);
    $dec1=($n1-intval($n1))*100;
     
     switch ($numero1){
                case 10:
		{
		$num1 = "diez";
		break;
		}		
                case 9:
		{
		$num1 = "nueve";
		break;
		}
		case 8:
		{
		$num1 = "ocho";
		break;
		}
		case 7:
		{
		$num1 = "siete";
		break;
		}
		case 6:
		{
		$num1 = "seis";
		break;
		}
		case 5:
		{
		$num1 = "cinco";
		break;
		}
		case 4:
		{
		$num1 = "cuatro";
		break;
		}
		case 3:
		{
		$num1 = "tres";
		break;
		}
		case 2:
		{
		$num1 = "dos";
		break;
		}
		case 1:
		{
		$num1 = "uno";
		break;
		}
		case 0:
		{
		$num1 = "cero";
		break;
		}
	}

	if ($dec1 >= 90 && $dec1 <= 99){
	 $num_letra1 = "noventa ";
          }
	 if ($dec1 >= 80 && $dec1 <= 89){
         $num_letra1 = "ochenta ";
          }
         if ($dec1 >= 70 && $dec1 <= 79){
         $num_letra1 = "setenta ";
		if ($dec1 > 70){
		$num_letra1 = "setenta y cinco";
                }
          }
         if ($dec1 >= 60 && $dec1 <= 69){
         $num_letra1 = "sesenta ";
	  }
         if ($dec1 >= 50 && $dec1 <= 59){
      	$num_letra1 = "cincuenta ";
          }
        if ($dec1 >= 40 && $dec1 <= 49){
	$num_letra1 = "cuarenta ";
	}
        if ($dec1 >= 30 && $dec1 <= 39){
	$num_letra1 = "treinta ";
	}
        if ($dec1 >= 20 && $dec1 <= 29){
	$num_letra1 = "veinte ";
		if ($dec1 > 20){
		$num_letra1 = "veinticinco";
                }
	}
        if ($dec1 >= 10 && $dec1 <= 19){
	$num_letra1 = "diez ";
	}
if ($dec1==0){
$notaletra1= $num1;
} else {
$notaletra1= $num1.' con '.$num_letra1;
  }
     $pdf->Cell(29,7,$notaletra1,1,0,'C');
     $pdf->Cell(8,7,$libro1,1,0,'C');
     $pdf->Cell(8,7,$folio1,1,0,'C');
     $pdf->Cell(12,7,$fecha61,1,1,'C');
     //$acu=$acu+$horas;
  }

//encabezado rendidas
$pdf->SetFont('helvetica','N',8);
$pdf->Cell(0, 7, ' Materias Rendidas ', 1, 1, 'C');
$pdf->SetFont('helvetica','B',7);

$pdf->Cell(8,7,'Ord',1,0,'C');
$pdf->Cell(7,7,'Perm',1,0,'C');
$pdf->Cell(89,7,'   Materia ',1,0,'L');		
$pdf->Cell(20,7,'Estado',1,0,'C');
$pdf->Cell(9,7,'Nota',1,0,'C');
$pdf->Cell(29,7,'Concepto',1,0,'C');
$pdf->Cell(8,7,'Libro',1,0,'C');
$pdf->Cell(8,7,'Folio',1,0,'C');
$pdf->Cell(12,7,'Fecha',1,1,'C');

$ii=0;
/////////////////////////fin cursadas/////////////////
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
	       $fec= $aa1->getFecha();
		$fecha6 = date('d',strtotime($fec))."/".date('n',strtotime($fec))."/".date('y',strtotime($fec)); 
               $h11=sfPropelFinder::from('Rendida')->
                where('Id', 'like', $orden)->
                find();

                foreach ($h11 as $c11)
                {
                $forden = $c11->getfecha(); 
                }
               $fecha5 = date('d',strtotime($forden))."/".date('n',strtotime($forden))."/".date('y',strtotime($forden));         

               $h10=sfPropelFinder::from('Estadomateren')->
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
               $anio = $c9->getAnio();
               }
                $ii++; 
		$pdf->SetFont('helvetica','N',7);
		$pdf->Cell(8,7,$orden,1,0,'C');
                $pdf->Cell(7,7,$anio,1,0,'C');
	       //$pdf->Cell(7,7,$ii,1,0,'C');
               // $pdf->Cell(8,7,$orden,1,0,'C');
		$pdf->Cell(89,7,' '.$nomact,1,0,'L');		
		$pdf->Cell(20,7,$estadom,1,0,'C');
		$pdf->Cell(9,7,$resultado,1,0,'C');
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
		case 0:
		{
		$num = "cero";
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
     $pdf->Cell(8,7,$libro,1,0,'C');
     $pdf->Cell(8,7,$folio,1,0,'C');
     $pdf->Cell(12,7,$fecha6,1,1,'C');
     //$acu=$acu+$horas;
  }


$pdf->Output('fichaAlumno.pdf', 'I');
 throw new sfStopException();
}

//////Imprimir formulario////////
 
public function executeImpalumnoform()
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
         //$ciudad= $doc->getCiudad();
         //$nacio= $doc->getFechaf();
         // vive
         $carreid= $doc->getFkCarreraId();
         $dir= $doc->getDireccion();
         $ciud= $doc->getCiudad();
         $provid= $doc->getFkProvinciaId();
         $paisid= $doc->getFkPaisId();
         // otros
         $mail= $doc->getEmail();
         $estado= $doc->getFkEstadoAlumnoId();
         $telfijo= $doc->getTelefono();
         $carre= $doc->getFkCarreraId();
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

$dia=date("d");
$mes=date("m");
$ano=date("Y");

$dianaz=date("d",strtotime($fechanac));
$mesnaz=date("m",strtotime($fechanac));
$anonaz=date("Y",strtotime($fechanac));


if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }
if ($mesnaz > $mes) {
$ano=($ano-1);}

$edad=($ano-$anonaz);

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

    $h22= sfPropelFinder::from('Carrera')->
   where ('Id','like',$carreid)->
   find();
   foreach ($h22 as $l22)  
         {
          $descarre=$l22->getDescripcion();
         } 

$config = sfTCPDFPluginConfigHandler::loadConfig();
$pdf = new sfTCPDF();
$pdf->SetFont('FreeSerif', '', 8);
$pdf->getAliasNbPages();
$pdf->SetMargins(12, 10, 8);
$pdf->SetAutoPageBreak(true,5);  


$pdf->AddPage();
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('helvetica', 'BU', 12); $pdf->Cell(0, 23, '', 1, 1, 'C');

$pdf->SetXY(0, 22);$pdf->Cell(0, 7, 'FORMULARIO ALUMNO', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 12);


$pdf->SetXY(12, 35);$pdf->Cell(0, 20, ' Informacion General ', 0, 0, 'C');
$pdf->SetXY(12, 35);$pdf->Cell(0, 120, '', 1, 1, 'C');

$pdf->SetFont('helvetica', 'N', 10);

$pdf->SetXY(15, 55);$pdf->Cell(0, 7, 'Matricula :  '.$matri, 0, 0, 'L');
$pdf->SetXY(15, 65);$pdf->Cell(0, 7, 'Nombre/s :  '.$nom, 0, 1, 'L');
$pdf->SetXY(15, 75);$pdf->Cell(0, 7, 'Apellido/s :  '.$ape, 0, 1, 'L');
$pdf->SetXY(15, 85);$pdf->Cell(0, 7, 'Documento :  '.$nomdocu.' - '.$numdoc, 0, 1, 'L');
$pdf->SetXY(15, 95);$pdf->Cell(0, 7, 'Sexo : '.$activol, 0, 1, 'L');
$pdf->SetXY(15, 105);$pdf->Cell(0, 7, 'Fecha Nacimiento : '.$fecha2, 0, 1, 'L');
$pdf->SetXY(15, 115);$pdf->Cell(0, 7, 'Edad : '.$edad.' años', 0, 1, 'L');
$pdf->SetXY(15, 125);$pdf->Cell(0, 7, 'Nacionalidad : '.$nompais, 0, 0, 'L');
$pdf->SetXY(15, 135);$pdf->Cell(0, 7, 'E-mail : '.$mail, 0, 1, 'L');
$pdf->SetXY(15, 145);$pdf->Cell(0, 7, 'Telefono : '.$telfijo, 0, 0, 'L');

$pdf->SetFont('helvetica', 'N', 12);

$pdf->SetXY(12, 156);$pdf->Cell(0, 20, ' Donde Vive ', 0, 0, 'C');
$pdf->SetXY(12, 158);$pdf->Cell(0, 48, '', 1, 1, 'C');

$pdf->SetFont('helvetica', 'N', 10);

$pdf->SetXY(15, 175);$pdf->Cell(0, 7, 'Direccion : '.$dir, 0, 0, 'L');
$pdf->SetXY(15, 185);$pdf->Cell(0, 7, 'Ciudad : '.$ciud, 0, 0, 'L');
$pdf->SetXY(15, 195);$pdf->Cell(0, 7, 'Provincia : '.$nomprov, 0, 0, 'L');

$pdf->SetFont('helvetica', 'N', 12);

$pdf->SetXY(12, 208);$pdf->Cell(0, 20, ' Informacion Academica ', 0, 0, 'C');
$pdf->SetXY(12, 210);$pdf->Cell(0, 50, '', 1, 1, 'C');

$pdf->SetFont('helvetica', 'N', 10);

$pdf->SetXY(15, 225);$pdf->Cell(0, 7, 'Carrera : '.$descarre, 0, 0, 'L');
$pdf->SetXY(15, 235);$pdf->Cell(0, 7, 'Estado : '.$nomestado, 0, 0, 'L');




//$pdf->SetXY(12, 58);$pdf->Cell(0, 7, ' Informacion General ', 1, 1, 'C');
//$pdf->SetXY(75, 56);$pdf->Cell(0, 7, 'Telefono : '.$telfijo, 1, 0, 'L');
//$pdf->SetXY(140, 56);$pdf->Cell(0, 7, 'Sexo : '.$activol, 1, 1, 'L');

//$pdf->SetXY(12, 63);$pdf->Cell(0, 7, 'Año : '.$desanio, 1, 0, 'L');
//$pdf->SetXY(75, 63);$pdf->Cell(0, 7, 'Orientacion : '.$desori, 1, 0, 'L');
//$pdf->SetXY(140, 63);$pdf->Cell(0, 7, 'Turno : '.$desturno, 1, 1, 'L');



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



$pdf->Output('formularioAlumno.pdf', 'I');
 throw new sfStopException();
}


/////fin_imprimir///////
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

//  protected function saveAlumno($alumno)
//  {
//    $alumno->save();

  //}

function saveAlumno ($alumno) {
    $alumno->setSexo($this->getRequestParameter('sexo'));
    if($alumno->isNew())
    {
      $alumno->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
    }
    $alumno->save();
    $this->guardarDatos($this->alumno);
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


//////////////////////////
//////////////////////////

//public function executeEdit($request)
//  {
//    $this->alumno = $this->getAlumnoOrCreate();
//    if ($request->isMethod('post'))
//    {
//      $this->updateAlumnoFromRequest();
//      try
//      {
//        $this->saveAlumno($this->alumno);
//      }

//function saveAlumno ($alumno) {
//    $alumno->setSexo($this->getRequestParameter('sexo'));
//    if($alumno->isNew())
//    {
//      $alumno->setFkEstablecimientoId($this->getUser()->getAttribute('fk_establecimiento_id'));
//    }
//    $alumno->save();
//    $this->guardarDatos($this->alumno);
//  }


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
        $css->setFkCarreraId(7);
        $css->save();
        }
     $h55= sfPropelFinder::from('Cursada')->
     where ('FkAlumnoId','like',$alumno->getId())->
     find();
     foreach ($h55 as $css55)  
       {        
  $css55->setMatricula($mat);
        $css55->save();
        }
     $h91= sfPropelFinder::from('Rendida')->
     where ('FkAlumnoId','like',$alumno->getId())->
     find();
     foreach ($h91 as $css91)  
       {        
  $css91->setMatricula($mat);
        $css91->save();
        }
  }


}
