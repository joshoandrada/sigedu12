<ul class="sf_admin_actions">
    <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('list'), 'alumno3/list?id='.$alumno->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
</ul>
