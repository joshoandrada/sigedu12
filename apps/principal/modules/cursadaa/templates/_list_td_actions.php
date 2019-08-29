<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'cursadaa/edit?id='.$cursada->getId()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'cursadaa/delete?id='.$cursada->getId(), array (
  'post' => true,
  'confirm' => __('Esta Usted seguro?'),
)) ?></li>
<? if($cursada->getAuxi() == 1 ){?>
<li><?php echo link_to(image_tag('/sf/sf_admin/images/untitled.bmp', array('alt' => __('Imprimir'), 'title' => __('Imprimir'))), 'cursadaa/imprimir?idd1='.$cursada->getFkAlumnoId().'&idrendida='.$cursada->getId().'&idllamado='.$cursada->getFkLlamadaId()) ?></li>
<?php }?>
</ul>
</td>
