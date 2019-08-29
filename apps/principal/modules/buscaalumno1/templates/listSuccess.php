<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">




<h1><?php echo __('Elegir Alumno para Rendir', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('buscaalumno1/list_header', array('pager' => $pager)) ?>
<?php include_partial('buscaalumno1/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('buscaalumno1/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_batch_actions') ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('buscaalumno1/list_footer', array('pager' => $pager)) ?>
</div>

</div>

<?php $mensa= $sf_params->get('msj'); ?>

<?php if ($mensa){?>
<input type="hidden" id="pro" name="pro"  value="<?php echo $mensa; ?>">
<script>
var pro=document.getElementById("pro").value;
alert('Mensaje : '+pro)
</script>
<?}?>



