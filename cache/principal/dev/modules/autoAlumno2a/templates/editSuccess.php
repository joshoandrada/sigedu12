<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __(' ', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('alumno2a/edit_header', array('alumno' => $alumno)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('alumno2a/edit_messages', array('alumno' => $alumno, 'labels' => $labels)) ?>
<?php include_partial('alumno2a/edit_form', array('alumno' => $alumno, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('alumno2a/edit_footer', array('alumno' => $alumno)) ?>
</div>

</div>
