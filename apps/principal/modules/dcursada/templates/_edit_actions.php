<ul class="sf_admin_actions">
<?php // $idb= $sf_params->get('idb'); ?>

<?php $h11= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$detallecursada->getFkAlumnoId())->
	     find();
	 foreach ($h11 as $cur1)  
         {
         $idb = $cur1->getFkCarreraId();
          } ?>

<?php if ($idb==7){?>
  <li><?php echo button_to(__('Volver'), 'bcomuna/list?idcursada='.$detallecursada->getFkCursadaId().'&idal='.$detallecursada->getFkAlumnoId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?php } ?>

<?php if ($idb==10) {?> 
  <li><?php echo button_to(__('Volver'), 'bneuroa/list?idcursada='.$detallecursada->getFkCursadaId().'&idal='.$detallecursada->getFkAlumnoId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($idb==11) {?> 
  <li><?php echo button_to(__('Volver'), 'bauditivaa/list?idcursada='.$detallecursada->getFkCursadaId().'&idal='.$detallecursada->getFkAlumnoId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($idb==12) {?> 
  <li><?php echo button_to(__('Volver'), 'bintela/list?idcursada='.$detallecursada->getFkCursadaId().'&idal='.$detallecursada->getFkAlumnoId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($idb==13) {?> 
  <li><?php echo button_to(__('Volver'), 'bvisuala/list?idcursada='.$detallecursada->getFkCursadaId().'&idal='.$detallecursada->getFkAlumnoId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

  <li><?php echo submit_tag(__('Guardar'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>


</ul>
