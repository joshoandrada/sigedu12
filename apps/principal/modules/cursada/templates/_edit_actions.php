<ul class="sf_admin_actions">
    <li><?php echo button_to(__('Volver al listado'), 'cursada/list?id='.$cursada->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>


<? if($cursada->getAuxi() == 1 ){?>

<li><?php echo button_to(__('Imprimir Cursada'), 'cursada/Imprimir?idd1='.$cursada->getFkAlumnoId().'&idrendida='.$cursada->getId().'&idllamado='.$cursada->getFkLlamadaId(), array (
  'class' => 'sf_admin_action_untitled2',
)) ?></li>


<?php } else {?>

<li><?php echo submit_tag(__('Enviar Cursada'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>

<?php }?>

</ul>





