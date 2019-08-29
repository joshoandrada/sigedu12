    <td><?php echo $alumno->getMatricula() ?></td>
    <td><?php echo link_to($alumno->getApellido() ? $alumno->getApellido() : __('-'), 'alumno2a/edit?id='.$alumno->getId()) ?></td>
    <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getNroDocumento() ?></td>
      <td><?php echo $alumno->getEstadosalumnos()->getNombre() ?></td>
      <td><?php echo $alumno->getTelefono() ?></td>

 <?php  $h1= sfPropelFinder::from('Usuario')->
     where ('FkAlumno','like',$alumno->getId())->
     find();
     foreach ($h1 as $css)  
       {
          $idalu = $css->getFkAlumno();
          $nombre_u = $css->getUsuario();
          $idusu = $css->getId();
        }
?>

<?php if ($idalu){?>
<td><?php echo link_to($nombre_u ? $nombre_u : __('-'), 'usuarioa/edit?id='.$idusu) //echo $nombre_u //echo $idalu ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>
<?php } else {?>
<?php $nro = substr($alumno->getNroDocumento(), -3);?>
<?php $nro1 = substr($alumno->getNroDocumento(), -6);?>
<td><?php echo link_to($nombre_u ? $nombre_u : __('Crear_nuevo_usuario'), 'usuario/create?usuario[usuario]='.$alumno->getApellido().$nro.'&usuario[nro_documento]='.$alumno->getNroDocumento().'&usuario[email]='.'jose@gmail.com'.'&usuario[seguridad_pregunta]=mi isfd'.'&usuario[seguridad_respuesta]='.'tobar') //echo $nombre_u //echo $idalu ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>

<?php }?>

<?php 
$dia=date("d");
$mes=date("m");
$ano=date("Y");

$dianaz=date("d",strtotime($alumno->getFechaNacimiento()));
$mesnaz=date("m",strtotime($alumno->getFechaNacimiento()));
$anonaz=date("Y",strtotime($alumno->getFechaNacimiento()));


//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

if ($mesnaz > $mes) {
$ano=($ano-1);}

 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

$edad=($ano-$anonaz);
?>
<td><?php echo $edad ?></td>
<td><?php echo $alumno->getActivo() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>

  
