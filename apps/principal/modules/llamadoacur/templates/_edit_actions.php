<ul class="sf_admin_actions">
<li><?php echo button_to(__('Administrar Cursadas'), 'cursadaa/list', array (
  'class' => 'sf_admin_action_list',
)) ?></li> 
  <li><?php echo submit_tag(__('Guardar Cambios'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
