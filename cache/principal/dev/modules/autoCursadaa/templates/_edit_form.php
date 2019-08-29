<?php echo form_tag('cursadaa/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($cursada, 'getId') ?>

<fieldset id="sf_fieldset_encabezado" class="">
<h2><?php echo __('Encabezado') ?></h2>


<div class="form-row">
  <?php echo label_for('cursada[alumno]', __($labels['cursada{alumno}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('cursada{alumno}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cursada{alumno}')): ?>
    <?php echo form_error('cursada{alumno}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cursada, 'getAlumno', array (
  'disabled' => true,
  'control_name' => 'cursada[alumno]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('cursada[fecha]', __($labels['cursada{fecha}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cursada{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cursada{fecha}')): ?>
    <?php echo form_error('cursada{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cursada, 'getFecha', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cursada[fecha]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('cursada[matricula]', __($labels['cursada{matricula}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('cursada{matricula}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cursada{matricula}')): ?>
    <?php echo form_error('cursada{matricula}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cursada, 'getMatricula', array (
  'size' => 20,
  'control_name' => 'cursada[matricula]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_detalle" class="">
<h2><?php echo __('Detalle') ?></h2>


<div class="form-row">
  <?php echo label_for('cursada[matricula]', __($labels['cursada{matricula}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('cursada{matricula}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cursada{matricula}')): ?>
    <?php echo form_error('cursada{matricula}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cursada, 'getMatricula', array (
  'size' => 20,
  'control_name' => 'cursada[matricula]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('cursada' => $cursada)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cursada->getId()): ?>
<?php echo button_to(__('Borrar'), 'cursadaa/delete?id='.$cursada->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
