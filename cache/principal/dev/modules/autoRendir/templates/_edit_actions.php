<ul class="sf_admin_actions">
    <li><?php echo button_to(__('Volver al listado'), 'rendir/list?id='.$rendida->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag(__('Guardar y agregar otro'), array (
  'name' => 'save_and_add',
  'class' => 'sf_admin_action_save_and_add',
)) ?></li>
      <li><?php echo submit_tag(__('Guardar'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
