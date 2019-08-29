<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>


<?php $h1= sfPropelFinder::from('Actividad')->
	     where ('Id','like',$detallecursada->getFkActividadId())->
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

<h2><?php echo "Materia: ".$nom.' '.'- Año:'.$anio.' '.'Orden:'.$ord.' -  Cursada N&#186: '.$detallecursada->getFkCursadaId() ?></h2>



<div id="sf_admin_header">
<?php include_partial('dcursada/edit_header', array('detallecursada' => $detallecursada)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('dcursada/edit_messages', array('detallecursada' => $detallecursada, 'labels' => $labels)) ?>
<?php include_partial('dcursada/edit_form', array('detallecursada' => $detallecursada, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('dcursada/edit_footer', array('detallecursada' => $detallecursada)) ?>
</div>

</div>
