<?php echo form_tag('llamadoacur/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($llamadoacur, 'getId') ?>


<?php $h1= sfPropelFinder::from('Llamadoacur')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h1 as $alu)  
         {
	 $idllamadoa= $alu->getFkLlamadoscurId();
         } 
?>

<?php $h2= sfPropelFinder::from('Llamadoscur')->
	     where ('Id','like',$idllamadoa)->
	     find();
	 foreach ($h2 as $alu2)  
         {
	 $turno= $alu2->getTurno();
	 $llamado= $alu2->getLlamado();
	 $fini= $alu2->getFechai();
	 $ffin= $alu2->getFechaf();
         $id=$alu2->getId();
         $llama= $llamado.'&#186 Llamado - desde:'.$fini.' hasta: '.$ffin.' ('.$id.')'; 
        } 
?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">

<h3><?php echo 'Llamado actual : '?>
<p style="color: #0000FF;"><?php  echo $llama ?></h3>
<p></p>

  <div class="content<?php if ($sf_request->hasError('llamadoacur{fk_llamadoscur_id}')): ?> form-error<?php endif; ?>">

 <h3><?php echo 'Nuevo llamado : '?></h3>
<p></p>


    <?php if ($sf_request->hasError('llamadoacur{fk_llamadoscur_id}')): ?>
    <?php echo form_error('llamadoacur{fk_llamadoscur_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($llamadoacur, 'getFkLlamadoscurId', array (
  'related_class' => 'Llamadoscur',
  'control_name' => 'llamadoacur[fk_llamadoscur_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('llamadoacur' => $llamadoacur)) ?>

</form>

