<?php echo form_tag('rendir/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($rendida, 'getId') ?>

<fieldset id="sf_fieldset_encabezado" class="">
<h2><?php echo __('Encabezado') ?></h2>


<div class="form-row">
  <?php echo label_for('rendida[alumno]', __($labels['rendida{alumno}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('rendida{alumno}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rendida{alumno}')): ?>
    <?php echo form_error('rendida{alumno}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($rendida, 'getAlumno', array (
  'disabled' => true,
  'control_name' => 'rendida[alumno]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('rendida[fecha]', __($labels['rendida{fecha}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('rendida{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rendida{fecha}')): ?>
    <?php echo form_error('rendida{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($rendida, 'getFecha', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'rendida[fecha]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('rendida[matricula]', __($labels['rendida{matricula}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('rendida{matricula}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rendida{matricula}')): ?>
    <?php echo form_error('rendida{matricula}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($rendida, 'getMatricula', array (
  'size' => 20,
  'control_name' => 'rendida[matricula]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_detalle" class="">
<h2><?php echo __('Detalle') ?></h2>


<div class="form-row">
  <?php echo label_for('rendida[matricula]', __($labels['rendida{matricula}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('rendida{matricula}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rendida{matricula}')): ?>
    <?php echo form_error('rendida{matricula}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($rendida, 'getMatricula', array (
  'size' => 20,
  'control_name' => 'rendida[matricula]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('rendida' => $rendida)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($rendida->getId()): ?>
<?php echo button_to(__('Borrar'), 'rendir/delete?id='.$rendida->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
