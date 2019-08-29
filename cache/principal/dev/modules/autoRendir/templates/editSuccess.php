<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Detalle de Rendida', 
array()) ?></h1>

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
