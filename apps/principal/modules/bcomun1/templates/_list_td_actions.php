<!-- 
<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">
<?php echo button_to(('     Agregar'),'bcomun1/agregacomun1?idactividad='.$comun->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$comun->getOrden(), array ('class' => 'sf_admin_action_create',))?>
</li>
</ul>
</td>
<td>

-->


<?php $idusu=$sf_user->getAttribute('id');?>

<?php $h13= sfPropelFinder::from('UsuarioRol')->
     where ('FkUsuarioId','like',$idusu)->
     find();
     foreach ($h13 as $c13)  
       {
       $rolusu=$c13->getFkRolId();        
       }
?>


<? if ($rolusu == 4){?>

<td>
<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$comun->getOrden(); ?>
<?php $idal1=$sf_params->get('ida1');?>


<? if ($idact == 1 || $idact == 4 || $idact == 5){?>
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

<?php //echo $promo;?>


<? if ($promo == 4){?>
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

<li><p style="color: #00AA55;"><?php echo "Examen Final";?></p></li>

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


<? if ($idact == 2){?>
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

<?php //echo $promo;?>

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

<li><p style="color: #00AA55;"><?php echo "Examen Final";?></p></li>

<?php// echo $promo.'  '.$idal1.'  '.$iddetalle;?>
<?}?>
<?}else{?>
 <? if ($promo == 8 ){?>
     <li><p style="color: #0000ff;"><?php echo "Equivalecia";?></li>
     <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
   <?}else{?>  


    <li><p style="color: #00AA55;"><?php echo "Examen Libre";?></p></li>

     <?php //echo $promo;?>

    <?}?>
<?}?>

<?}else{?>
<? if ($idact == 6 || $idact == 7){?>

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

<?php //echo $promo;?>

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

<li><p style="color: #00AA55;"><?php echo "Examen Final";?></p></li>
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
          _or('FkDcursadaId','like',1 )->
	find();
     foreach ($vu as $cs1a)
       {
       $promo =  $cs1a->getFkDcursadaId();
       }
?>
<? if ($promo == 4){?>
  <?php //echo $promo;?>
   <li><p style="color: #0000ff;"><?php echo "Promovida Dir.";?>
   <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
   </li>
  <?}else{?>
    <? if ($promo == 5){?>
      <?php //echo $promo;?>
      <li><p style="color: #0000ff;"><?php echo "Promovida Ind.";?>
      <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
     <?}else{?>     
       <? if ($promo == 8){?>
          <?php //echo $promo;?>
           <li><p style="color: #0000ff;"><?php echo "Equivalencia";?>
           <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
          <?}else{?>
            <? if ($promo == 1){?>
                <?php //echo $promo;?>
                <li><p style="color: #0000ff;"><?php echo "Regular";?>
                <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
              <?}else{?>
                <?php //echo $promo;?>
                <li><p style="color: #ff0000;"><?php echo "No Promovida - No Regularizada";?>
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

 <?}else{?>

 <?php////////////////////////////////////////////////////////////////////////////////;?>

<td>

<?php $can=0;?>
<ul class="sf_admin_td_actions">

<?php $idact=$comun->getOrden(); ?>
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



<? if ($idact == 1 || $idact == 4 || $idact == 5){?>
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

<?php //echo $promo;?>


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

<li><?php echo button_to(('     Agregar'),'bcomun1a/agregacomun1?idactividad='.$comun->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$comun->getOrden().'&ida='.$ida, array ('class' => 'sf_admin_action_create',))?>
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


<? if ($idact == 2){?>
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

<li><?php echo button_to(('     Agregar'),'bcomun1a/agregacomun1?idactividad='.$comun->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$comun->getOrden().'&ida='.$ida, array ('class' => 'sf_admin_action_create',))?>
</li>

<?php// echo $promo.'  '.$idal1.'  '.$iddetalle;?>
<?}?>
<?}else{?>
 <? if ($promo == 8 ){?>
     <li><p style="color: #0000ff;"><?php echo "Equivalecia";?></li>
     <?php// echo ' '.$regular.'  '.$idal1.'  '.$iddetalle;?></p>
   <?}else{?>  


     <li><?php echo button_to(('     Libre'),'bcomun1a/agregacomun1?idactividad='.$comun->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$comun->getOrden().'&ida='.$ida, array ('class' => 'sf_admin_action_create',))?>
</li>

     <?php //echo $promo;?>

    <?}?>
<?}?>

<?}else{?>
<? if ($idact == 6 || $idact == 7){?>

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

<li><?php echo button_to(('     Agregar'),'bcomun1a/agregacomun1?idactividad='.$comun->getId().'&idrendida='.$sf_params->get('idrendida').'&orden='.$comun->getOrden().'&ida='.$ida, array ('class' => 'sf_admin_action_create',))?>
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
          _or('FkDcursadaId','like',1 )->
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
            <? if ($promo == 1){?>
                <?php echo $promo;?>
                <li><p style="color: #0000ff;"><?php echo "Regular";?>
                <?php// echo ' '.$promo.'  '.$idal1.'  '.$iddetalle;?></p>
              <?}else{?>
                <?php echo $promo;?>
                <li><p style="color: #ff0000;"><?php echo "No Promovida - No Regularizada";?>
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


 <?}?>