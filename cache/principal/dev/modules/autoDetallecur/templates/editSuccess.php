<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Actualizar cursadas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('detallecur/edit_header', array('detallecursada' => $detallecursada)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('detallecur/edit_messages', array('detallecursada' => $detallecursada, 'labels' => $labels)) ?>
<?php include_partial('detallecur/edit_form', array('detallecursada' => $detallecursada, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('detallecur/edit_footer', array('detallecursada' => $detallecursada)) ?>
</div>

</div>
