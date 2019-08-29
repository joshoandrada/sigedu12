<!-- 
<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">
<li>
<?php echo button_to(('     Agregar'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li>
</ul>
</td>
-->


<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$intelectual->getOrden(); ?>
<?php //$iddetalle=$neuro->getId(); ?>
<?php $idren= $sf_params->get('idrendida'); ?>

<?php
  $vi=sfPropelFinder::from('Rendida')->
  where('Id','like',$idren)->
  find();
     foreach ($vi as $ca)
       {
       $idal1 =  $ca->getFkAlumnoId();
       }
?>


<? if ($idact == 11 || $idact == 12 || $idact == 20 ){?>
<!-- PD-PI-R-L -->

<?php
$promo =0;
    $vu=sfPropelFinder::from('Detallecursada')->
  where('FkAlumnoId','like',$idal1)->
  where('Orden','like',$idact)->
        where('FkDcursadaId','like',4 )->
        _or('FkDcursadaId','like',5)->
        _or('FkDcursadaId','like',1)->
        _or('FkDcursadaId','like',8)->
  find();
     foreach ($vu as $cs1)
       {
       $promo =  $cs1->getFkDcursadaId();
       }

$regular =0;
    $vuu=sfPropelFinder::from('Detallerendir')->
  where('FkAlumnoId','like',$idal1)->
  where('Orden','like',$idact)->
        where('FkDcursadaId','like',2 )->
        _or('FkDcursadaId','like',10)->
  find();
     foreach ($vuu as $cs1a)
       {
       $regular =  $cs1a->getFkDcursadaId();
       }

?>
<?php echo $promo;?>

<? if ($promo == 1){?>


 <li>
<?php echo button_to(('     Examen Final'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li>


<?}else{?>
<? if ($promo == 0){?>

<? if ($regular == 2 || $regular == 10){?>

  <? if ($regular == 2){?>  
  <li><p style="color: #0000ff;"><?php echo "Aprobada";?></p>
  <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
  

  <?}?>

<? if ($regular == 10){?>  
  <li><p style="color: #0000ff;"><?php echo "Libre (Aprobada)";?></p>
  <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
  <?}?>

<?}else{?>


<li>
<?php echo button_to(('     Libre'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li>

<?}?>



<?}else{?>
<? if ($promo == 8){?>

       <li><p style="color: #0000ff;"><?php echo "Equivalencia";?></li>
       <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
  <?}else{?>
  <? if ($promo == 4){?>
    
       <li><p style="color: #0000ff;"><?php echo "Promovida Dir.";?></li>        
       <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
  <?}else{?>
      <li><p style="color: #0000ff;"><?php echo "Promovida Ind.";?></li>        
       <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>


  <?}?>
<?}?>
<?}?>
<?}?>



<?}else{?>
<? if ($idact == 1 || $idact == 4 || $idact == 5 || $idact == 27 || $idact == 29 || $idact == 31 ){?>
<!-- PD-PI-R -->

<?php
$promo =0;
    $vu=sfPropelFinder::from('Detallecursada')->
	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',4)->
        _or('FkDcursadaId','like',5)->
        _or('FkDcursadaId','like',1)->
        _or('FkDcursadaId','like',8)->
	find();
     foreach ($vu as $cs1)
       {
       $promo =  $cs1->getFkDcursadaId();
       }

?>

<?php echo $promo;?>


<? if ($promo == 1){?>
<?php
$regular =0;
    $vuu=sfPropelFinder::from('Detallerendir')->
	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',2 )->
	find();
     foreach ($vuu as $cs1a)
       {
       $regular =  $cs1a->getFkDcursadaId();
       }
?>
<? if ($regular == 2 ){?>

<li><p style="color: #0000ff;"><?php echo "Aprobada";?>
<?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>

<?}else{?>

<li>
<?php echo button_to(('     Examen Final'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li>
<?}?>

<?}else{?>

<? if ($promo == 4 ){?>

<li><p style="color: #0000ff;"><?php echo "Promovida Dir.";?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
</li>
<?}else{?>
<? if ($promo == 5 ){?>
<li><p style="color: #0000ff;"><?php echo "Promovida Ind.";?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
<?}else{?>
<? if ($promo == 8 ){?>
<li><p style="color: #0000ff;"><?php echo "Equivalencia";?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>

<?}else{?>
<li><p style="color: #FF0000;"><?php echo "No Promovida - No Regularizada";?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>

<?}?>
<?}?>
<?}?>
<?}?>



<?}else{?>


<? if ($idact == 2 ){?>
<!-- R-L -->

<?php
$promo = 0;
    $vu=sfPropelFinder::from('Detallecursada')->

	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',1 )->
        _or('FkDcursadaId','like',8)->
	find();
     foreach ($vu as $cs1)
       {
       $promo = $cs1->getFkDcursadaId();
       }
?>

<?php echo $promo;?>

<?php if ($promo == 1){?>

<?php
$regular =0;
    $vuu=sfPropelFinder::from('Detallerendir')->
	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',2 )->
	      _or('FkDcursadaId','like',10)->
  find();
     foreach ($vuu as $cs1a)
       {
       $regular =  $cs1a->getFkDcursadaId();
       }
?>
<? if ($regular == 2 || $regular == 10){?>
    <? if ($regular == 2 ){?>
         <li><p style="color: #0000ff;"><?php echo "Aprobada";?></li>
         <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
    <?}?>
    <? if ($regular == 10 ){?>
         <li><p style="color: #0000ff;"><?php echo "Libre(Aprobada)";?></li>
         <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
    <?}?>


<?}else{?>

<li>
<?php echo button_to(('     Examen Final'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li>
<?}?>
<?}else{?>
 <? if ($promo == 8 ){?>
     <li><p style="color: #0000ff;"><?php echo "Equivalecia";?></li>
     <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
   <?}else{?>  


<li>
<?php echo button_to(('     Libre'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li>

    <?}?>
<?}?>

<?}else{?>
<? if ($idact == 6 || $idact == 7 || $idact == 10 || $idact == 14 || $idact == 15 || $idact == 16 || $idact == 22 || $idact == 23 || $idact == 24 || $idact == 26){?>

<!-- R -->

<?php
$promo = 0;
    $vu=sfPropelFinder::from('Detallecursada')->
	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',1 )->
        _or('FkDcursadaId','like',8)->
	find();
     foreach ($vu as $cs1)
       {
       $promo = $cs1->getFkDcursadaId();
       }
?>

<?php echo $promo;?>

<? if ($promo == 1 ){?>

<?php
$regular =0;
    $vuu=sfPropelFinder::from('Detallerendir')->
	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',2 )->
	find();
     foreach ($vuu as $cs1a)
       {
       $regular =  $cs1a->getFkDcursadaId();
       }
?>
<? if ($regular == 2 ){?>

<li><p style="color: #0000ff;"><?php echo "Aprobada";?></li>

<?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>

<?}else{?>

<li>
<?php echo button_to(('     Examen Final'),'bintel1a/agregaintel?idactividad='.$intelectual->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$intelectual->getOrden().'&ida='.$nomape, array ('class' => 'sf_admin_action_create',))?>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?>
</li><?}?>
<?}else{?>
<? if ($promo == 8 ){?>
<li><p style="color: #0000ff;"><?php echo "Equivalencia";?></li>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>

<?}else{?>

<li><p style="color: #FF0000;"><?php echo "No Regularizada";?></li>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
<?}?>
<?}?>

<?}else{?>

<!-- PD-PI -- 3-13-17-18-21-34-25-30-33-32 -->
<!-- PI ---  9-19-28-35---->



<?php
$promo =0;
    $vu=sfPropelFinder::from('Detallecursada')->
	where('FkAlumnoId','like',$idal1)->
	where('Orden','like',$idact)->
        where('FkDcursadaId','like',4 )->
          _or('FkDcursadaId','like',5 )->
          _or('FkDcursadaId','like',8 )->
	find();
     foreach ($vu as $cs1a)
       {
       $promo =  $cs1a->getFkDcursadaId();
       }
?>
<? if ($promo == 4){?>
  <?php echo $promo;?>
   <li><p style="color: #0000ff;"><?php echo "Promovida Dir.";?>
   <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
   </li>
  <?}else{?>
    <? if ($promo == 5){?>
      <?php echo $promo;?>
      <li><p style="color: #0000ff;"><?php echo "Promovida Ind.";?>
      <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
     <?}else{?>     
       <? if ($promo == 8){?>
          <?php echo $promo;?>
           <li><p style="color: #0000ff;"><?php echo "Equivalencia";?>
           <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
          <?}else{?>
           <?php echo $promo;?>
           <li><p style="color: #FF0000;"><?php echo "No Promovida";?>
           <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
         <?}?>
     <?}?>
 <?}?>

<?}?>
<?}?>
<?}?>
<?}?>
</ul>
</td>
