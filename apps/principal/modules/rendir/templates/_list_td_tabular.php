    <td><?php echo link_to($rendida->getId() ? $rendida->getId() : __('-'), 'rendir/edit?id='.$rendida->getId()) ?></td>
    <td><?php echo $rendida->getAlumno() ?></td>
      <td><?php echo $rendida->getMatricula() ?></td>

 <?php  $h77= sfPropelFinder::from('Alumno')->
	 where ('Id','like',$rendida->getFkAlumnoId())->
	 find();
	 foreach ($h77 as $l77)  
         {
         $carre = $l77->getFkCarreraId();
         }
        $h71= sfPropelFinder::from('Carrera')->
	 where ('Id','like',$carre)->
	 find();
	 foreach ($h71 as $l71)  
         {
         $descarrera = $l71->getAbrev();
         }
?>
      <td><?php echo $descarrera ?></td>
      <td><?php echo ($rendida->getFecha() !== null && $rendida->getFecha() !== '') ? format_date($rendida->getFecha(), "D") : '' ?></td>
  
<?php    $h8= sfPropelFinder::from('Llamados')->
  	 where ('Id','like',$rendida->getFkLlamadaId())->
	 find();
	 foreach ($h8 as $l8)  
         {
	 $tur= $l8->getTurno();
         $lla= $l8->getLlamado();
         $mes= $l8->getFechai();
         
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha2 = $meses[date('n',strtotime($mes))-1]. " ".date('Y',strtotime($mes));

$llamado= $tur.'&#186 Turno - '.$lla.'&#186 Llamado '.$fecha2.' ('.$rendida->getFkLlamadaId().')'; 

         
          } 
    ?>  

      <td><?php echo $llamado?></td>
  
