
<? if($sf_params->get('idrendida') === '' || $sf_params->get('idrendida') === null || $sf_params->get('idrendida') ===0){?>

<ul class="sf_admin_actions">
  <li><?php echo button_to(__('Cancelar'), 'Rendida/list', array ('class' => 'sf_admin_action_cancel',
)) ?></li>
</ul>

<?}else{?>

<ul class="sf_admin_actions">
  <li><?php echo button_to(__('Cancelar'), 'Rendida/edit?id='.$sf_params->get('idrendida'), array ('class' => 'sf_admin_action_cancel',
)) ?></li>
</ul>

<?}?>

