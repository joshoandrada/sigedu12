<form method="POST" action="enviar">
   <input type="hidden" id="id" name="id"  value="<?php echo $id; ?>"size="20" maxlength="20">
<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<div id="sf_admin_content">
  <div class="form-row">
     <br><td>Monto: <input type="text" id="monto" name="monto" size="20" maxlength="20"></td>
<ul class="sf_admin_actions">
      <li><input type="button" value="&nbsp &nbsp  Agregar  &nbsp &nbsp" class="botonesagregar" onclick="enviar(this.form,'http://localhost/clinica_dental/web/backend_dev.php/cuentas/agregar',true,'Estas seguro? Va a agregar un recibo a la cuenta <?echo $id;?>')"></li>
	        <li><?php echo button_to(('       Cancelar        '), 'cuentas/list', array (
  'class' => 'sf_admin_action_cancel',
)) ?></li>
  </ul>
  </div>
 </div>
</div> 
</form>
