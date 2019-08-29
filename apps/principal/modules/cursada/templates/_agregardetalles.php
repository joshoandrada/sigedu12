<?php $a="&filters[fk_carrera_id]=10&filter=filtrar"; ?>

<?php echo input_hidden_tag($sf_params->get('cursada') ) ?>

<?php $dc= $sf_params->get('cursada'); ?>

<?php echo "eeeee".$alucarre; ?>


<ul class="sf_admin_actions">
      <li><?php echo button_to(('Agregar o Borrar Materias'), 'buscaactividad/list?idcursada='.$cursada->getId().'&idcarrera='.$alucarre, array ( 
  'class' => 'sf_admin_action_cuenta1',
))?></li>
    </ul>


