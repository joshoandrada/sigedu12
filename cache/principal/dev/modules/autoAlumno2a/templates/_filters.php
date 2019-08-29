<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('alumno2a/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_nombre"><?php echo __('Nombres:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nombre]', isset($filters['nombre']) ? $filters['nombre'] : null, array (
  'size' => 64,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_apellido"><?php echo __('Apellido:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[apellido]', isset($filters['apellido']) ? $filters['apellido'] : null, array (
  'size' => 64,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nro_documento"><?php echo __('Nro. Documento:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nro_documento]', isset($filters['nro_documento']) ? $filters['nro_documento'] : null, array (
  'size' => 8,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_legajo_prefijo"><?php echo __('Matricula Año:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[legajo_prefijo]', isset($filters['legajo_prefijo']) ? $filters['legajo_prefijo'] : null, array (
  'size' => 10,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fk_estadoalumno_id"><?php echo __('Estado:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['fk_estadoalumno_id']) ? $filters['fk_estadoalumno_id'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Estadosalumnos',
  'text_method' => '__toString',
  'control_name' => 'filters[fk_estadoalumno_id]',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_activo"><?php echo __('Datos actualizados:') ?></label>
    <div class="content">
    <?php echo select_tag('filters[activo]', options_for_select(array(1 => __('yes'), 0 => __('no')), isset($filters['activo']) ? $filters['activo'] : null, array (
  'include_custom' => __("yes or no"),
)), array (
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'alumno2a/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
