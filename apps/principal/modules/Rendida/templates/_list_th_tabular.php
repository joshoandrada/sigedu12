  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/rendida/sort') == 'id'): ?>
      <?php echo link_to(__('ID'), 'Rendida/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('ID'), 'Rendida/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_alumno">
        <?php echo __('Alumno') ?>
          </th>
  <th id="sf_admin_list_th_matricula">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/rendida/sort') == 'matricula'): ?>
      <?php echo link_to(__('Matricula'), 'Rendida/list?sort=matricula&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Matricula'), 'Rendida/list?sort=matricula&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_matricula">
        <?php echo __('Carrera') ?>
          </th>
  <th id="sf_admin_list_th_fecha">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/rendida/sort') == 'fecha'): ?>
      <?php echo link_to(__('Fecha de Emisión'), 'Rendida/list?sort=fecha&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha de Emisión'), 'Rendida/list?sort=fecha&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fk_llamada_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/rendida/sort') == 'fk_llamada_id'): ?>
      <?php echo link_to(__('Llamado'), 'Rendida/list?sort=fk_llamada_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/rendida/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Llamado'), 'Rendida/list?sort=fk_llamada_id&type=asc') ?>
      <?php endif; ?>
          </th>
