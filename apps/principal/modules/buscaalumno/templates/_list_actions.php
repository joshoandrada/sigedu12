

<? if($sf_params->get('idcursada') === '' || $sf_params->get('idcursada') === null || $sf_params->get('idcursada') ===0){?>

<ul class="sf_admin_actions">
  <li><?php echo button_to(__('Cancelar'), 'cursadaa/list', array ('class' => 'sf_admin_action_cancel',
)) ?></li>
</ul>

<?}else{?>

<ul class="sf_admin_actions">
  <li><?php echo button_to(__('Cancelar'), 'cursadaa/edit?id='.$sf_params->get('idcursada'), array ('class' => 'sf_admin_action_cancel',
)) ?></li>
</ul>

<?}?>

