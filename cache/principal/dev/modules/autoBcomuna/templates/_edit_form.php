<?php echo form_tag('bcomuna/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($comun, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('comun[fk_establecimiento_id]', __($labels['comun{fk_establecimiento_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('comun{fk_establecimiento_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('comun{fk_establecimiento_id}')): ?>
    <?php echo form_error('comun{fk_establecimiento_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($comun, 'getFkEstablecimientoId', array (
  'related_class' => 'Establecimiento',
  'control_name' => 'comun[fk_establecimiento_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('comun[fk_carrera_id]', __($labels['comun{fk_carrera_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('comun{fk_carrera_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('comun{fk_carrera_id}')): ?>
    <?php echo form_error('comun{fk_carrera_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($comun, 'getFkCarreraId', array (
  'related_class' => 'Carrera',
  'control_name' => 'comun[fk_carrera_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('comun[nombre]', __($labels['comun{nombre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('comun{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('comun{nombre}')): ?>
    <?php echo form_error('comun{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($comun, 'getNombre', array (
  'size' => 80,
  'control_name' => 'comun[nombre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('comun[descripcion]', __($labels['comun{descripcion}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('comun{descripcion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('comun{descripcion}')): ?>
    <?php echo form_error('comun{descripcion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($comun, 'getDescripcion', array (
  'size' => 80,
  'control_name' => 'comun[descripcion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('comun[orden]', __($labels['comun{orden}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('comun{orden}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('comun{orden}')): ?>
    <?php echo form_error('comun{orden}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($comun, 'getOrden', array (
  'size' => 7,
  'control_name' => 'comun[orden]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('comun[anio]', __($labels['comun{anio}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('comun{anio}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('comun{anio}')): ?>
    <?php echo form_error('comun{anio}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($comun, 'getAnio', array (
  'size' => 7,
  'control_name' => 'comun[anio]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('comun' => $comun)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($comun->getId()): ?>
<?php echo button_to(__('delete'), 'bcomuna/delete?id='.$comun->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
