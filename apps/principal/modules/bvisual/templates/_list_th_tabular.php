  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/visual/sort') == 'nombre'): ?>
      <?php echo link_to(__('Descripción'), 'bvisual/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/visual/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/visual/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripción'), 'bvisual/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_orden">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/visual/sort') == 'orden'): ?>
      <?php echo link_to(__('Orden'), 'bvisual/list?sort=orden&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/visual/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/visual/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Orden'), 'bvisual/list?sort=orden&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_anio">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/visual/sort') == 'anio'): ?>
      <?php echo link_to(__('Año'), 'bvisual/list?sort=anio&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/visual/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/visual/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Año'), 'bvisual/list?sort=anio&type=asc') ?>
      <?php endif; ?>
          </th>
