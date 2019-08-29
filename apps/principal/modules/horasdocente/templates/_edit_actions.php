<ul class="sf_admin_actions">
  <li><?php echo button_to(__('list'), 'horasdocente/list?id='.$rel_anio_actividad->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
  <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
  </ul>
