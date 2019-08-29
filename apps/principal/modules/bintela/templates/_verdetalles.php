
<?php $mensa= $sf_params->get('msj'); ?>

<?php if ($mensa){?>
<!-- 
<input type="hidden" id="pro" name="pro"  value="<?php echo $mensa; ?>">
<script>
var pro=document.getElementById("pro").value;
alert('Mensaje : '+pro)
</script>
-->
<?}?>


<form align="center" method="POST">

<input type="hidden" id="idcursada" name="idcursada"  value="<?php echo $idcursada; ?>"size="20" maxlength="20">

<?php $idcursada= $sf_params->get('idcursada'); ?>


<?php if ($num!=0){?>
<div id="sf_admin_content">
 
<h1><?php echo 'Materias Agregadas'; ?></h1>
  <div class="form-row">
  <table cellspacing="0" class="sf_admin_list">
     <tr>
     <th id="sf_admin_list_th_id">
     Nro
     </th>
     <th id="sf_admin_list_th_id">
     Descripcion
	 </th>
	 <th id="sf_admin_list_th_descripcion">
     Estado
	 </th>
	 <th id="sf_admin_list_th_descripcion">
     Año
	 </th>
	  <th id="sf_admin_list_th_id">
     Nota	 
	</th>
        <th id="sf_admin_list_th_id">
     Cod	 
	</th>
	  <th id="sf_admin_list_th_id">
     Fecha
	 </th>	 
	 <th id="sf_admin_list_th_accion">
     Accion
	 </th>
	 <th id="sf_admin_list_th_id">
     Modificar Nota y Estado             
	 </th>
    </tr>
<?php
//  $datos = $i; // Envio un array con la denominacion.
//  $dato1 = $i1;// Y otro array con los id para poder armar una tabla en la vista..
//	$dato2 = $i2; //Envio un array con los codigos.
//	$dato3 = $i3; //Envio un array con los costos.
//	$dato4 = $i4; //Envio un array con los cantidad.


$e=0;
$e2=0;
$e3=0;
$e4=0;
$e5=0;
$e6=0;
$e7=0;
$e8=0;

$acu1=0;
$c=0;
if ($idcursada!=0)
    {
  foreach ($datos as $a)
      { 
       $ides=$dato4[$e4++];
       $ides2=$dato5[$e5++];
       $ides6=$dato6[$e6++];      
       $ides3=$dato3[$e3++]; 
       $ides4=$datos[$e7++];
       $ides5=$dato7[$e8++];
       echo "<tr>"."<td>".$dato1[$e++]."</td>";
		$e--;

       echo"<td>". strtoupper($dato2[$e2++])."</td>"; 
       echo"<td>". strtoupper($ides2)."</td>";
       echo"<td>". strtoupper($ides6)."</td>";
       //echo "<td>". strtoupper($a)."</td>";
       echo"<td>". strtoupper($ides)."</td>";      
       echo"<td>". strtoupper($ides4)."</td>"; 
       echo"<td>". strtoupper($ides5)."</td>";
       $acu1=$acu1+$ides;


      		?>      
 <td>

  <?php echo button_to(__('      Borrar'), 'bintela/borrarintel?idactividad='.$datos[$e++].'&idcursada='.$sf_params->get('idcursada'), array ('confirm' => __('Esta seguro?'),
  'class' => 'sf_admin_action_delete',));  ?>
  </td>
  <?php // $e--;?>		
<td>
<?php echo button_to(__('     Actualizar'), 'dcursada/edit?id='.$ides3.'&idcursada='.$sf_params->get('idcursada'), array (
 'class' => 'sf_admin_action_create',)); ?>
</td>

</tr>

<?} }?>
</table>

</div>

</form>
<?php //print_r($datos);?>

<?php }else{?> 

<div class="form-row1">
<div class="col2">
<p style="color: #FF0000;"><?php  echo  "Aún no ha cargado materias a cursar"; ?></p>
</div>
</div>
<?php } ?>

</form>


