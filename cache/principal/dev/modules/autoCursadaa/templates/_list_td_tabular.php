    <td><?php echo link_to($cursada->getId() ? $cursada->getId() : __('-'), 'cursadaa/edit?id='.$cursada->getId()) ?></td>
    <td><?php echo $cursada->getAlumno() ?></td>
      <td><?php echo ($cursada->getFecha() !== null && $cursada->getFecha() !== '') ? format_date($cursada->getFecha(), "D") : '' ?></td>
      <td><?php echo $cursada->getMatricula() ?></td>
  