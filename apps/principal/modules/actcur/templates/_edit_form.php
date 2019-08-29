<?php echo form_tag('actcur/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($llamadoacur, 'getId') ?>

<fieldset id="sf_fieldset__" class="">
<h2><?php echo __(' ') ?></h2>


<?php $h2= sfPropelFinder::from('Llamadoscur')->
     where ('Id','like',$llamadoacur->getFkLlamadoscurId())->
     find();
     foreach ($h2 as $h31)  
       {        
	$llama=$h31->getLlamado();
        $desde=$h31->getFechai();
        $hasta=$h31->getFechaf();
       } ?>

<div class="form-row">
  <?php echo "Llamado Actual :"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$llama.'&#186 Llamado Desde '.$desde. ' hasta '.$hasta ?>

</div>


<div class="form-row">
  <?php echo label_for('llamadoacur[llamado]', __($labels['llamadoacur{llamado}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('llamadoacur{llamado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('llamadoacur{llamado}')): ?>
    <?php echo form_error('llamadoacur{llamado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($llamadoacur, 'getLlamado', array (
  'control_name' => 'llamadoacur[llamado]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('llamadoacur' => $llamadoacur)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
