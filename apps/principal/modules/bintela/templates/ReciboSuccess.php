<form method="POST" action="enviar">
   <input type="hidden" id="id" name="id"  value="<?php echo $id; ?>"size="20" maxlength="20">
<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<div id="sf_admin_content">
  <div class="form-row">
     <br><td>Monto: <input type="text" id="monto" name="monto" size="20" maxlength="20"></td>
<ul>


<li><?php echo button_to(('       Agregar        '), 'bintela/list', array (
  'class' => 'sf_admin_action_cancel',)) ?></li>




<li><?php echo button_to(('       Cancelar        '), 'bintela/list', array (
  'class' => 'sf_admin_action_cancel',)) ?></li>

  </ul>
  </div>
 </div>
</div> 
</form>
