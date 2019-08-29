
 <?php $idusu=$sf_user->getAttribute('id'); ?>

 <?php  $h10= sfPropelFinder::from('Usuario')->
     where ('Id','like',$idusu)->
     find();
     foreach ($h10 as $c10)  
       {
       $idalu=$c10->getFKAlumno();        
        }
   $h1= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$idalu)->
	     find();
	 foreach ($h1 as $alu1)  
         {
	 $adeuda= $alu1->getAdeuda();
          } 
?>

<?php $h12= sfPropelFinder::from('Llamadoa')->
     where ('Id','like',1)->
     find();
     foreach ($h12 as $c12)  
       {
       $habr=$c12->getLlamado();        
        }
?>

<?php if($adeuda == 0 ){?>

<div class="form-row1">
<div class="col2">
<p style="color: #FF0000;"><?php  echo  " No esta habilitado para Rendir pasar por Secretaria..."; ?></p>
</div>
</div>
<!-- 

<ul class="sf_admin_actions">
   <li><?php echo button_to(__('Volver Men&uacute; Principal'), '@homepage', array (
  'class' => 'sf_admin_action_reset_filter',
)) ?></li>
</ul>
 -->

<?php } else {?>
<?php if($habr == 1 ){?>

<ul class="sf_admin_actions">
      <li><?php echo button_to(__('Nueva Rendida'), 'rendir/orden?idu='.$idusu, array (
  'class' => 'sf_admin_action_create',
)) ?></li>
<!-- 

    <li><?php echo button_to(__('Volver Men&uacute; Principal'), '@homepage', array (
  'class' => 'sf_admin_action_reset_filter',
)) ?></li>
 -->

</ul>
<?php }?>
<?php }?>


<!--
<?php //if ($sf_params->get('filters[fecha][from]') and $sf_params->get('filters[fecha][to]')){?>

     <li><?php //echo button_to(__('Crear Informe'), 'Rendida/Impalumno?idd1='.$rendida->getFkAlumnoId().'&fechainicio='.$sf_params->get('filters[fecha][from]').'&fechafin='.$sf_params->get('filters[fecha][to]'), array (
 // 'class' => 'sf_admin_action_untitled',
//)) ?></li>

<?php// }?>
  </ul>
-->

