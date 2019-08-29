<?php echo form_tag('horasdocente/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($rel_anio_actividad, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('rel_anio_actividad[horas]', __($labels['rel_anio_actividad{horas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('rel_anio_actividad{horas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rel_anio_actividad{horas}')): ?>
    <?php echo form_error('rel_anio_actividad{horas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($rel_anio_actividad, 'getHoras', array (
  'size' => 7,
  'control_name' => 'rel_anio_actividad[horas]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('rel_anio_actividad' => $rel_anio_actividad)) ?>

</form>


