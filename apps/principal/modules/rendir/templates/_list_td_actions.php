<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'rendir/edit?id='.$rendida->getId()) ?></li>
 
<? if($rendida->getAuxi() == 1 ){?>
<li><?php echo link_to(image_tag('/sf/sf_admin/images/untitled.bmp', array('alt' => __('Imprimir'), 'title' => __('Imprimir'))), 'rendir/Impalumno?idd1='.$rendida->getFkAlumnoId().'&idrendida='.$rendida->getId().'&idllamado='.$rendida->getFkLlamadaId()) ?></li>
<?php }?>
</ul>
</td>
