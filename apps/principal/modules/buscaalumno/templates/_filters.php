<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('buscaalumno/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_apellido"><?php echo __('Apellido:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[apellido]', isset($filters['apellido']) ? $filters['apellido'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nro_documento"><?php echo __('Dni:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nro_documento]', isset($filters['nro_documento']) ? $filters['nro_documento'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fk_carrera_id"><?php echo __('Carrera:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['fk_carrera_id']) ? $filters['fk_carrera_id'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Carrera',
  'text_method' => '__toString',
  'control_name' => 'filters[fk_carrera_id]',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'buscaalumno/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
