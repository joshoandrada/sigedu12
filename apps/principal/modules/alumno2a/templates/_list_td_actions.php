<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'alumno2a/edit?id='.$alumno->getId()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'alumno2a/delete?id='.$alumno->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>


  <li><?php echo link_to(image_tag('small/print.png', array('alt' => __('Imprimir Ficha Alumno'), 'title' => __('Imprimir Ficha Alumno'))), 'alumno2a/Impalumno?idd1='.$alumno->getId()) ?></li>

<li><?php echo link_to(image_tag('/sf/sf_admin/images/untitled.bmp', array('alt' => __('Imprimir Formulario'), 'title' => __('Imprimir formulario'))), 'alumno2a/Impalumnoform?idd1='.$alumno->getId()) ?></li>

</ul>
</td>
