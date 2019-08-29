  <th id="sf_admin_list_th_matricula">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'matricula'): ?>
      <?php echo link_to(__('Matricula'), 'alumno3/list?sort=matricula&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Matricula'), 'alumno3/list?sort=matricula&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_apellido">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'apellido'): ?>
      <?php echo link_to(__('Apellido'), 'alumno3/list?sort=apellido&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Apellido'), 'alumno3/list?sort=apellido&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'nombre'): ?>
      <?php echo link_to(__('Nombres'), 'alumno3/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombres'), 'alumno3/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nro_documento">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'nro_documento'): ?>
      <?php echo link_to(__('Nro. Documento'), 'alumno3/list?sort=nro_documento&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nro. Documento'), 'alumno3/list?sort=nro_documento&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fk_estadoalumno_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'fk_estadoalumno_id'): ?>
      <?php echo link_to(__('Estado'), 'alumno3/list?sort=fk_estadoalumno_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Estado'), 'alumno3/list?sort=fk_estadoalumno_id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_adeuda">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'adeuda'): ?>
      <?php echo link_to(__('Pag&oacute;?'), 'alumno3/list?sort=adeuda&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Pag&oacute;?'), 'alumno3/list?sort=adeuda&type=asc') ?>
      <?php endif; ?>
          </th>
