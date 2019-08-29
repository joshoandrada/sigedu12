<?php echo form_tag('dcursada/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($detallecursada, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('detallecursada[result]', __($labels['detallecursada{result}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallecursada{result}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallecursada{result}')): ?>
    <?php echo form_error('detallecursada{result}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($detallecursada, 'getResult', array (
  'size' => 7,
  'control_name' => 'detallecursada[result]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallecursada[fecha]', __($labels['detallecursada{fecha}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallecursada{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallecursada{fecha}')): ?>
    <?php echo form_error('detallecursada{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($detallecursada, 'getFecha', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'detallecursada[fecha]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallecursada[libro]', __($labels['detallecursada{libro}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallecursada{libro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallecursada{libro}')): ?>
    <?php echo form_error('detallecursada{libro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($detallecursada, 'getLibro', array (
  'size' => 7,
  'control_name' => 'detallecursada[libro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallecursada[folio]', __($labels['detallecursada{folio}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('detallecursada{folio}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallecursada{folio}')): ?>
    <?php echo form_error('detallecursada{folio}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($detallecursada, 'getFolio', array (
  'size' => 7,
  'control_name' => 'detallecursada[folio]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('detallecursada[fk_dcursada_id]', __($labels['detallecursada{fk_dcursada_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('detallecursada{fk_dcursada_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('detallecursada{fk_dcursada_id}')): ?>
    <?php echo form_error('detallecursada{fk_dcursada_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('fk_dcursada_id', array('type' => 'edit', 'detallecursada' => $detallecursada)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('detallecursada' => $detallecursada)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($detallecursada->getId()): ?>
<?php echo button_to(__('delete'), 'dcursada/delete?id='.$detallecursada->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
