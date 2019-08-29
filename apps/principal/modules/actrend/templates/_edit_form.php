<?php echo form_tag('actrend/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($llamadoa, 'getId') ?>

<fieldset id="sf_fieldset__" class="">
<h2><?php echo __(' ') ?></h2>

<?php $h2= sfPropelFinder::from('Llamados')->
     where ('Id','like',$llamadoa->getFkLlamadosId())->
     find();
     foreach ($h2 as $h31)  
       {        
	$llama=$h31->getLlamado();
        $desde=$h31->getFechai();
        $hasta=$h31->getFechaf();
        $turno=$h31->getTurno();
 
       } ?>

<div class="form-row">
  <?php echo "Llamado Actual :"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$turno.'&#186 Turno '.$llama.'&#186 Llamado Desde '.$desde. ' hasta '.$hasta ?>

</div>



<div class="form-row">
  <?php echo label_for('llamadoa[llamado]', __($labels['llamadoa{llamado}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('llamadoa{llamado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('llamadoa{llamado}')): ?>
    <?php echo form_error('llamadoa{llamado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($llamadoa, 'getLlamado', array (
  'control_name' => 'llamadoa[llamado]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('llamadoa' => $llamadoa)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
