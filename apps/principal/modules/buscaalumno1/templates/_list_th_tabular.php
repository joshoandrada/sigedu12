  <th id="sf_admin_list_th_apellido_materno">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'apellido_materno'): ?>
      <?php echo link_to(__('Apellido y Nombre'), 'buscaalumno1/list?sort=apellido_materno&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Apellido y Nombre'), 'buscaalumno1/list?sort=apellido_materno&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nro_documento">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alumno/sort') == 'nro_documento'): ?>
      <?php echo link_to(__('Dni'), 'buscaalumno1/list?sort=nro_documento&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alumno/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Dni'), 'buscaalumno1/list?sort=nro_documento&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_carrera">
        <?php echo __('Matricula') ?>
          </th>
 <th id="sf_admin_list_th_carrera">
        <?php echo __('Carrera') ?>
          </th>
