<td colspan="6">
    <?php echo $alumno->getMatricula() ?>
     - 
    <?php echo $alumno->getApellido() ?>
     - 
    <?php echo $alumno->getNombre() ?>
     - 
    <?php echo $alumno->getNroDocumento() ?>
     - 
    <?php echo $alumno->getFkEstadoalumnoId() ?>
     - 
    <?php echo $alumno->getAdeuda() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?>
     - 
</td>