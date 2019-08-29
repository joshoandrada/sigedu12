    <td><?php echo $alumno->getMatricula() ?></td>
      <td><?php echo $alumno->getApellido() ?></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getNroDocumento() ?></td>
 <?php  $h77= sfPropelFinder::from('Carrera')->
	 where ('Id','like',$alumno->getFkCarreraId())->
	 find();
	 foreach ($h77 as $l77)  
         {
         $descarrera = $l77->getAbrev();
         }

     ?>
      <td><?php echo $descarrera ?></td>
  
