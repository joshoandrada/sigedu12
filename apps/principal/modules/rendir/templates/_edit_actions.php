<ul class="sf_admin_actions">
    <li><?php echo button_to(__('Volver al listado'), 'rendir/list?id='.$rendida->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
   

<? if($rendida->getAuxi() == 1 ){?>

<li><?php echo button_to(__('Imprimir rendida'), 'rendir/Impalumno?idd1='.$rendida->getFkAlumnoId().'&idrendida='.$rendida->getId().'&idllamado='.$rendida->getFkLlamadaId(), array (
  'class' => 'sf_admin_action_untitled2',
)) ?></li>

<?php } else {?>

 <li><?php echo submit_tag(__('Enviar Rendida'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>

<?php }?>

    </ul>
