<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Actualizar Fecha de Acta', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fechaact/edit_header', array('actividad' => $actividad)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fechaact/edit_messages', array('actividad' => $actividad, 'labels' => $labels)) ?>
<?php include_partial('fechaact/edit_form', array('actividad' => $actividad, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fechaact/edit_footer', array('actividad' => $actividad)) ?>
</div>

</div>
