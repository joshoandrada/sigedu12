<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$neuro->getOrden(); ?>
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


<? if ($idact == 11 || $idact == 12 || $idact == 21 ){?>
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


   <li><?php echo button_to(('     Examen Final'),'bneuro1a/agreganeuro1?idactividad='.$neuro->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$neuro->getOrden().'&ida='.$ida.'&idest='.$promo, array ('class' => 'sf_admin_action_create',))?>
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


<li><?php echo button_to(('     Libre'),'bneuro1a/agreganeuro1?idactividad='.$neuro->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$neuro->getOrden().'&ida='.$ida.'&idest=8', array ('class' => 'sf_admin_action_create',))?>

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
<? if ($idact == 1 || $idact == 4 || $idact == 5 || $idact == 26 || $idact == 30 || $idact == 32 || $idact == 17 || $idact == 28 ){?>
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

<li><?php echo button_to(('     Examen Final'),'bneuro1a/agreganeuro1?idactividad='.$neuro->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$neuro->getOrden().'&ida='.$ida.'&idest='.$promo, array ('class' => 'sf_admin_action_create',))?>
</li>
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


<? if ($idact == 2 || $idact == 8 ){?>
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

<li><?php echo button_to(('     Examen Final'),'bneuro1a/agreganeuro1?idactividad='.$neuro->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$neuro->getOrden().'&ida='.$ida, array ('class' => 'sf_admin_action_create',))?>
</li>
<?php// echo $promo.'  '.$idal1.'  '.$iddetalle;?>
<?}?>
<?}else{?>
 <? if ($promo == 8 ){?>
     <li><p style="color: #0000ff;"><?php echo "Equivalecia";?></li>
     <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
   <?}else{?>  


     <li><?php echo button_to(('     Libre'),'bneuro1a/agreganeuro1?idactividad='.$neuro->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$neuro->getOrden().'&ida='.$ida.'&idest=8', array ('class' => 'sf_admin_action_create',))?>
     </li>
     <?php //echo $promo;?>

    <?}?>
<?}?>

<?}else{?>
<? if ($idact == 6 || $idact == 7 || $idact == 10 || $idact == 14 || $idact == 34 || $idact == 16 || $idact == 18 || $idact == 19 || $idact == 24 || $idact == 25){?>

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

<li><?php echo button_to(('     Examen Final'),'bneuro1a/agreganeuro1?idactividad='.$neuro->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$neuro->getOrden().'&ida='.$ida.'&idest='.$promo, array ('class' => 'sf_admin_action_create',))?>
</li>
<?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></li>
<?}?>
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

<!-- PD-PI -- 3-13-15-22-23-27-31-33-35 -->
<!-- PI ---  9-20-29-36---->



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
