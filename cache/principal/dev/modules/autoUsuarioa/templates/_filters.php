<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('usuarioa/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_usuario"><?php echo __('Usuario:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[usuario]', isset($filters['usuario']) ? $filters['usuario'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fk_establecimiento_id"><?php echo __('Establecimiento:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['fk_establecimiento_id']) ? $filters['fk_establecimiento_id'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Establecimiento',
  'text_method' => '__toString',
  'control_name' => 'filters[fk_establecimiento_id]',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'usuarioa/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
