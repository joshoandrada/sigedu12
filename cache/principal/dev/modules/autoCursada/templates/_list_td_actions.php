<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'cursada/edit?id='.$cursada->getId()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'cursada/delete?id='.$cursada->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>
</ul>
</td>
