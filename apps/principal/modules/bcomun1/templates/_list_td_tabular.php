<?php $nombre2=$comun->getNombre().' ('.$comun->getId().')'?>
    <td><?php echo $nombre2 ?></td>
     

<?php $idorden=$comun->getOrden(); ?>
<? if ($idorden == 8 || $idorden == 9 || $idorden == 10 || $idorden == 11){?>

 <td><p style="color: #0000ff;"><?php echo $comun->getDescripcion() ?></p></td>
      
<?} else {?>
      <td><?php echo $comun->getDescripcion() ?></td>
<?}?>     

      <td><?php echo $comun->getOrden() ?></td>
      <td><?php echo $comun->getAnio() ?></td>