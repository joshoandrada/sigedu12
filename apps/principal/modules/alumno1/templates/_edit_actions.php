<ul class="sf_admin_actions">
   <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('Volver Men&uacute; Principal'), '@homepage', array (
  'class' => 'sf_admin_action_reset_filter',
)) ?></li>
</ul>
