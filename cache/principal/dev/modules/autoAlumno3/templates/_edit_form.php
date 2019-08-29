<?php echo form_tag('alumno3/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($alumno, 'getId') ?>

<fieldset id="sf_fieldset_informacion_personal" class="">
<h2><?php echo __('Informacion Personal') ?></h2>


<div class="form-row">
  <?php echo label_for('alumno[apellido]', __($labels['alumno{apellido}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{apellido}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{apellido}')): ?>
    <?php echo form_error('alumno{apellido}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getApellido', array (
  'size' => 64,
  'control_name' => 'alumno[apellido]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[nombre]', __($labels['alumno{nombre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{nombre}')): ?>
    <?php echo form_error('alumno{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getNombre', array (
  'size' => 64,
  'control_name' => 'alumno[nombre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[fk_tipodocumento_id]', __($labels['alumno{fk_tipodocumento_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{fk_tipodocumento_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{fk_tipodocumento_id}')): ?>
    <?php echo form_error('alumno{fk_tipodocumento_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alumno, 'getFkTipodocumentoId', array (
  'related_class' => 'Tipodocumento',
  'control_name' => 'alumno[fk_tipodocumento_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[nro_documento]', __($labels['alumno{nro_documento}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{nro_documento}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{nro_documento}')): ?>
    <?php echo form_error('alumno{nro_documento}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getNroDocumento', array (
  'size' => 16,
  'control_name' => 'alumno[nro_documento]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[adeuda]', __($labels['alumno{adeuda}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{adeuda}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{adeuda}')): ?>
    <?php echo form_error('alumno{adeuda}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($alumno, 'getAdeuda', array (
  'control_name' => 'alumno[adeuda]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('alumno' => $alumno)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
