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

<?php $h11= sfPropelFinder::from('Llamadoacur')->
     where ('Id','like',1)->
     find();
     foreach ($h11 as $c11)  
       {
       $hab=$c11->getLlamado();        
        }
?>



 <?php if($adeuda == 0 ){?>

<div class="form-row1">
<div class="col2">
<p style="color: #FF0000;"><?php  echo  " No esta habilitado para Cursar pasar por Secretaria..."; ?></p>
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


 <?php if($hab == 1 ){?>

<ul class="sf_admin_actions">
      <li><?php echo button_to(__('Nueva Cursada'), 'cursada/orden?idu='.$idusu, array (
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
 
