   <td><?php echo link_to($detallecursada->getId() ? $detallecursada->getId() : __('-'), 'detallecur/edit?id='.$detallecursada->getId()) ?></td>
    <td><?php echo $detallecursada->getActividad() ?></td>
      <td><?php echo $detallecursada->getAlumno() ?></td>
      <td><?php echo $detallecursada->getEstado() ?></td>
      <td><?php echo link_to($detallecursada->getFkCursadaId() ? $detallecursada->getFkCursadaId() : __('-'), 'cursadaa/edit?id='.$detallecursada->getFkCursadaId()) ?></td>
    <td><?php echo $detallecursada->getLibro() ?></td>
      <td><?php echo $detallecursada->getFolio() ?></td>
      <td><?php echo $detallecursada->getResult() ?></td>
      <td><?php echo ($detallecursada->getFecha() !== null && $detallecursada->getFecha() !== '') ? format_date($detallecursada->getFecha(), "D") : '' ?></td>
  