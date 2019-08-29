<ul class="sf_admin_actions">
      <li><?php echo button_to(__('create'), 'alumno2a/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>

<?php if ($sf_params->get('filters[fk_estadoalumno_id]')){?>
<li><?php echo button_to(__('Informe Estado'), 'alumno2a/reporte?esta='.$sf_params->get('filters[fk_estadoalumno_id]'), array (
  'class' => 'sf_admin_action_untitled',
)) ?></li>
<?php }?>

<?php if ($sf_params->get('filters[legajo_prefijo]')){?>
<li><?php echo button_to(__('Informe año legajo'), 'alumno2a/reporteano?ano='.$sf_params->get('filters[legajo_prefijo]'), array (
  'class' => 'sf_admin_action_untitled',
)) ?></li>
<?php }?>

  </ul>


