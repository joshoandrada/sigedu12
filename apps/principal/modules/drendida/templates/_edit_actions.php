
<ul class="sf_admin_actions">

<?php //$carre= $sf_params->get('idcarre'); ?>
<?php ///echo $carre; ?>

<?php $h11= sfPropelFinder::from('Actividad')->
	     where ('Id','like',$detallerendir->getFkActividadId())->
	     find();
	 foreach ($h11 as $cur1)  
         {
         $carre = $cur1->getFkCarreraId();
          } ?>
<?php $h12= sfPropelFinder::from('Alumno')->
       where ('Id','like',$detallerendir->getFkAlumnoId())->
       find();
   foreach ($h12 as $cur12)  
         {
         $nom = $cur12->getNombre();
         $ape = $cur12->getApellido();
         $nomape = $nom.' '.$ape;
          } ?>

<?php if ($carre==7) {?> 
  <li><?php echo button_to(__('Volver'), 'bcomun1a/list?idrendida='.$detallerendir->getFkCursadaId().'&ida='.$nomape, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($carre==10) {?> 
  <li><?php echo button_to(__('Volver'), 'bneuro1a/list?idrendida='.$detallerendir->getFkCursadaId().'&ida='.$nomape, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($carre==11) {?> 
  <li><?php echo button_to(__('Volver'), 'bauditiva1a/list?idrendida='.$detallerendir->getFkCursadaId().'&ida='.$nomape, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($carre==12) {?> 
  <li><?php echo button_to(__('Volver'), 'bintel1a/list?idrendida='.$detallerendir->getFkCursadaId().'&ida='.$nomape, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

<?php if ($carre==13) {?> 
  <li><?php echo button_to(__('Volver'), 'bvisual1a/list?idrendida='.$detallerendir->getFkCursadaId().'&ida='.$nomape, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?}?>

  <li><?php echo submit_tag(__('Guardar'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
