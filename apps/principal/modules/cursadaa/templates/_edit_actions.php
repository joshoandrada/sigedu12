<ul class="sf_admin_actions">
    <li><?php echo button_to(__('Volver al listado'), 'cursadaa/list?id='.$cursada->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>

<? if($cursada->getAuxi() == 1 ){?>

    <li><?php echo button_to(__('Modificar Cursada'), 'cursadaa/abrir?idc='.$cursada->getId(), array (
  'class' => 'sf_admin_action_save',
)) ?></li>

<li><?php echo button_to(__('Imprimir rendida'), 'cursadaa/imprimir?id='.$cursada->getId(), array (
  'class' => 'sf_admin_action_untitled2',
)) ?></li>


<?php } else {?>

    <li><?php echo button_to(__('Cerrar Cursada'), 'cursadaa/cerrar?idce='.$cursada->getId(), array (
  'class' => 'sf_admin_action_save',
)) ?></li>

<?php } ?>

</ul>
