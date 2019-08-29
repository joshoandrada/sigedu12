    <td><?php echo link_to($usuario->getUsuario() ? $usuario->getUsuario() : __('-'), 'usuarioa/edit?id='.$usuario->getId()) ?></td>
    <td><?php echo get_partial('establecimiento', array('type' => 'list', 'usuario' => $usuario)) ?></td>
      <td><?php echo $usuario->getActivo() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>
      <td><?php echo $usuario->getSeguridadPregunta() ?></td>
      <td><?php echo $usuario->getSeguridadRespuesta() ?></td>
  