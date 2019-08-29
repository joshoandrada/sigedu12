  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/relactividaddivision/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'relactdiv/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/relactividaddivision/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/relactividaddivision/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'relactdiv/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_actividad">
        <?php echo __('Actividad') ?>
          </th>
  <th id="sf_admin_list_th_actividad">
        <?php echo __('Id_Div') ?>
          </th>        
  <th id="sf_admin_list_th_division">
        <?php echo __('Divisi&oacute;n') ?>
          </th>
