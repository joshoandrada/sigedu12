<?php echo form_tag('usuarioa/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($usuario, 'getId') ?>

<fieldset id="sf_fieldset_general" class="">
<h2><?php echo __('General') ?></h2>


<div class="form-row">
  <?php echo label_for('usuario[usuario]', __($labels['usuario{usuario}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{usuario}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{usuario}')): ?>
    <?php echo form_error('usuario{usuario}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuario, 'getUsuario', array (
  'size' => 32,
  'control_name' => 'usuario[usuario]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[clave]', __($labels['usuario{clave}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{clave}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{clave}')): ?>
    <?php echo form_error('usuario{clave}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('clave', array('type' => 'edit', 'usuario' => $usuario)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[correo_publico]', __($labels['usuario{correo_publico}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{correo_publico}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{correo_publico}')): ?>
    <?php echo form_error('usuario{correo_publico}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($usuario, 'getCorreoPublico', array (
  'control_name' => 'usuario[correo_publico]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[email]', __($labels['usuario{email}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{email}')): ?>
    <?php echo form_error('usuario{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuario, 'getEmail', array (
  'size' => 80,
  'control_name' => 'usuario[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[activo]', __($labels['usuario{activo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{activo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{activo}')): ?>
    <?php echo form_error('usuario{activo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($usuario, 'getActivo', array (
  'control_name' => 'usuario[activo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[fecha_creado]', __($labels['usuario{fecha_creado}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{fecha_creado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{fecha_creado}')): ?>
    <?php echo form_error('usuario{fecha_creado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = ($usuario->getFechaCreado() !== null && $usuario->getFechaCreado() !== '') ? format_date($usuario->getFechaCreado(), "f") : ''; echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[fecha_actualizado]', __($labels['usuario{fecha_actualizado}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{fecha_actualizado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{fecha_actualizado}')): ?>
    <?php echo form_error('usuario{fecha_actualizado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = ($usuario->getFechaActualizado() !== null && $usuario->getFechaActualizado() !== '') ? format_date($usuario->getFechaActualizado(), "f") : ''; echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[fk_establecimiento_id]', __($labels['usuario{fk_establecimiento_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{fk_establecimiento_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{fk_establecimiento_id}')): ?>
    <?php echo form_error('usuario{fk_establecimiento_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($usuario, 'getFkEstablecimientoId', array (
  'related_class' => 'Establecimiento',
  'control_name' => 'usuario[fk_establecimiento_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_si_olvida_su_clave_se_le_realizar_aacute__un_pregunta_se_seguridad" class="">
<h2><?php echo __('Si olvida su clave se le realizar&aacute; un pregunta se seguridad') ?></h2>


<div class="form-row">
  <?php echo label_for('usuario[seguridad_pregunta]', __($labels['usuario{seguridad_pregunta}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{seguridad_pregunta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{seguridad_pregunta}')): ?>
    <?php echo form_error('usuario{seguridad_pregunta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuario, 'getSeguridadPregunta', array (
  'size' => 80,
  'control_name' => 'usuario[seguridad_pregunta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_deber_aacute__ingresar_una_respuesta_para_validarla_" class="">
<h2><?php echo __('Deber&aacute; ingresar una respuesta para validarla ') ?></h2>


<div class="form-row">
  <?php echo label_for('usuario[seguridad_respuesta]', __($labels['usuario{seguridad_respuesta}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{seguridad_respuesta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{seguridad_respuesta}')): ?>
    <?php echo form_error('usuario{seguridad_respuesta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuario, 'getSeguridadRespuesta', array (
  'size' => 80,
  'control_name' => 'usuario[seguridad_respuesta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('usuario' => $usuario)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($usuario->getId()): ?>
<?php echo button_to(__('delete'), 'usuarioa/delete?id='.$usuario->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
