<?php echo form_tag('cursada/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($cursada, 'getId') ?>

<?php     $h2= sfPropelFinder::from('Llamadoscur')->
	     where ('Id','like',$cursada->getFkLlamadaId())->
	     find();
	 foreach ($h2 as $alu2)  
         {
	 //$turno= $alu2->getTurno();
	 $llamado= $alu2->getLlamado();
	 $fini= $alu2->getFechai();
         $ffin= $alu2->getFechaf();
         $id=$alu2->getId();

         $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fechai = $meses[date('n',strtotime($fini))-1];
//$fechaf = $meses[date('n',strtotime($ffin))-1]. " / ".date('Y',strtotime($ffin));

         $llama= $llamado.'&#186 Llamado '.$fechai.' (desde:'.$fini.' hasta: '.$ffin.') ('.$id.')'; 
        } 
?>




<?php $h2= sfPropelFinder::from('Cursada')->
	     where ('Id','like',$cursada->getId())->
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
         $nomape= $alunom." ".$aluape;
          } ?>

<?php ////////////////////////////////////////////////////////////// ?>
<?php $cr=sfPropelFinder::from('RelAlumnoDivision')->
           where('FkAlumnoId', 'like',$alu)->
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
                                //$alucarre=$c9r->getFkCarreraId();
	                	$anionom=$c9r->getDescripcion();
                                //if ($cid==$carreraid)
                                //   {
                                //   $carreraid1='*';  
                                //   }
                                // else
                                //   {
                                //   $carreraid1='';
                                //   }
                                }
                        }
                 }    


?>


<?php ////////////////////////////////////////////////// ?>
<?php $h14= sfPropelFinder::from('Carrera')->
	     where ('Id','like',$alucarre)->
	     find();
	 foreach ($h14 as $alu144)  
         {
         $carrera = $alu144->getDescripcion();
         $canio = $alu144->getAnio();
         } ?>



<?php    $con= $cursada->getId();
          //$this->getRequestParameter('idoconsulta');
         $c2=new Criteria();
         $c2->add(DetallecursadaPeer::FK_CURSADA_ID,"$con", Criteria::LIKE);
         $numero_reg = DetallecursadaPeer::doCount($c2); ?>
         <?php $c=sfPropelFinder::from('Detallecursada')->
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
          $i8=array();
          $e8=0;
          $i9=array();
          $e9=0;


		$i7=array();
        	$e7=0;
        	foreach ($c as $cc)
         	{
	  	$c2=sfPropelFinder::from('Actividad')->
            where('Id', 'like', $cc->getFkActividadId())->
            find();
		// detalle cursada
                $i[$e1++]=$cc->getFkActividadId();
		$i4[$e4++]=$cc->getResult();
		$i5[$e5++]=$cc->getEstado();
    $i8[$e8++]=$cc->getLibro();
    $i9[$e9++]=$cc->getFolio();
    
                $i7[$e7++]= date("d-m-Y",strtotime($cc->getFecha()));
		
		foreach ($c2 as $c3)
		{
                 //  actividad
		 $i1[$e++]= $c3->getNro();
                 $i2[$e2++]=$c3->getDescripcion();
                 $i3[$e3++]=$c3->getId();
                 $i6[$e6++]=$c3->getAnio();
		}
	   }
    ?>


<?php
        $datos = $i; // Envio un array con la denominacion.
	$dato1 = $i1;// Y otro array con los id para poder armar una tabla en la vista..
	$dato2 = $i2; //Envio un array con los codigos.
	$dato3 = $i3; //Envio un array con los costos.
	$dato4 = $i4; //Envio un array con los costos.
	$dato5 = $i5; //Envio un array con los Ac.
	$dato6 = $i6; //Envio un array con los Ac.
	$dato7 = $i7; //Envio un array con los Ac.
  $dato8 = $i8; //Envio un array con los Ac.
  $dato9 = $i9; //Envio un array con los Ac.
	$num= $numero_reg;
?>

<?php
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha2 = $dias[date('w',strtotime($fee))]." ".date('d',strtotime($fee))." de ".$meses[date('n',strtotime($fee))-1]. " del ".date('Y',strtotime($fee));?>


<?php if($cursada->getAuxi()==1){?>

<fieldset id="sf_fieldset_encabezado" class="">
<h2><?php echo __('Encabezado: '."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$llama) ?></h2>

<div class="form-row1">

<div class="col1">
<B>Alumno / Matricula :</B><p style="color: #0000FF;"><?php  echo $nomape."  ---  ".$matri ?></p>
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
    <?php include_partial('cursadaa/verdetalles', array('num' => $num,'dato1' => $dato1, 'datos'=>$datos,'dato2' => $dato2,'dato3' => $dato3,'dato4' => $dato4,'dato5' => $dato5,'dato6' => $dato6,'dato7' => $dato7,'dato8' => $dato8,'dato9' => $dato9,'idcursada'=>$cursada->getId(),'plan'=>$canio)) ?>
</div>
</fieldset>

<?}else{?>

<?php if($cursada->getid()!=0){?>
<fieldset id="sf_fieldset_encabezado" class="">
<h2><?php echo __('Encabezado:'."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$llama) ?></h2>

<div class="form-row1">
<div class="col2">
<p style="color: #FF0000;"><?php  echo  "Aún no ha guardado Cursada..."; ?></p>
</div>
</div>

<div class="form-row1">
<div class="col1">
<B>Alumno / Matricula :</B><p style="color: #0000FF;"><?php  echo $nomape."  --  ".$matri ?></p>
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

<? if($num === '' || $num === null || $num ===0){?>

 <ul class="sf_admin_actions">
   <li><?php echo button_to(('Cambiar Alumno '),'buscaalumno/list?idcursada='.$cursada->getId(), array (
                'class' => 'sf_admin_action_create1',
                ))?></li></ul>

<?}?>



</fieldset>


<?php if ($cursada->getId()){ ?>
  <fieldset id="sf_fieldset_detalles" class="">
    <h2><?php echo __('Detalle Cursada') ?></h2>
 <?php include_partial('cursadaa/verdetalles', array('num' => $num,'dato1' => $dato1, 'datos'=>$datos,'dato2' => $dato2,'dato3' => $dato3,'dato4' => $dato4,'dato5' => $dato5,'dato6' => $dato6,'dato7' => $dato7,'dato8' => $dato8,'dato9' => $dato9,'idcursada'=>$cursada->getId(),'plan'=>$canio)) ?>

<? if($alucarre === 7){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Modificar Materias y nota'), 'bcomuna/list?idcursada='.$cursada->getId().'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 10){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Modificar Materias y nota'), 'bneuroa/list?idcursada='.$cursada->getId().'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 11){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Modificar Materias y nota'), 'bauditivaa/list?idcursada='.$cursada->getId().'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 12){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Modificar Materias y nota'), 'bintela/list?idcursada='.$cursada->getId().'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>

<? if($alucarre === 13){?>
<ul class="sf_admin_actions">
      <li><?php echo button_to(('Modificar Materias y nota'), 'bvisuala/list?idcursada='.$cursada->getId().'&idal='.$alu, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>
<?}?>


</fieldset>
<?}?>

<?}}?>

<?php include_partial('edit_actions', array('cursada' => $cursada)) ?>
</form>
<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cursada->getId()): ?>
<?php echo button_to(__('Borrar'), 'cursadaa/delete?id='.$cursada->getId(), array (
  'post' => true,
  'confirm' => __('Esta Usted seguro?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
