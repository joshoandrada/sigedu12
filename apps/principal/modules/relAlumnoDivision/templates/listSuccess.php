<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<?php       $ht1= sfPropelFinder::from('Division')->
        where ('Id','like',$sf_params->get('filters[fk_division_id]'))->
        find();
        foreach ($ht1 as $ct1)  
         {
          $descrip = $ct1->getDescripcion();
         }?>



<h1><?php echo __('Listado de Alumnos por Division ', 
array()) ?></h1>


<div id="sf_admin_header">
<?php include_partial('relAlumnoDivision/list_header', array('pager' => $pager)) ?>
<?php include_partial('relAlumnoDivision/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters)) ?>
</div>

<?php if ($sf_params->get('filters[fk_division_id]')){?>
<div id="sf_admin_content">
<h2><?php echo 'Alumnos de '.$descrip; ?></h2>
<p>
</div>
<?php }?>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('relAlumnoDivision/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_batch_actions') ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('relAlumnoDivision/list_footer', array('pager' => $pager)) ?>
</div>
