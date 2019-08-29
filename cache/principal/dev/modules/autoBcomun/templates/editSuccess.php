<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit bcomun', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('bcomun/edit_header', array('comun' => $comun)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('bcomun/edit_messages', array('comun' => $comun, 'labels' => $labels)) ?>
<?php include_partial('bcomun/edit_form', array('comun' => $comun, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('bcomun/edit_footer', array('comun' => $comun)) ?>
</div>

</div>
