<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Actualizar Horas', 
array()) ?></h1>

<h2><?php echo "Materia: ".$rel_anio_actividad->getActividad()->getNombre().' - Turno: '.$rel_anio_actividad->getTurno()->getDescripcion().' - Orientacion: '.$rel_anio_actividad->getOrientacion()->getNombre() ?></h2>

<div id="sf_admin_header">
<?php include_partial('horasdocente/edit_header', array('rel_anio_actividad' => $rel_anio_actividad)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('horasdocente/edit_messages', array('rel_anio_actividad' => $rel_anio_actividad, 'labels' => $labels)) ?>
<?php include_partial('horasdocente/edit_form', array('rel_anio_actividad' => $rel_anio_actividad, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('horasdocente/edit_footer', array('rel_anio_actividad' => $rel_anio_actividad)) ?>
</div>

</div>

