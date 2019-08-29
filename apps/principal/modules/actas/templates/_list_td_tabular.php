    <td><?php echo link_to($llamadoacta->getId() ? $llamadoacta->getId() : __('-'), 'actas/edit?id='.$llamadoacta->getId()) ?></td>
    <td><?php echo $llamadoacta->getFkLlamadosId() ?></td>
  