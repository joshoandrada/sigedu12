    <td><?php echo link_to($rendida->getId() ? $rendida->getId() : __('-'), 'rendir/edit?id='.$rendida->getId()) ?></td>
    <td><?php echo $rendida->getAlumno() ?></td>
      <td><?php echo $rendida->getMatricula() ?></td>
      <td><?php echo $rendida->getMatricula() ?></td>
      <td><?php echo ($rendida->getFecha() !== null && $rendida->getFecha() !== '') ? format_date($rendida->getFecha(), "D") : '' ?></td>
      <td><?php echo $rendida->getFkLlamadaId() ?></td>
  