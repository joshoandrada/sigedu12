<!-- 
<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
</ul>
</td>
-->

<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$intelectual->getOrden(); ?>
<?php// $iddetalle=$neuro->getId(); ?>
<?php $idal1= $sf_params->get('idal'); ?>

<? if ($idact == 10 ){?>
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
        <li>
          <?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
       </li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1,5)";?></p> </li>
       <?}?>
     <?}?>
<?}?>


<? if ($idact == 12 || $idact == 11){?>
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
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?php echo $idestado?>
   <?}else{?> 
      <?if ($a==1 && $b==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1,5) ";?></p> </li>
      <?php //echo $idestado?>
      <?}?>
   <?}?>
<?}?>



<? if ($idact == 1 || $idact == 2 || $idact == 3 || $idact == 4 || $idact == 5 || $idact == 6 || $idact == 7 || $idact == 8 || $idact == 9 || $idact == 13 || $idact == 25 || $idact == 30){?>

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
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
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
      if ($ord == 1 && ($idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $d=1;
        }  
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 1 && ($idestado1 == 2 || $idestado1 == 4 || $idestado1 == 5 || $idestado1 == 8 || $idestado1 == 9 || $idestado1 == 10)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
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
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1)";?></p> </li>
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
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 3 && ($idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }

   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1) o Aprobar (3) ";?></p> </li>
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
      if ($ord == 7 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
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
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (7)";?></p> </li>
       <?}?>
     <?}?>
<?}?>

<? if ($idact == 18 ){?>
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
      if ($ord == 6 && ($idestado == 1 || $idestado == 8)) 
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
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
       <?}else{?>
          <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (5,6)";?></p> </li>
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
      if ($ord == 5 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == 6 && ($idestado == 1 || $idestado == 8)) 
        {
          $d=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          
          $esta = $cs4->getEstado();
          $c=1;
         }

       if ($ord == 9 && ($idestado == 5 || $idestado == 8)) 
        {
          $e=1;
         }  

    }

   ?>
   
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 && $e==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (1,5,6) o Aprobar (9) ";?></p> </li>
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
      if ($ord == 12 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
      if ($ord == 1 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $d=1;
        }

    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 12 && ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10)) 
          {
            $a=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (12) o Aprobar (1) ";?></p> </li>
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
      if ($ord == 12 && ($idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
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
       if ($ord1 == 12 && ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10)) 
          {
            $a=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Aprobar (12) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 22 || $idact == 23 || $idact == 24){?>
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
      if ($ord == 14 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 10 && ($idestado == 1 || $idestado == 8)) 
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
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (10, 14) ";?></p> </li>
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
      if ($ord == 6 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 7 && ($idestado == 1 || $idestado == 8)) 
        {
          $b=1;
        }
      if ($ord == 4 && ($idestado == 4 || $idestado == 5)) 
        {
          $d=1;
        }
      if ($ord == $idact && ($idestado == 1 || $idestado == 8 || $idestado == 6)) 
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
       if ($ord1 == 4 && $idestado1 == 2 ) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (7,6) o Aprobar (4) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 27 ){?>
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
      if ($ord == 14 && ($idestado == 1 || $idestado == 8)) 
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
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (14) ";?></p> </li>
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
      if ($ord == 14 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 10 && ($idestado == 1 || $idestado == 8)) 
        {
          $b=1;
        }
      if ($ord == 19 && ($idestado == 5 || $idestado == 8)) 
        {
          $d=1;
        }

      if ($ord == $idact && ($idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
    }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 && $b==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (10,14) o Aprobar (19) ";?></p> </li>
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
      if ($ord == 20 && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 12 && ($idestado == 4 || $idestado == 5 || $idestado == 8)) 
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
       if ($ord1 == 20 && $idestado1 == 10) 
          {
            $a=1;
          } 
     if ($ord1 == 12 && ($idestado1 == 2 || $idestado1 == 10)) 
          {
            $b=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (20) o Aprobar (12) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 31 || $idact == 32 ){?>
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
      if ($ord == 24 && ($idestado == 1 || $idestado == 8)) 
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
       if ($ord1 == 14 && ($idestado1 == 2 || $idestado1 == 8 || $idestado1 == 9 || $idestado1 == 10)) 
          {
            $d=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $d==1 ){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (24) o Aprobar (14) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 33){?>
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
      if ($ord == 26 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 17 && ($idestado == 4 || $idestado == 5 || $idestado == 8)) 
        {
          $b=1;
        }
      if ($ord == $idact && ($idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
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
       if ($ord1 == 14 && ($idestado1 == 2 || $idestado1 == 8 || $idestado1 == 9 || $idestado1 == 10)) 
          {
            $d=1;
          } 
      }

   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar(26) y Aprobar (17) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 34){?>
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
      if ($ord == 24 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == $idact && ($idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
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
       if ($ord1 == 14 && $idestado1 == 2 ) 
          {
            $b=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo " Falta Regularizar(24) y Aprobar (14) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>


<? if ($idact == 35 ){?>
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
      if ($ord == 22 && ($idestado == 1 || $idestado == 8)) 
        {
          $a=1;
        }
      if ($ord == 24 && ($idestado == 1 || $idestado == 8)) 
        {
          $b=1;
         }  
      if ($ord == $idact && ($idestado == 1 || $idestado == 4 || $idestado == 5 || $idestado == 8 || $idestado == 6)) 
        {
          $esta = $cs4->getEstado();
          $c=1;
         }
      if ($ord == 28 && ($idestado == 5 || $idestado == 8)) 
        {
          $d=1;
         }
      if ($ord == 14 && $idestado == 8) 
        {
          $e=1;
         }
      if ($ord == 15 && $idestado == 8) 
        {
          $f=1;
         }
      if ($ord == 16 && $idestado == 8) 
        {
          $g=1;
         }
    }
    $fww1=sfPropelFinder::from('Detallerendir')->
    where('FkAlumnoId','like',$idal1)->
    find();
    foreach ($fww1 as $cs41)
     {
       $idestado1 = $cs41->getFkDcursadaId();   
       $ord1 = $cs41->getOrden();
       if ($ord1 == 14 && $idestado1 == 2 ) 
          {
            $e=1;
          } 
       if ($ord1 == 15 && $idestado1 == 2 ) 
          {
            $f=1;
          } 
       if ($ord1 == 16 && $idestado1 == 2 ) 
          {
            $g=1;
          } 
      }
   ?>
   <?if ($c==1 ){ ?>
       <li><p style="color: #0000ff;"><?php echo $esta;?></p> </li>
   <?}else{?> 
      <?if ($a==1 && $b==1 && $d==1 && $e==1 && $f==1 && $g==1){ ?>
<li>
<?php echo button_to(('     Agregar'),'bintel/agregaintel?idactividad='.$intelectual->getId().'&idcursada='.$sf_params->get('idcursada').'&idal='.$idal1.'&orden='.$intelectual->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
      <?}else{?>
       <li><p style="color: #ff0000;"><?php echo "Falta Regularizar (22,24) o Aprobar (28,14,15,16) ";?></p> </li>
      <?}?>
   <?}?>
<?}?>

</ul>
</td>
