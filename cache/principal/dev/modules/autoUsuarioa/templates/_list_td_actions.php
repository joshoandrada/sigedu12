<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'usuarioa/edit?id='.$usuario->getId()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'usuarioa/delete?id='.$usuario->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>
  <li><?php echo link_to(image_tag('small/permisos.png', array('alt' => __('Permisos'), 'title' => __('Permisos'))), 'usuarioa/editPermiso?id='.$usuario->getId()) ?></li>
</ul>
</td>
