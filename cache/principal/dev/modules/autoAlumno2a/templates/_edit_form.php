<?php echo form_tag('alumno2a/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($alumno, 'getId') ?>

<fieldset id="sf_fieldset_informacion_general" class="">
<h2><?php echo __('Informacion general') ?></h2>


<div class="form-row">
  <?php echo label_for('alumno[legajo_numero]', __($labels['alumno{legajo_numero}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{legajo_numero}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{legajo_numero}')): ?>
    <?php echo form_error('alumno{legajo_numero}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getLegajoNumero', array (
  'size' => 7,
  'control_name' => 'alumno[legajo_numero]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[legajo_prefijo]', __($labels['alumno{legajo_prefijo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{legajo_prefijo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{legajo_prefijo}')): ?>
    <?php echo form_error('alumno{legajo_prefijo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getLegajoPrefijo', array (
  'size' => 20,
  'control_name' => 'alumno[legajo_prefijo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

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
  <?php echo label_for('alumno[sexo]', __($labels['alumno{sexo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{sexo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{sexo}')): ?>
    <?php echo form_error('alumno{sexo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('sexo', array('type' => 'edit', 'alumno' => $alumno)); echo $value ? $value : '&nbsp;' ?>
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
  'size' => 8,
  'control_name' => 'alumno[nro_documento]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[fecha_nacimiento]', __($labels['alumno{fecha_nacimiento}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{fecha_nacimiento}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{fecha_nacimiento}')): ?>
    <?php echo form_error('alumno{fecha_nacimiento}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($alumno, 'getFechaNacimiento', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'alumno[fecha_nacimiento]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[fk_pais_id]', __($labels['alumno{fk_pais_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{fk_pais_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{fk_pais_id}')): ?>
    <?php echo form_error('alumno{fk_pais_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alumno, 'getFkPaisId', array (
  'related_class' => 'Pais',
  'control_name' => 'alumno[fk_pais_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[email]', __($labels['alumno{email}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{email}')): ?>
    <?php echo form_error('alumno{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getEmail', array (
  'size' => 64,
  'control_name' => 'alumno[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[activo]', __($labels['alumno{activo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{activo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{activo}')): ?>
    <?php echo form_error('alumno{activo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($alumno, 'getActivo', array (
  'control_name' => 'alumno[activo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[fk_estadoalumno_id]', __($labels['alumno{fk_estadoalumno_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{fk_estadoalumno_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{fk_estadoalumno_id}')): ?>
    <?php echo form_error('alumno{fk_estadoalumno_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alumno, 'getFkEstadoalumnoId', array (
  'related_class' => 'Estadosalumnos',
  'control_name' => 'alumno[fk_estadoalumno_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_donde_vive" class="">
<h2><?php echo __('Donde vive') ?></h2>


<div class="form-row">
  <?php echo label_for('alumno[direccion]', __($labels['alumno{direccion}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{direccion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{direccion}')): ?>
    <?php echo form_error('alumno{direccion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getDireccion', array (
  'size' => 64,
  'control_name' => 'alumno[direccion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[ciudad]', __($labels['alumno{ciudad}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{ciudad}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{ciudad}')): ?>
    <?php echo form_error('alumno{ciudad}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getCiudad', array (
  'size' => 64,
  'control_name' => 'alumno[ciudad]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[fk_provincia_id]', __($labels['alumno{fk_provincia_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{fk_provincia_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{fk_provincia_id}')): ?>
    <?php echo form_error('alumno{fk_provincia_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alumno, 'getFkProvinciaId', array (
  'related_class' => 'Provincia',
  'control_name' => 'alumno[fk_provincia_id]',
  'include_custom' => '--Seleccione una Provincia--',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alumno[telefono]', __($labels['alumno{telefono}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{telefono}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{telefono}')): ?>
    <?php echo form_error('alumno{telefono}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getTelefono', array (
  'size' => 20,
  'control_name' => 'alumno[telefono]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_otros" class="">
<h2><?php echo __('Otros') ?></h2>


<div class="form-row">
  <?php echo label_for('alumno[observacion]', __($labels['alumno{observacion}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{observacion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{observacion}')): ?>
    <?php echo form_error('alumno{observacion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($alumno, 'getObservacion', array (
  'size' => 80,
  'control_name' => 'alumno[observacion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('alumno' => $alumno)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($alumno->getId()): ?>
<?php echo button_to(__('delete'), 'alumno2a/delete?id='.$alumno->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
