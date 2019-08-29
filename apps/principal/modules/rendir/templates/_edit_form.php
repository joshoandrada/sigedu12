<?php echo form_tag('rendir/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($rendida, 'getId') ?>

<?php $h2= sfPropelFinder::from('Rendida')->
	     where ('Id','like',$rendida->getId())->
	     find();
	 foreach ($h2 as $alu22)  
         {
         $alu = $alu22->getFkAlumnoId();
         $fee = $alu22->getFecha();
         //$matri = $alu22->getMatricula();
          } ?>
 
<?php $h1= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$alu)->
	     find();
	 foreach ($h1 as $alu1)  
         {
         $alunom = $alu1->getNombre();
         $aluape= $alu1->getApellido();
         $alucarre= $alu1->getFkCarreraId();
	 $matri= $alu1->getMatricula();
	 $matri= $alu1->getMatricula();
        $alucarre= $alu1->getFkCarreraId();
         $nomape= $alunom." ".$aluape;
          } ?>

<?php //$cr=sfPropelFinder::from('RelAlumnoDivision')->
//          where('FkAlumnoId', 'like',$alu)->
//          find();
//          foreach ($cr as $ccr)
//   	    {
//		       	$divid=$ccr->getFkDivisionId();
//                        $c4r=sfPropelFinder::from('Division')->
//                	where('Id', 'like', $divid)->
//                	find();
//                	foreach ($c4r as $c5r)
//			{
//                	$turnoid=$c5r->getFkTurnoId();
//                        $anioid=$c5r->getFkAnioId();
//	                        $c6r=sfPropelFinder::from('Turno')->
//	                	where('Id', 'like', $turnoid)->
//	                	find();
//	                	foreach ($c6r as $c7r)
//				{
//	                	$turnonom=$c7r->getDescripcion();
//                                }
//	                        $c8r=sfPropelFinder::from('Anio')->
//	                	where('Id', 'like', $anioid)->
//	                	find();
//	                	foreach ($c8r as $c9r)
//				{
                                //$alucarre=$c9r->getFkCarreraId();
//	                	$anionom=$c9r->getDescripcion();
//                                }
//                        }
//                 }    
?>
 
<?php $h14= sfPropelFinder::from('Carrera')->
	     where ('Id','like',$alucarre)->
	     find();
	 foreach ($h14 as $alu144)  
         {
         $carrera = $alu144->getDescripcion();
         $canio = $alu144->getAnio();
         } ?>


<?php    $con= $rendida->getId();
          //$this->getRequestParameter('idoconsulta');
         $c2=new Criteria();
         $c2->add(DetallerendirPeer::FK_CURSADA_ID,"$con", Criteria::LIKE);
         $numero_reg = DetallerendirPeer::doCount($c2); ?>
         <?php $c=sfPropelFinder::from('Detallerendir')->
           where('FkCursadaId', 'like', $con)->
           find();
        ?>
		<?php
        	$i=array();
       		$e=0;
        	$i1=array();
        	$e1=0;
        	$i2=array();
        	$e2=0;
        	$i3=array();
        	$e3=0;
        	$i4=array();
        	$e4=0;
        	$i5=array();
        	$e5=0;
        	$i6=array();
        	$e6=0;
        	$i7=array();
        	$e7=0;
        	$i8=array();
        	$e8=0;

        	foreach ($c as $cc)
         	{
	  	$c2=sfPropelFinder::from('Actividad')->
            where('Id', 'like', $cc->getFkActividadId())->
            find();
		// detalle rendida
                $i[$e1++]=$cc->getFkActividadId();
		$i4[$e4++]=$cc->getResult();
		$i5[$e5++]=$cc->getEstado();
		$i7[$e7++]=$cc->getLibro();
		$i8[$e8++]=$cc->getFolio();

		foreach ($c2 as $c3)
		{
                 //  actividad
		 $i1[$e++]= $c3->getNro();
                 $i2[$e2++]=$c3->getDescripcion();
                 //$i3[$e3++]=$c3->getAnio();
                 $i6[$e6++]=$c3->getAnio();
		}
	   }
    ?>


<?php
        $datos = $i; // Envio un array con la denominacion.
	$dato1 = $i1;// Y otro array con los id para poder armar una tabla en la vista..
	$dato2 = $i2; //Envio un array con los codigos.
//	$dato3 = $i3; //Envio un array con los costos.
	$dato4 = $i4; //Envio un array con los costos.
	$dato5 = $i5; //Envio un array con los Ac.
	$dato6 = $i6; //Envio un array con los Ac.
	$dato7 = $i7; //Envio un array con los Ac.
	$dato8 = $i8; //Envio un array con los Ac. 
	$num= $numero_reg;
?>


