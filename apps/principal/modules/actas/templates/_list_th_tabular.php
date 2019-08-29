  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/llamadoacta/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'actas/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/llamadoacta/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/llamadoacta/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'actas/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fk_llamados_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/llamadoacta/sort') == 'fk_llamados_id'): ?>
      <?php echo link_to(__('Fk llamados'), 'actas/list?sort=fk_llamados_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/llamadoacta/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/llamadoacta/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fk llamados'), 'actas/list?sort=fk_llamados_id&type=asc') ?>
      <?php endif; ?>
          </th>
