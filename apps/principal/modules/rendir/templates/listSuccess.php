<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php $idusu = $sf_user->getAttribute('id');?>

 <?php $h10= sfPropelFinder::from('Usuario')->
     where ('Id','like',$sf_user->getAttribute('id'))->
     find();
     foreach ($h10 as $c10)  
       {
       $alu=$c10->getFKAlumno();        
        }

       $h1= sfPropelFinder::from('Usuario')->
     where ('Id','like',5)->
     find();
     foreach ($h1 as $css)  
       {
       	$css->setNroDocumento($alu);
        $css->save();
        }
?>
<div id="sf_admin_container">

<h1><?php echo __('Solicitudes de Rendidas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('rendir/list_header', array('pager' => $pager)) ?>
<?php include_partial('rendir/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>

<?php include_partial('rendir/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_batch_actions') ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('rendir/list_footer', array('pager' => $pager)) ?>
</div>

</div>
