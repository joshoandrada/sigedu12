  <th id="sf_admin_list_th_matricula">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'matricula'): ?>
      <?php echo link_to(__('Matricula'), 'alumno2a/list?sort=matricula&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Matricula'), 'alumno2a/list?sort=matricula&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_apellido">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'apellido'): ?>
      <?php echo link_to(__('Apellido'), 'alumno2a/list?sort=apellido&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Apellido'), 'alumno2a/list?sort=apellido&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'nombre'): ?>
      <?php echo link_to(__('Nombres'), 'alumno2a/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombres'), 'alumno2a/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nro_documento">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'nro_documento'): ?>
      <?php echo link_to(__('Nro. Documento'), 'alumno2a/list?sort=nro_documento&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nro. Documento'), 'alumno2a/list?sort=nro_documento&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fk_estadoalumno_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'fk_estadoalumno_id'): ?>
      <?php echo link_to(__('Estado'), 'alumno2a/list?sort=fk_estadoalumno_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Estado'), 'alumno2a/list?sort=fk_estadoalumno_id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_telefono">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'telefono'): ?>
      <?php echo link_to(__('Tel&eacute;fono'), 'alumno2a/list?sort=telefono&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Tel&eacute;fono'), 'alumno2a/list?sort=telefono&type=asc') ?>
      <?php endif; ?>
          </th>
    <th id="sf_admin_list_th_fk_estadoalumno_id">
          <?php echo "Usuario"?>
          </th>
    <th id="sf_admin_list_th_fk_estadoalumno_id">
          <?php echo "Edad"?>
          </th>
    <th id="sf_admin_list_th_fk_estadoalumno_id">
          <?php echo "Act.Datos?"?>
          </th>
