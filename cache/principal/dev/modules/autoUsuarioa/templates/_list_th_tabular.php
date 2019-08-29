  <th id="sf_admin_list_th_usuario">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuario/sort') == 'usuario'): ?>
      <?php echo link_to(__('Usuario'), 'usuarioa/list?sort=usuario&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Usuario'), 'usuarioa/list?sort=usuario&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_establecimiento">
        <?php echo __('Establecimiento') ?>
          </th>
  <th id="sf_admin_list_th_activo">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuario/sort') == 'activo'): ?>
      <?php echo link_to(__('esta activo?'), 'usuarioa/list?sort=activo&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('esta activo?'), 'usuarioa/list?sort=activo&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_seguridad_pregunta">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuario/sort') == 'seguridad_pregunta'): ?>
      <?php echo link_to(__('Pregunta'), 'usuarioa/list?sort=seguridad_pregunta&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Pregunta'), 'usuarioa/list?sort=seguridad_pregunta&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_seguridad_respuesta">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuario/sort') == 'seguridad_respuesta'): ?>
      <?php echo link_to(__('Respuesta'), 'usuarioa/list?sort=seguridad_respuesta&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuario/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Respuesta'), 'usuarioa/list?sort=seguridad_respuesta&type=asc') ?>
      <?php endif; ?>
          </th>
