<table cellspacing="0" class="sf_admin_list">
<thead>
<tr>
<?php include_partial('list_th_tabular') ?>
</tr>
</thead>
<tfoot>
<tr><th colspan="6">
<div class="float-right">
<?php if ($pager->haveToPaginate()): ?>

  <?php foreach ($pager->getLinks() as $page): ?>
    <?php echo "&nbsp;"?>
  <?php endforeach; ?>

<?php endif; ?>
</div>
</th></tr>
</tfoot>
<tbody>
<?php $i = 1; foreach ($pager->getResults() as $alumno): $odd = fmod(++$i, 2) ?>
<tr class="sf_admin_row_<?php echo $odd ?>">
<?php include_partial('list_td_batch_actions', array('alumno' => $alumno)) ?>
<?php include_partial('list_td_tabular', array('alumno' => $alumno)) ?>
<?php include_partial('list_td_actions', array('alumno' => $alumno)) ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
