<table cellspacing="0" class="sf_admin_list">
<thead>
<tr>
<?php include_partial('list_th_tabular') ?>
  <th id="sf_admin_list_th_sf_actions"><?php echo __('Actions') ?></th>
</tr>
</thead>
<tfoot>
<tr><th colspan="4">
<div class="float-right">
<?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), 'bintela/list?page=1'.'&idcursada='.$sf_params->get('idcursada').'&idal='.$sf_params->get('idal')) ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), 'bintela/list?page='.$pager->getPreviousPage().'&idcursada='.$sf_params->get('idcursada').'&idal='.$sf_params->get('idal')) ?>

  <?php foreach ($pager->getLinks() as $page): ?>
    <?php echo link_to_unless($page == $pager->getPage(), $page, 'bintela/list?page='.$page.'&idcursada='.$sf_params->get('idcursada').'&idal='.$sf_params->get('idal')) ?>
  <?php endforeach; ?>

  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), 'bintela/list?page='.$pager->getNextPage().'&idcursada='.$sf_params->get('idcursada').'&idal='.$sf_params->get('idal')) ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), 'bintela/list?page='.$pager->getLastPage().'&idcursada='.$sf_params->get('idcursada').'&idal='.$sf_params->get('idal')) ?>
<?php endif; ?>
</div>
<?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
</th></tr>
</tfoot>
<tbody>
<?php $i = 1; foreach ($pager->getResults() as $intelectual): $odd = fmod(++$i, 2) ?>
<tr class="sf_admin_row_<?php echo $odd ?>">
<?php include_partial('list_td_batch_actions', array('intelectual' => $intelectual)) ?>
<?php include_partial('list_td_tabular', array('intelectual' => $intelectual)) ?>
<?php include_partial('list_td_actions', array('intelectual' => $intelectual)) ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
