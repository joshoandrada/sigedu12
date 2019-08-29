<td colspan="5">
    <?php echo link_to($usuario->getUsuario() ? $usuario->getUsuario() : __('-'), 'usuarioa/edit?id='.$usuario->getId()) ?>
     - 
    <?php echo get_partial('establecimiento', array('type' => 'list', 'usuario' => $usuario)) ?>
     - 
    <?php echo $usuario->getActivo() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?>
     - 
    <?php echo $usuario->getSeguridadPregunta() ?>
     - 
    <?php echo $usuario->getSeguridadRespuesta() ?>
     - 
</td>