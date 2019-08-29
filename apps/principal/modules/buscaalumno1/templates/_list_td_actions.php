
<td>
<? if($sf_params->get('idrendida') === ''
     || $sf_params->get('idrendida') === null ){?>

<ul class="sf_admin_td_actions">
  <li><?php echo button_to(('     Agregar Alumno'),'buscaalumno1/orden?idalumno='.$alumno->getid(), array ('class' => 'sf_admin_action_create',)) ?></li>
</ul>
<?}else{?>
<ul class="sf_admin_td_actions">
  <li><?php echo button_to(('     Agregar Alumno'),'buscaalumno1/orden?idalumno='.$alumno->getid().'&idrendida='.$sf_params->get('idrendida'),array ('class' => 'sf_admin_action_create',)) ?></li>
</ul>
<?}?>
</td>

