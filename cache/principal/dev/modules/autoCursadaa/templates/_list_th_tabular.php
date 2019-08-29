  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/cursada/sort') == 'id'): ?>
      <?php echo link_to(__('ID'), 'cursadaa/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/cursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/cursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('ID'), 'cursadaa/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_alumno">
        <?php echo __('Alumno') ?>
          </th>
  <th id="sf_admin_list_th_fecha">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/cursada/sort') == 'fecha'): ?>
      <?php echo link_to(__('Fecha de Emisión'), 'cursadaa/list?sort=fecha&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/cursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/cursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha de Emisión'), 'cursadaa/list?sort=fecha&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_matricula">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/cursada/sort') == 'matricula'): ?>
      <?php echo link_to(__('Matricula'), 'cursadaa/list?sort=matricula&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/cursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/cursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Matricula'), 'cursadaa/list?sort=matricula&type=asc') ?>
      <?php endif; ?>
          </th>
