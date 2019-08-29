<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">


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
 
$fecha2 = $meses[date('n',strtotime($fini))-1]. " ".date('Y',strtotime($fini));

$llama= $turno.'&#186 Turno - '.$llamado.'&#186 Llamado '.$fecha2.' ('.$id.')'; 
 
?>

<h1><?php echo __('Rendida ', 
array()).'N&#186: '.$rendida->getId() ?></h1>

<h3><?php //echo $llama ?></h3>
<p></p>

<div id="sf_admin_header">
<?php include_partial('rendir/edit_header', array('rendida' => $rendida)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('rendir/edit_messages', array('rendida' => $rendida, 'labels' => $labels)) ?>
<?php include_partial('rendir/edit_form', array('rendida' => $rendida, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('rendir/edit_footer', array('rendida' => $rendida)) ?>
</div>

</div>
