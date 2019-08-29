<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$neuro->getOrden(); ?>
<?php// $iddetalle=$neuro->getId(); ?>
<?php $idal1= $sf_params->get('idal'); ?>

<? if ($idact == 10 || $idact == 11 || $idact == 12 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
 // $d=0; 
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 5 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }

    }
    ?>
     <?php //echo $c;?>
    <?if ($c==1){ ?>
       
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
     
     <?}else{?>
       <?if ($a==1 && $b==1){ ?>
          <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
          </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1,5)";?></p> </li>
       <?}?>
     <?}?>
<?}?>


<? if ($idact == 1 || $idact == 2 || $idact == 3 || $idact == 4 || $idact == 5 || $idact == 6 || $idact == 7 || $idact == 8 || $idact == 9 || $idact == 13 || $idact == 27 || $idact == 31){?>

  <?php
  $a=0;
  $fw=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  where('Orden','like',$idact)->
  find();
  foreach ($fw as $s4)
    {
      $idestado = $s4->getFkDcursadaId();   
       if ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)  
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
    <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
     </li>
<?}?>
<?php //echo $idact;?>
<?}?>


<? if ($idact == 14 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 5 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 6 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 1 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (5,6) o Aprobar (1) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 15){?>
  <?php
  $a=0;
  $c=0;
 // $d=0; 
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 7 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 )) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
         $esta = $cs4->getEstado();
          $c=1;
         }
    }
    ?>
     <?php //echo $c;?>
    <?if ($c==1){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
     <?}else{?>
       <?if ($a==1){ ?>
          <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
          </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (7)";?></p> </li>
       <?}?>
     <?}?>
<?}?>

<? if ($idact == 16 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 6 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 7 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 4 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (6,7) o Aprobar (4) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 17 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
 // $d=0; 
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 7 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 8 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    ?>
     <?php //echo $c;?>
    <?if ($c==1){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
     <?}else{?>
       <?if ($a==1 && $b==1){ ?>
          <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
          </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (7,8)";?></p> </li>
       <?}?>
     <?}?>
<?}?>

<? if ($idact == 18){?>
  <?php
  $a=0;
  $c=0;
 // $d=0; 
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    ?>
     <?php //echo $c;?>
    <?if ($c==1){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
     <?}else{?>
       <?if ($a==1){ ?>
          <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
          </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1)";?></p> </li>
       <?}?>
     <?}?>
<?}?>

<? if ($idact == 19 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 3 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1) o Aprobar (3) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 20 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 5 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 9 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1,5) o Aprobar (9) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 21 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 12 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 1 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (12) o Aprobar (1) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 22 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 1 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Aprobar (12) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 23 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
 // $d=0; 
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 5 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 6 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    ?>
     <?php //echo $c;?>
    <?if ($c==1){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
     <?}else{?>
       <?if ($a==1 && $b==1){ ?>
          <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
          </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (5,6)";?></p> </li>
       <?}?>
     <?}?>
<?}?>

<? if ($idact == 24 || $idact == 25){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
 // $d=0; 
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 14 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 10 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    ?>
     <?php //echo $c;?>
    <?if ($c==1){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
     <?}else{?>
       <?if ($a==1 && $b==1){ ?>
          <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
          </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (14,10)";?></p> </li>
       <?}?>
     <?}?>
<?}?>

<? if ($idact == 26 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 14 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 16 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (14) o Aprobar (16) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 28 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 14 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 2 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (14) o Aprobar (2) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 29 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 10 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 14 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 20 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (10,14) o Aprobar (20) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 30 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 21 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 12 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (21) o Aprobar (12) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 32 || $idact == 33 || $idact == 34 || $idact == 35){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 14 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Aprobar (14) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

<? if ($idact == 36 ){?>
  <?php
  $a=0;
  $b=0;
  $c=0;
  $d=0;
  $e=0;
  $f=0;
  $g=0;
  $fww=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  find();
  foreach ($fww as $cs4)
    {
      $idestado = $cs4->getFkDcursadaId();   
      $ord = $cs4->getOrden();
      if ($ord == 24 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 25 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 29 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $d=1;
          } 
       if ($ord1 == 18 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $e=1;
          } 
       if ($ord1 == 19 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $f=1;
          } 
       if ($ord1 == 14 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9)) 
          {
            $g=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 && $e==1 && $f==1 && $g==1){ ?>
        <li><?php echo button_to(('     Agregar'),'bneuro/agreganeuro?idactividad='.$neuro->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$neuro->getOrden(), array ('class' => 'sf_admin_action_create',))?>
         </li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (24,25) o Aprobar (29,14,18,19) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

</ul>
</td>

