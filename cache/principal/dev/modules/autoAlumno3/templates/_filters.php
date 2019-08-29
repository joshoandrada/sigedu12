<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('alumno3/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_nro_documento"><?php echo __('Nro. Documento:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nro_documento]', isset($filters['nro_documento']) ? $filters['nro_documento'] : null, array (
  'size' => 16,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'alumno3/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
