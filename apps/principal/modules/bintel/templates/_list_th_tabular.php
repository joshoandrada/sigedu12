  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/intelectual/sort') == 'nombre'): ?>
      <?php echo link_to(__('Descripción'), 'bintel/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/intelectual/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/intelectual/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripción'), 'bintel/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_orden">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/intelectual/sort') == 'orden'): ?>
      <?php echo link_to(__('Orden'), 'bintel/list?sort=orden&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/intelectual/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/intelectual/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Orden'), 'bintel/list?sort=orden&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_anio">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/intelectual/sort') == 'anio'): ?>
      <?php echo link_to(__('Año'), 'bintel/list?sort=anio&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/intelectual/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/intelectual/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Año'), 'bintel/list?sort=anio&type=asc') ?>
      <?php endif; ?>
          </th>
