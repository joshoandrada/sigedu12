    <td><?php echo $alumno->getMatricula() ?></td>
      <td><?php echo link_to($alumno->getApellido() ? $alumno->getApellido() : __('-'), 'alumno2a/edit?id='.$alumno->getId()) ?></td>
    <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getNroDocumento() ?></td>
      <td><?php echo $alumno->getFkEstadoalumnoId() ?></td>
      <td><?php echo $alumno->getTelefono() ?></td>
  