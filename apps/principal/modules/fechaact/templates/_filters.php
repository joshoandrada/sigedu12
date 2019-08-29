<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fechaact/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_nombre"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nombre]', isset($filters['nombre']) ? $filters['nombre'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fechaact/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
