<?php

/**
 * actas actions.
 *
 * @package    alba
 * @subpackage actas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
//require('fpdf.php');
//require_once('../tcpdf.php');

class actasActions extends autoactasActions
{

public function executeImprimiracta()
{
$mat=$this->getRequestParameter('idmat');
$esta=$this->getRequestParameter('idestado');
$lla=$this->getRequestParameter('idlla');
$fe=$this->getRequestParameter('fecha');

    $h2= sfPropelFinder::from('Llamados')->
	 where ('Id','like',$lla)->
	 find();
	 foreach ($h2 as $alu2)  
         {
	 $turno= $alu2->getTurno();
	 $llamado= $alu2->getLlamado();
	 $fini= $alu2->getFechai();
         $ffin= $alu2->getFechaf();
         } 
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha2 = $meses[date('n',strtotime($fini))-1]. " ".date('Y',strtotime($fini));

//$llama= $turno.'º Turno - '.$llamado.'º Llamado '.$fecha2.' ('.$lla.')'; 

$llama= $turno.'º Turno - '.$llamado.'º Llamado '.$fecha2; 

    $h3= sfPropelFinder::from('Estadomate')->
	 where ('Id','like',$esta)->
	 find();
	 foreach ($h3 as $l3)  
         {
	 $nomestado= $l3->getNombre();
         } 


    $h4=sfPropelFinder::from('Actividad')->
            where('Id', 'like', $mat)->
            find();
		foreach ($h4 as $c3)
		{
		 $nromat = $c3->getNro();
                 $nommat=$c3->getDescripcion();
                 $aniomat=$c3->getAnio();
                 $cid= $c3->getFkCarreraId(); 
		}

    $ha4=sfPropelFinder::from('Carrera')->
            where('Id', 'like', $cid)->
            find();
		foreach ($ha4 as $ca3)
		{
		 $nomc = $ca3->getAbrev();
 		}


     $c=sfPropelFinder::from('Detallerendir')->
           where('FkLlamadaId', 'like',$lla)->
           where('FkDcursadaId', 'like',$esta)->
           where('FkActividadId', 'like',$mat)->
          find();
                foreach ($c as $cc)
         	{
                	$aluid=$cc->getFkAlumnoId();
		       	$orendida=$cc->getFkCursadaId();
                        $c4=sfPropelFinder::from('Alumno')->
                	where('Id', 'like', $cc->getFkAlumnoId())->
                	find();
                	foreach ($c4 as $c5)
			{
                        $dni=$c5->getNroDocumento();
                        $apenom=$c5->getApellidoMaterno();
                	$matri=$c5->getMatricula();
                        }
                 }    

$cr=sfPropelFinder::from('Relactividaddivision')->
           where('FkActividadId', 'like',$mat)->
          find();
                foreach ($cr as $ccr)
         	{
		       	$divid=$ccr->getFkDivisionId();
                        $c4r=sfPropelFinder::from('Division')->
                	where('Id', 'like', $divid)->
                	find();
                	foreach ($c4r as $c5r)
			{
                	$turnoid=$c5r->getFkTurnoId();
                        $anioid=$c5r->getFkAnioId();
	                        $c6r=sfPropelFinder::from('Turno')->
	                	where('Id', 'like', $turnoid)->
	                	find();
	                	foreach ($c6r as $c7r)
				{
	                	$turnonom=$c7r->getDescripcion();
                                }
	                        $c8r=sfPropelFinder::from('Anio')->
	                	where('Id', 'like', $anioid)->
	                	find();
	                	foreach ($c8r as $c9r)
				{
                                $carreraid=$c9r->getFkCarreraId();
	                	$anionom=$c9r->getDescripcion();
                                if ($cid==$carreraid)
                                   {
                                   $carreraid1='';  
                                   //$carreraid1='*';  

                                   }
                                 else
                                   {
                                   $carreraid1='';
                                   }
                                }
                        }
                 }    


$num=count($c);
//$num=51;
$pag=0;
if ($num <= 25)
  {
  $pag=1;  
  } 
if ($num > 25 && $num <= 50)
  {
  $pag=2;  
  } 
if ($num > 50)
  {
  $pag=3;  
  } 

//return $this->redirect('actas/edit');
 $config = sfTCPDFPluginConfigHandler::loadConfig();
 $pdf = new sfTCPDF();
 $pdf->SetFont('FreeSerif', '', 8);

 //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
 //$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', '12'));
 //$pdf->SetHeaderData('', 2, 'ACTA VOLANTE DE EXAMEN ', 'Turno Dicimbre 1ª llamado');
 //$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
 //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  


 $pdf->getAliasNbPages();
 //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 //$pdf->setHeaderMargin(20);
 //$pdf->setFooterMargin(10);

#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(12, 10, 8);

#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true,5);  

//agregar pag 1

$u = 1;
$paga=0;
while ($u <= $pag) {
    $u++;  
    $paga++;

 $pdf->AddPage();

// Establecer la fuente
//$pdf->SetFont('arial', 'BI', 16);
// negrita subrayado U cursiva I --$pdf->SetFont('helvetica', 'BU', 12);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$pdf->SetFont('helvetica', 'BU', 12); $pdf->Cell(0, 30, '', 1, 1, 'C');

$pdf->SetXY(0, 10);$pdf->Cell(0, 7, 'ACTA VOLANTE DE EXAMENES', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);
$pdf->SetXY(17, 19);$pdf->Cell(0, 7, 'Examenes de Alumnos  :  '.$nomestado, 0, 1, 'L');
$pdf->SetXY(77, 19);$pdf->Cell(0, 7, 'LLamado :  '.$llama, 0, 1, 'L');

$pdf->SetXY(17, 26);$pdf->Cell(0, 7, 'Asignatura : '.$nommat.'  - '.$mat.'            Carrera : '.$nomc.' '.$carreraid1, 0, 0, 'L');
//$pdf->SetXY(122, 26);$pdf->Cell(0, 7, 'Carrera : '.$nomc.' '.$carreraid1, 0, 0, 'L');
$pdf->SetXY(17, 33);$pdf->Cell(0, 7, 'Año : '.$anionom, 0, 0, 'L');
$pdf->SetXY(47, 33);$pdf->Cell(0, 7, 'Turno : '.$turnonom, 0, 0, 'L');
$pdf->SetXY(92, 33);$pdf->Cell(0, 7, 'Fecha : '.$fe, 0, 0, 'L');
$pdf->SetXY(135, 33);$pdf->Cell(0, 7, 'Libro :  ', 0, 0, 'L');
$pdf->SetXY(160, 33);$pdf->Cell(0, 7, 'Folio :  ', 0, 0, 'L');

$pdf->SetXY(170, 26);$pdf->SetFont('helvetica','B',7); $pdf->Cell(30,6,'ISFD Dra Carolina',0,1,'R');
$pdf->SetXY(168, 28);$pdf->SetFont('helvetica','B',7); $pdf->Cell(30,6,'  Tobar Garcia',0,1,'R');

$pdf->Ln(7);
$pdf->Image('logo.jpg', 182,12, 12, 15, 'JPG');
$pdf->Image('sis.jpg', 17,11, 20, 8, 'JPG');

$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('helvetica','B',6);

//cuadros
$pdf->Cell(8,10,'',1,0,'C');
$pdf->Cell(10,10,'',1,0,'C');
$pdf->Cell(64,10,'',1,0,'C');		
$pdf->Cell(18,10,'',1,0,'C');		
$pdf->Cell(13,10,'',1,0,'C');
$pdf->Cell(20,10,'',1,0,'C');
$pdf->Cell(16,10,'',1,0,'C');
$pdf->Cell(41,10,'',1,1,'C');

$pdf->SetXY(12, 46);

//abajo
$pdf->Cell(8,5,'Orden',0,0,'C');
$pdf->Cell(10,5,'Permiso',0,0,'C');
$pdf->Cell(64,8,'',0,0,'C');		
$pdf->Cell(18,8,'',0,0,'C');		
$pdf->Cell(13,8,'',0,0,'C');
$pdf->Cell(20,5,'del Alumno',0,0,'C');
$pdf->Cell(8,5,'Esc.',1,0,'C');
$pdf->Cell(8,5,'Oral',1,0,'C');
$pdf->Cell(8,5,'Nros',1,0,'C');
$pdf->Cell(15,5,'Letras',1,0,'C');
$pdf->Cell(18,5,'Concepto ',1,1,'C');

$pdf->SetXY(12, 40);

//arriba
$pdf->Cell(8,8,'Nº de',0,0,'C');
$pdf->Cell(10,8,'Nº de',0,0,'C');
$pdf->Cell(64,8,'Apellido/s y Nombre/s',0,0,'C');		
$pdf->Cell(18,8,'Dni',0,0,'C');		
$pdf->Cell(13,8,'Matricula',0,0,'C');
$pdf->Cell(20,8,'Firma',0,0,'C');
$pdf->Cell(16,8,'Calificaciones',0,0,'C');
$pdf->Cell(40,8,'Nota Final',0,1,'C');


$pdf->SetXY(12, 51);

$ii=0;
foreach ($c as $cc)
       {
        $orendida=$cc->getFkCursadaId();
       	$c4=sfPropelFinder::from('Alumno')->
       	where('Id', 'like', $cc->getFkAlumnoId())->
       	find();
       	foreach ($c4 as $c5)
        	{
               	$dni=$c5->getNroDocumento();
                $apenom=$c5->getApellidoMaterno();
              	$matri=$c5->getMatricula();
                $ii++; 
		$pdf->SetFont('helvetica','B',7);
		$pdf->Cell(8,6,$ii,1,0,'C');
		$pdf->Cell(10,6,$orendida,1,0,'C');
		$pdf->Cell(64,6,' '.$apenom,1,0,'L');		
		$pdf->Cell(18,6,$dni,1,0,'C');		
		$pdf->Cell(13,6,$matri,1,0,'C');
		$pdf->Cell(20,6,'',1,0,'C');
		$pdf->Cell(8,6,'',1,0,'C');
		$pdf->Cell(8,6,'',1,0,'C');
		$pdf->Cell(8,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
		$pdf->Cell(18,6,'',1,1,'C');
                }
        }    

$ggg = 35 - $num;
$i = $num;
while ($i <= $ggg) {
    $i++;  

$pdf->SetFont('helvetica','B',6);
//$pdf->Cell(0,6,'',1,1,'C','L');
//$pdf->Cell(8,6,$i,1,0,'C');
//$pdf->Cell(10,6,'',1,0,'C');
//$pdf->Cell(65,6,'',1,0,'C');		
//$pdf->Cell(23,6,'',1,0,'C');		
//$pdf->Cell(15,6,'',1,0,'C');
//$pdf->Cell(20,6,'',1,0,'C');
//$pdf->Cell(11,6,'',1,0,'C');
//$pdf->Cell(11,6,'',1,0,'C');
//$pdf->Cell(11,6,'',1,0,'C');
//$pdf->Cell(16,6,'',1,1,'C');

}
$ca=$ggg*6;

$pdf->Cell(0,$ca,'',1,1,'C');

$pdf->Cell(0,25,'',1,1,'C');
$pdf->Cell(0, 5,'Pagina '.$pag.' de '.$paga, 0, 0, 'C');

$pdf->SetFont('helvetica','B',8);
$pdf->SetXY(17, 253);$pdf->Cell(0, 7, 'A continuación del último alumno deberá firmar el Secretario. ', 0, 0, 'L');

$pdf->SetXY(30, 266);$pdf->Cell(0, 7, '..........................', 0, 0, 'L');
$pdf->SetXY(30, 269);$pdf->Cell(0, 7, '   Presidente ', 0, 0, 'L');

$pdf->SetXY(75, 266);$pdf->Cell(0, 7, '..........................', 0, 0, 'L');
$pdf->SetXY(75, 269);$pdf->Cell(0, 7, '        Vocal ', 0, 0, 'L');

$pdf->SetXY(110, 266);$pdf->Cell(0, 7, '.........................', 0, 0, 'L');
$pdf->SetXY(110, 269);$pdf->Cell(0, 7, '        Vocal ', 0, 0, 'L');

$pdf->SetXY(150, 263);$pdf->Cell(0, 7, 'Total Alumnos  :    '.$ii, 0, 0, 'L');
$pdf->SetXY(150, 268);$pdf->Cell(0, 7, 'Aprobados : _____________ ', 0, 0, 'L');
$pdf->SetXY(150, 273);$pdf->Cell(0, 7, 'Aplazados : ______________ ', 0, 0, 'L');
$pdf->SetXY(150, 278);$pdf->Cell(0, 7, 'Ausentes  : ______________ ', 0, 0, 'L');

$pdf->SetFont('helvetica','B',8);

$pdf->SetXY(25, 277);$pdf->Cell(0, 7, '______ de _____________________________ De 20_________', 0, 0, 'L');
//$pdf->SetXY(20, 280);$pdf->Cell(0, 7, '          1-2-3                 4-5-6-7-8-9-10 ', 0, 0, 'L');


}
//$pdf->Ln(1);

//escribe el texto en la hoja
//$pdf->writeHTMLCell(0, 0, '', '', $mat.' - '.$esta.' - '.$lla, 0, 1, 0, true, '', true);
// set some text for example

//$pdf->Ln(4);

// set color for background
//$pdf->SetFillColor(220, 255, 220);

// Vertical alignment
//$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - TOP] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'T');
//$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - MIDDLE] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'M');
//$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - BOTTOM] '.$txt, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'B');

//$pdf->Ln(4);

 
//agregar pag 2
//$pdf->AddPage();
//escrite el texto en la hoja
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
 
//terminar el pdf

$pdf->Output('actas.pdf', 'I');

// $pdf->AddPage();
//$this->html='Linux Rulez';

// $pdf->writeHTML($this->html);
// $pdf->ln();
// $pdf->Output(actas.pdf);

 throw new sfStopException();
}



  public function executeImprimir()
{
           	$i=array();
       		$e=0;
       $c=sfPropelFinder::from('Detallerendir')->
           where('FkLlamadaId', 'like',$idlla)->
           where('FkDcursadaId', 'like',1)->
           _or('FkDcursadaId', 'like',8)->
           orderBy('FkActividadId')->
           orderBy('FkDcursadaId')->
           find();
                foreach ($c as $cc)
         	{
                $i[$e++]=$cc->getFkActividadId();
                }
$i1 = array_unique($i);                  

sort($i1);
$cant=count($i1);

//print_r($i1);


               for ($i2=1;$cant;$i2++)
         	{
///encabezado

      $pdf=new FPDF();
		$pdf->Open();
		$pdf->Header();
		$pdf->AddPage();
		//Set fonts y colores

        $pdf->SetFont('Arial','BIU',12);
		$pdf->SetFillColor(198,0,0);
		$pdf->SetTextColor(0,0,0);
                $total1=0;

		    $pdf->SetTextColor(255);
            $pdf->SetFillColor(120,120,120);
	        $pdf->SetLineWidth(.1);
		    $pdf->SetFont('Arial','BI',10);	
	        $pdf->Cell(188,8,'Listado de Afiliados con ordenes de compra pendientes',1,1,'C',1);
            $pdf->SetFont('Arial','BI',7);
	    $pdf->SetFillColor(255,255,255);
	    $pdf->SetTextColor(0);	
            $pdf->Cell(48,6,'Nombre',1,0,'C',1);
	    $pdf->Cell(20,6,'legajo',1,0,'C',1);
            $pdf->Cell(40,6,'Num afiliado',1,0,'C',1);		
            $pdf->Cell(40,6,'Empresa',1,0,'C',1);		
            $pdf->Cell(20,6,'Recibo',1,0,'C',1);
            $pdf->Cell(20,6,'Sub total',1,1,'C',1);
	    $pdf->SetFont('Arial','',5);
             $estado=1;
             $num2=0;
 /////

           $c=sfPropelFinder::from('Detallerendir')->
           where('FkLlamadaId', 'like',$idlla)->
           where('FkDcursadaId', 'like',1)->
           where('FkActividadId', 'like',$i1[$i2])->
          find();
                foreach ($c as $cc)
         	{
		       	$c4=sfPropelFinder::from('Alumno')->
                	where('Id', 'like', $cc->getFkAlumnoId())->
                	find();
                	foreach ($c4 as $c5)
			{
                	$dni=$c5->getNroDocumento();
                        $apenom=$c5->getApellidoMaterno();
                	$matri=$c5->getMatricula();
                        }
                
		//$i7[$e7++]=$cc->getFkDcursadaId();
                $numren=$cc->getFkCursadaId();
               	$c6=sfPropelFinder::from('Actividad')->
               	where('Id', 'like', $cc->getFkActividadId())->
               	find();
               	
                foreach ($c6 as $c7)
		{
               	$nomact= $c7->getNombre();
               	}
                $orden=$cc->getOrden();
                 //$i3[$e3++]=$c3->getAnio();
                $estado=$cc->getEstado();
		$num2++;   
               
                       $pdf->SetFont('Arial','I',8);$pdf->Cell(48,6,$dni,1,0,'C',1);
		       $pdf->SetFont('Arial','I',8);$pdf->Cell(20,6,$apenom,1,0,'C',1);
                       $pdf->SetFont('Arial','I',8);$pdf->Cell(40,6,$matri,1,0,'C',1);		
                       
                       $pdf->SetFont('Arial','I',8);$pdf->Cell(40,6,$nomact,1,0,'C',1);                   
                       $pdf->SetFont('Arial','I',8);$pdf->Cell(20,6,$orden,1,0,'C',1);
                       $pdf->SetFont('Arial','I',8);$pdf->Cell(20,6,$estado,1,1,'C',1);
                       //$total1=$total1+$total; 
                }
               
///pie
                   $pdf->SetFont('Arial','BI',7);	
		    $pdf->SetFillColor(200,200,200);
		    $pdf->Cell(98,7,'    Total Afiliados:  '.$num2,1,0,'L',1);
	            $pdf->Cell(90,7,'    Total :  $'.$total1,1,1,'L',1);
 

                $pdf->Output('Actas','D'); 
                return sfView::NONE; 

    }

$pdf->Output('Actas','D'); 
                return sfView::NONE; 
  }


}
