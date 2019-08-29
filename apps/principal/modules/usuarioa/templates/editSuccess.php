<?php
// auto-generated by sfPropelAdmin
// date: 2007/02/12 11:25:47

use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<div id="sf_admin_header">
    <?php include_partial('usuarioa/edit_header', array('usuario' => $usuario)) ?>
</div>
<div id="sf_admin_container">
<?php if ($sf_request->hasErrors()): ?>
    <div class="form-errors">
        <h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
        <ul>
         <?php foreach ($sf_request->getErrorNames() as $name): ?>
            <li><?php echo $sf_request->getError($name) ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php elseif ($sf_user->hasFlash('notice')): ?>
    <div class="save-ok">
        <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
    </div>
<?php endif; ?>

<?php echo form_tag('usuarioa/edit', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php echo object_input_hidden_tag($usuario, 'getId') ?>

<fieldset id="sf_fieldset_general" class="">
<h2><?php echo __('General') ?></h2>

<div class="form-row">
  <?php echo label_for('usuario[usuario]', __('Usuario:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{usuario}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{usuario}')): ?>
    <?php echo form_error('usuario{usuario}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($usuario, 'getUsuario', array (
  'size' => 20,
  'control_name' => 'usuario[usuario]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[clave]', __('Clave:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{clave}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{clave}')): ?>
    <?php echo form_error('usuario{clave}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo include_partial('clave', array('type' => 'edit', 'usuario' => $usuario)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[correo_publico]', __('correo publico?:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{correo_publico}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{correo_publico}')): ?>
    <?php echo form_error('usuario{correo_publico}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_checkbox_tag($usuario, 'getCorreoPublico', array (
  'control_name' => 'usuario[correo_publico]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[email]', __('email:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{email}')): ?>
    <?php echo form_error('usuario{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($usuario, 'getEmail', array (
  'size' => 20,
  'control_name' => 'usuario[email]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[activo]', __('esta activo?:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{activo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{activo}')): ?>
    <?php echo form_error('usuario{activo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_checkbox_tag($usuario, 'getActivo', array (
  'control_name' => 'usuario[activo]',
)) ?>
    </div>
</div>
<?php if ($sf_params->get('action') != "create"): ?>
<div class="form-row">
  <?php echo label_for('usuario[fecha_creado]', __('Creado:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{fecha_creado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{fecha_creado}')): ?>
    <?php echo form_error('usuario{fecha_creado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo ($usuario->getFechaCreado() !== null && $usuario->getFechaCreado() !== '') ? format_date($usuario->getFechaCreado(), "f") : '' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[fecha_actualizado]', __('Modificado:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{fecha_actualizado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{fecha_actualizado}')): ?>
    <?php echo form_error('usuario{fecha_actualizado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo ($usuario->getFechaActualizado() !== null && $usuario->getFechaActualizado() !== '') ? format_date($usuario->getFechaActualizado(), "f") : '' ?>
    </div>
</div>
<?php endif;?>
<div class="form-row">
  <?php echo label_for('usuario[fk_establecimiento_id]', __('Establecimiento:'), 'class="required" ') ?>&nbsp;
  <div class="content<?php if ($sf_request->hasError('usuario{fk_establecimiento_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{fk_establecimiento_id}')): ?>
    <?php echo form_error('usuario{fk_establecimiento_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php echo object_select_tag($usuario, 'getFkEstablecimientoId', array (
  'related_class' => 'Establecimiento',
  'control_name' => 'usuario[fk_establecimiento_id]',
)) ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_si_olvida_su_clave_se_le_realizar_aacute__un_pregunta_se_seguridad" class="">
<h2><?php echo __('Si olvida su clave se le realizar&aacute; un pregunta se seguridad') ?></h2>

<div class="form-row">
  <?php echo label_for('usuario[seguridad_pregunta]', __('Pregunta:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{seguridad_pregunta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{seguridad_pregunta}')): ?>
    <?php echo form_error('usuario{seguridad_pregunta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($usuario, 'getSeguridadPregunta', array (
  'size' => 20,
  'control_name' => 'usuario[seguridad_pregunta]',
)) ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_deber_aacute__ingresar_una_respuesta_para_validarla_" class="">
<h2><?php echo __('Deber&aacute; ingresar una respuesta para validarla ') ?></h2>

<div class="form-row">
  <?php echo label_for('usuario[seguridad_respuesta]', __('Respuesta:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{seguridad_respuesta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{seguridad_respuesta}')): ?>
    <?php echo form_error('usuario{seguridad_respuesta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($usuario, 'getSeguridadRespuesta', array (
  'size' => 20,
  'control_name' => 'usuario[seguridad_respuesta]',
)) ?>
    </div>
</div>

</fieldset>

<?php echo include_partial('edit_actions', array('usuario' => $usuario)) ?>

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

</div>

<div id="sf_admin_footer">
<?php include_partial('usuarioa/edit_footer', array('usuario' => $usuario)) ?>
</div>
