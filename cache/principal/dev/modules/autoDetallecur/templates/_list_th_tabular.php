  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'id'): ?>
      <?php echo link_to(__('ID'), 'detallecur/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('ID'), 'detallecur/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_actividad">
        <?php echo __('Actividad') ?>
          </th>
  <th id="sf_admin_list_th_alumno">
        <?php echo __('Alumno') ?>
          </th>
  <th id="sf_admin_list_th_estado">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'estado'): ?>
      <?php echo link_to(__('Estado'), 'detallecur/list?sort=estado&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Estado'), 'detallecur/list?sort=estado&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fk_cursada_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'fk_cursada_id'): ?>
      <?php echo link_to(__('Cursada'), 'detallecur/list?sort=fk_cursada_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Cursada'), 'detallecur/list?sort=fk_cursada_id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_libro">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'libro'): ?>
      <?php echo link_to(__('Libro'), 'detallecur/list?sort=libro&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Libro'), 'detallecur/list?sort=libro&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_folio">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'folio'): ?>
      <?php echo link_to(__('Folio'), 'detallecur/list?sort=folio&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Folio'), 'detallecur/list?sort=folio&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_result">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'result'): ?>
      <?php echo link_to(__('Resultado'), 'detallecur/list?sort=result&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Resultado'), 'detallecur/list?sort=result&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fecha">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/detallecursada/sort') == 'fecha'): ?>
      <?php echo link_to(__('Fecha'), 'detallecur/list?sort=fecha&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/detallecursada/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha'), 'detallecur/list?sort=fecha&type=asc') ?>
      <?php endif; ?>
          </th>
