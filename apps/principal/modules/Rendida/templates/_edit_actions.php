<ul class="sf_admin_actions">
    <li><?php echo button_to(__('Volver al listado'), 'Rendida/list?id='.$rendida->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
 
<? if($rendida->getAuxi() == 1 ){?>

    <li><?php echo button_to(__('Modificar Rendida'), 'Rendida/abrir?idr='.$rendida->getId(), array (
  'class' => 'sf_admin_action_save',
)) ?></li>

<li><?php echo button_to(__('Imprimir rendida'), 'Rendida/Impalumno?idd1='.$rendida->getFkAlumnoId().'&idrendida='.$rendida->getId().'&idllamado='.$rendida->getFkLlamadaId(), array (
  'class' => 'sf_admin_action_untitled2',
)) ?></li>

<?php } else {?>

<li><?php echo submit_tag(__('Guardar y Cerrar Rendida'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>

<?php } ?>

   </ul>
