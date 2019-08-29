<td colspan="6">
    <?php echo $alumno->getMatricula() ?>
     - 
    <?php echo link_to($alumno->getApellido() ? $alumno->getApellido() : __('-'), 'alumno2a/edit?id='.$alumno->getId()) ?>
     - 
    <?php echo $alumno->getNombre() ?>
     - 
    <?php echo $alumno->getNroDocumento() ?>
     - 
    <?php echo $alumno->getFkEstadoalumnoId() ?>
     - 
    <?php echo $alumno->getTelefono() ?>
     - 
</td>