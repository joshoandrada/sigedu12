<div method="POST">
<input type="hidden" id="idrendida" name="idrendida"  value="<?php echo $idrendida; ?>"size="20" maxlength="20">
<?php if ($num!=0){?>
<div id="sf_admin_content">
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
     Resultado
	 </th>
	 <th id="sf_admin_list_th_descripcion">
     Año
	 </th>
	  <th id="sf_admin_list_th_descripcion">
     Libro
	 </th>
	  <th id="sf_admin_list_th_descripcion">
     Folio
	 </th>
	  <th id="sf_admin_list_th_descripcion">
     Nota
	 </th>
         <th id="sf_admin_list_th_descripcion">
     Cod 
	 </th>

    </tr>
<?php
$e=0;
$e2=0;
$e3=0;
$e4=0;
$e5=0;
$e6=0;
$dato3=3;
$acu1=0;
$c=0;
$e7=0;
$e8=0;

foreach ($datos as $a)
    { 
       $ides=$dato3[$e3++];
       $ides1=$dato4[$e4++];
       $ides2=$dato5[$e5++];
       $ides3=$dato6[$e6++];       
       $ides4=$dato7[$e7++];       
       $ides5=$dato8[$e8++];       

       //if ($ides2==1){
       //$ides2="Si";
       //}else{
       //$ides2="No";
       //}
       echo "<tr>"."<td>".$dato1[$e++]."</td>";
       echo"<td>". strtoupper($dato2[$e2++])."</td>"; 
       echo"<td>". strtoupper($ides2)."</td>";
        echo"<td>". strtoupper($ides3)."</td>";
        echo"<td>". strtoupper($ides4)."</td>";
        echo"<td>". strtoupper($ides5)."</td>";      
       echo"<td>". strtoupper($ides1)."</td>"; 
       echo"<td>". strtoupper($a)."</td>"; // cod mate
       //$acu1=$acu1+($ides*$ides1);
       ?> 
</tr>
<?} ?>
</table>
</div>
</div>
 <h2><?php echo __('Total Materias: '.$num) ?></h2>  
<?php }else{ ?>
<div class="form-row1">
<div class="col2">
<p style="color: #FF0000;"><?php  echo  "Aún no ha cargado detalles rendida"; ?></p>
</div>
</div>
<? }?>
</div>
