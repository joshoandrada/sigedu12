<?php echo form_tag('drendida/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($detallerendir, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">


<div class="form-row">
  <?php echo label_for('detallerendir[result]', __($labels['detallerendir{result}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallerendir{result}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallerendir{result}')): ?>
    <?php echo form_error('detallerendir{result}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($detallerendir, 'getResult', array (
  'size' => 7,
  'control_name' => 'detallerendir[result]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallerendir[libro]', __($labels['detallerendir{libro}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallerendir{libro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallerendir{libro}')): ?>
    <?php echo form_error('detallerendir{libro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($detallerendir, 'getLibro', array (
  'size' => 7,
  'control_name' => 'detallerendir[libro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallerendir[folio]', __($labels['detallerendir{folio}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallerendir{folio}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallerendir{folio}')): ?>
    <?php echo form_error('detallerendir{folio}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($detallerendir, 'getFolio', array (
  'size' => 7,
  'control_name' => 'detallerendir[folio]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallerendir[fecha]', __($labels['detallerendir{fecha}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallerendir{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallerendir{fecha}')): ?>
    <?php echo form_error('detallerendir{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($detallerendir, 'getFecha', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'detallerendir[fecha]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


<div class="form-row">
  <?php echo label_for('detallerendir[fk_dcursada_id]', __($labels['detallerendir{fk_dcursada_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('detallerendir{fk_dcursada_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallerendir{fk_dcursada_id}')): ?>
    <?php echo form_error('detallerendir{fk_dcursada_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($detallerendir, 'getFkDcursadaId', array (
  'related_class' => 'Estadomateren',
  'control_name' => 'detallerendir[fk_dcursada_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


</fieldset>

<?php include_partial('edit_actions', array('detallerendir' => $detallerendir)) ?>

</form>


