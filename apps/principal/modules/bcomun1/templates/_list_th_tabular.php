  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/comun/sort') == 'nombre'): ?>
      <?php echo link_to(__('Descripción'), 'bcomun1/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripción'), 'bcomun1/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
<th id="sf_admin_list_th_descripcion">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/comun/sort') == 'descripcion'): ?>
      <?php echo link_to(__('Carrera'), 'bcomun1/list?sort=descripcion&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Carrera'), 'bcomun1/list?sort=descripcion&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_orden">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/comun/sort') == 'orden'): ?>
      <?php echo link_to(__('Orden'), 'bcomun1/list?sort=orden&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Orden'), 'bcomun1/list?sort=orden&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_anio">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/comun/sort') == 'anio'): ?>
      <?php echo link_to(__('Año'), 'bcomun1/list?sort=anio&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/comun/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Año'), 'bcomun1/list?sort=anio&type=asc') ?>
      <?php endif; ?>
          </th>
  
