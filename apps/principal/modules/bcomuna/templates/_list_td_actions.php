<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$comun->getOrden(); ?>
<?php $idal1= $sf_params->get('idal'); ?>

<? if ($idact == 8 || $idact == 9 || $idact == 10 || $idact == 11){?>
   <li><?php echo button_to(('     Agregar'),'bcomuna/agregacomun?idactividad='.$comun->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$comun->getOrden().'&idal='.$idal1, array ('class' => 'sf_admin_action_create',))?></li>
<?}?>


<? if ($idact == 0 || $idact == 1 || $idact == 2 || $idact == 3 || $idact == 4 || $idact == 5 || $idact == 6 || $idact == 7 || $idact == 12){?>

  <?php
  $a=0;
  $fw=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  where('Orden','like',$idact)->
  find();
  foreach ($fw as $s4)
    {
      $idestado = $s4->getFkDcursadaId();   
       if ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)  
        {
          $esta = $s4->getEstado();
          $a=1;
         }
    }
    
    ?>
    <?php //echo $a;?>
    <?if ($a==1){ ?>
         <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
       <?}else{?> 
         <li><?php echo button_to(('     Agregar'),'bcomuna/agregacomun?idactividad='.$comun->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$comun->getOrden().'&idal='.$idal1, array ('class' => 'sf_admin_action_create',))?></li>
    <?}?>
  <?php //echo $idact;?>
<?}?>

</ul>
</td>



