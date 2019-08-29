  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/actividad/sort') == 'nombre'): ?>
      <?php echo link_to(__('Nombre'), 'fechaact/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/actividad/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/actividad/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombre'), 'fechaact/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
