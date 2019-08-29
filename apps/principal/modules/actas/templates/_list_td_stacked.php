<td colspan="2">
    <?php echo link_to($llamadoacta->getId() ? $llamadoacta->getId() : __('-'), 'actas/edit?id='.$llamadoacta->getId()) ?>
     - 
    <?php echo $llamadoacta->getFkLlamadosId() ?>
     - 
</td>