<td>
<? if($sf_params->get('idcursada') === ''
     || $sf_params->get('idcursada') === null ){?>

<ul class="sf_admin_td_actions">
  <li><?php echo button_to(('     Agregar Alumno'),'buscaalumno/orden?idalumno='.$alumno->getid(), array ('class' => 'sf_admin_action_create',)) ?></li>
</ul>
<?}else{?>
<ul class="sf_admin_td_actions">
  <li><?php echo button_to(('     Agregar Alumno'),'buscaalumno/orden?idalumno='.$alumno->getid().'&idcursada='.$sf_params->get('idcursada'),array ('class' => 'sf_admin_action_create',)) ?></li>
</ul>
<?}?>
</td>
