    <td><?php echo $alumno->getMatricula() ?></td>
      <td><?php echo $alumno->getApellido() ?></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getNroDocumento() ?></td>
      <td><?php echo $alumno->getEstadosalumnos()->getNombre()?></td>
      <td><?php echo $alumno->getAdeuda() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>
