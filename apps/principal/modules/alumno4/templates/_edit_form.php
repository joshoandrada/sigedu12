<?php echo form_tag('alumno4/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($alumno, 'getId') ?>

<fieldset id="sf_fieldset_informacion_personal" class="">
<h2><?php echo __('Informacion Personal') ?></h2>


<div class="form-row">
  <?php echo "Apellido y Nombre :"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$alumno->getApellido()."&nbsp;"."&nbsp;"."&nbsp;".$alumno->getNombre() ?>

</div>

<?php $h2= sfPropelFinder::from('Tipodocumento')->
     where ('Id','like',$alumno->getFkTipodocumentoId())->
     find();
     foreach ($h2 as $h31)  
       {        
	$nom=$h31->getNombre();
       } ?>

<div class="form-row">
  <?php echo "Tipo y Nro Documento:"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;".$nom."&nbsp;"."&nbsp;"."&nbsp;".$alumno->getNroDocumento() ?>

</div>


<div class="form-row">
  <?php echo label_for('alumno[fk_carrera_id]', __($labels['alumno{fk_carrera_id}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alumno{fk_carrera_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alumno{fk_carrera_id}')): ?>
    <?php echo form_error('alumno{fk_carrera_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alumno, 'getFkCarreraId', array (
  'related_class' => 'Carrera',
  'control_name' => 'alumno[fk_carrera_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('alumno' => $alumno)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
