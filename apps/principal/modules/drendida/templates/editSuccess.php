<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>


<?php $h1= sfPropelFinder::from('Actividad')->
	     where ('Id','like',$detallerendir->getFkActividadId())->
	     find();
	 foreach ($h1 as $cur)  
         {
         $nom = $cur->getNombre();
         $ord = $cur->getNro();
         $anio = $cur->getAnio();         
          } ?>
 
<div id="sf_admin_container">


<h1><?php echo __('Actualizar Datos Materia', 
array())?></h1>

<h2><?php echo "Materia: ".$nom.' '.'- Año:'.$anio.' '.'Orden:'.$ord.' -  Rendida N&#186: '.$detallerendir->getFkCursadaId() ?></h2>


<div id="sf_admin_header">
<?php include_partial('drendida/edit_header', array('detallerendir' => $detallerendir)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('drendida/edit_messages', array('detallerendir' => $detallerendir, 'labels' => $labels)) ?>
<?php include_partial('drendida/edit_form', array('detallerendir' => $detallerendir, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('drendida/edit_footer', array('detallerendir' => $detallerendir)) ?>
</div>

</div>



