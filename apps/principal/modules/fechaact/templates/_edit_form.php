<?php echo form_tag('fechaact/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($actividad, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('actividad[fecha]', __($labels['actividad{fecha}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('actividad{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('actividad{fecha}')): ?>
    <?php echo form_error('actividad{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($actividad, 'getFecha', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'actividad[fecha]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('actividad' => $actividad)) ?>

</form>


