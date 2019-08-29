<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Detalle de Cursada', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('cursada/edit_header', array('cursada' => $cursada)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('cursada/edit_messages', array('cursada' => $cursada, 'labels' => $labels)) ?>
<?php include_partial('cursada/edit_form', array('cursada' => $cursada, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('cursada/edit_footer', array('cursada' => $cursada)) ?>
</div>

</div>
