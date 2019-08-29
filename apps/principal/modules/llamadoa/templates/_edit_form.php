<?php echo form_tag('llamadoa/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($llamadoa, 'getId') ?>

<?php $h1= sfPropelFinder::from('Llamadoa')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h1 as $alu)  
         {
	 $idllamadoa= $alu->getFkLlamadosId();
         } 
?>

<?php $h2= sfPropelFinder::from('Llamados')->
	     where ('Id','like',$idllamadoa)->
	     find();
	 foreach ($h2 as $alu2)  
         {
	 $turno= $alu2->getTurno();
	 $llamado= $alu2->getLlamado();
	 $fini= $alu2->getFechai();
	 $ffin= $alu2->getFechaf();
         $id=$alu2->getId();
         $llama= $turno.'&#186 Turno - '.$llamado.'&#186 Llamado - desde:'.$fini.' hasta: '.$ffin.' ('.$id.')'; 
        } 
?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">

  <?php// echo label_for('llamadoa[fk_llamados_id]', __($labels['llamadoa{fk_llamados_id}']), 'class="required" ') ?>



<h3><?php echo 'Llamado actual : '?>
<p style="color: #0000FF;"><?php  echo $llama ?></h3>
<p></p>



  <div class="content<?php if ($sf_request->hasError('llamadoa{fk_llamados_id}')): ?> form-error<?php endif; ?>">

<h3><?php echo 'Nuevo llamado : '?></h3>
<p></p>


  <?php if ($sf_request->hasError('llamadoa{fk_llamados_id}')): ?>
    <?php echo form_error('llamadoa{fk_llamados_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_select_tag($llamadoa, 'getFkLlamadosId', array (
  'related_class' => 'Llamados',
  'control_name' => 'llamadoa[fk_llamados_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('llamadoa' => $llamadoa)) ?>

</form>


