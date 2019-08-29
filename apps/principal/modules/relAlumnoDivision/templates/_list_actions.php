<ul class="sf_admin_actions">
  <li><?php echo button_to(__('create'), 'relAlumnoDivision/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>

<?php if ($sf_params->get('filters[fk_division_id]')){?>
<li><?php echo button_to(__('Informe Division'), 'relAlumnoDivision/reporte?divi='.$sf_params->get('filters[fk_division_id]'), array (
  'class' => 'sf_admin_action_untitled',
)) ?></li>
<?php }?>




</ul>