<?php    $h2= sfPropelFinder::from('Llamados')->
	 where ('Id','like',$rendida->getFkLlamadaId())->
	 find();
	 foreach ($h2 as $alu2)  
         {
	 $turno= $alu2->getTurno();
	 $llamado= $alu2->getLlamado();
	 $fini= $alu2->getFechai();
         $ffin= $alu2->getFechaf();
         $id=$alu2->getId();
         
          } 


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha2 = $dias[date('w',strtotime($fee))]." ".date('d',strtotime($fee))." de ".$meses[date('n',strtotime($fee))-1]. " del ".date('Y',strtotime($fee));

$llama= $turno.'&#186 Turno - '.$llamado.'&#186 Llamado - desde:'.$fini.' hasta: '.$ffin.' ('.$id.')';?>

<?php if($rendida->getAuxi()==1){?>

<fieldset id="sf_fieldset_encabezado" class="">
<h2><?php echo __('Encabezado'."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$llama) ?></h2>

<div class="form-row1">




<div class="col1">
<B>Alumno / Matricula :</B><p style="color: #0000FF;"><?php  echo $nomape." (".$alu.") ---  ".$matri ?></p>
</div>


<div class="col2">
<B>Fecha Emision:</B><p style="color: #0000FF;"><?php echo $fecha2 ?></p>
</div>
</div>

<div class="form-row1">
<div class="col1">
<B>Carrera :</B><p style="color: #0000FF;"><?php  echo $carrera ?></p>
</div>

<div class="col2">
<B>Plan Año :</B><p style="color: #0000FF;"><?php  echo $canio ?></p>
</div>
</div>

<!-- <p style="color: #FF0000;"><?php // echo $alunom ?></p> rojo -->

<!-- -->
</fieldset>

<fieldset id="sf_fieldset_detalle" class="">
<h2><?php echo __('Detalle Materias') ?></h2>
<div class="form-row">
    <?php include_partial('rendir/verdetalles', array('num' => $num,'dato1' => $dato1, 'datos'=>$datos,'dato2' => $dato2,'dato4' => $dato4,'dato5' => $dato5,'dato6' => $dato6,'dato7' => $dato7,'dato8' => $dato8,'idrendida'=>$rendida->getId(),'plan'=>$canio)) ?>
</div>
</fieldset>

<?}else{?>

<?php if($rendida->getid()!=0){?>
<fieldset id="sf_fieldset_encabezado" class="">
<h2><?php echo __('Encabezado'."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$llama) ?></h2>

<div class="form-row1">
<div class="col2">
<p style="color: #FF0000;"><?php  echo  "Aún no ha enviado Rendida..."; ?></p>
</div>
</div>

<div class="form-row1">
<div class="col1">
<B>Alumno / Matricula :</B><p style="color: #0000FF;"><?php  echo $nomape." (".$alu.") ---  ".$matri ?></p>
</div>
<div class="col2">
<B>Fecha Emision:</B><p style="color: #0000FF;"><?php  echo $fecha2 ?></p>
</div>
</div>

<div class="form-row1">
<div class="col1">
<B>Carrera :</B><p style="color: #0000FF;"><?php  echo $carrera ?></p>
</div>
<div class="col2">
<B>Plan Año :</B><p style="color: #0000FF;"><?php  echo $canio ?></p>
</div>
</div>


</fieldset>


<?php if ($rendida->getId()){ ?>
  <fieldset id="sf_fieldset_detalles" class="">
    <h2><?php echo __('Detalle Rendida') ?></h2>
 <?php include_partial('rendir/verdetalles', array('num' => $num,'dato1' => $dato1, 'datos'=>$datos,'dato2' => $dato2,'dato4' => $dato4,'dato5' => $dato5,'dato6' => $dato6,'dato7' => $dato7,'dato8' => $dato8,'idrendida'=>$rendida->getId(),'plan'=>$canio)) ?>

<? if($alucarre === 7){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Cargar Materias'), 'bcomun1/list?idrendida='.$rendida->getId().'&ida='.$nomape.'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 10){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Cargar Materias'), 'bneuro1/list?idrendida='.$rendida->getId().'&ida='.$nomape.'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 11){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Cargar Materias'), 'bauditiva1/list?idrendida='.$rendida->getId().'&ida='.$nomape.'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 12){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Cargar Materias'), 'bintel1/list?idrendida='.$rendida->getId().'&ida='.$nomape.'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 13){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Cargar Materias'), 'bvisual1/list?idrendida='.$rendida->getId().'&ida='.$nomape.'&idal='.$alu,  array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>


</fieldset>
<?}?>

<?}}?>

<?php include_partial('edit_actions', array('rendida' => $rendida)) ?>

</form>

