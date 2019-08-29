<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('cursadaa/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_filtro_fk_alumno_id"><?php echo __('Filtro fk alumno:') ?></label>
    <div class="content">
    <?php echo get_partial('filtro_fk_alumno_id', array('type' => 'filter', 'filters' => $filters)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_matricula"><?php echo __('Matricula:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[matricula]', isset($filters['matricula']) ? $filters['matricula'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fecha"><?php echo __('Fecha de Emisión:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecha]', isset($filters['fecha']) ? $filters['fecha'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'cursadaa/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
