<ul class="sf_admin_actions">
<?php if ($usuario->getId()) {?>



<?php if ($sf_user->getAttribute('id')!=9) {?>

<li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
<!-- 
<li><?php echo button_to(__('Volver a Menu Principal'), '@homepage', array (
  'class' => 'sf_admin_action_reset_filter',
)) ?></li>

<li><?php echo button_to(__('Cerrar Sesion'), 'seguridad/logout', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
 -->

<?php }?>

<?php } else {?>

<!--

<li><?php echo button_to(__('Volver a Menu Principal'), '@homepage', array (
  'class' => 'sf_admin_action_reset_filter',
)) ?></li>


<li><?php echo button_to(__('Cerrar Sesion'), 'seguridad/logout', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
 -->

 <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
 
<?php }?>
<?php //endif; ?>
</ul>


