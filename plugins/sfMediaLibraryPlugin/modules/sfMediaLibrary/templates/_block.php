<?php if($sf_context->getActionName() !== 'choice'): ?>
  <?php $action = 'index' ?>
<?php else: ?>
  <?php $action = $sf_context->getActionName() ?>
<?php endif; ?>

<div class="thumbnails">
<?php if ($type === 'folder'): ?>
  <?php echo link_to(image_tag('/sfMediaLibraryPlugin/images/folder', array(
    'alt' => $name,
    'title' => $name,
    'size' => '64x64',
  )), 'sfMediaLibrary/'.$action.'?dir='.$current_path.'+'.$name) ?>
  <?php if (($action !== "index") and $is_file): ?>
    <?php $size = '&nbsp;' ?>
  <?php else: ?>
    <?php $size = '' ?>
  <?php endif; ?>
  <?php $delete = 'rmdir' ?>
<?php else: ?>
  <?php if ($info['size'] < 4000): ?>
    <?php $size2 = array() ?>
  <?php else: ?>
    <?php $size2 = array('height' => '64') ?>
  <?php endif; ?>
  <?php $thumbnail = image_tag($info['icon'], array(
    'alt' => $name,
    'title' => $name,
    ) + $size2) ?>
  <?php if($action === "index"): ?>
    <?php echo content_tag('a', $thumbnail, array(
      'href' => sfContext::getInstance()->getRequest()->getRelativeUrlRoot().$web_abs_current_path.'/'.$name,
      'target' => '_blank',
    )) ?>
  <?php else: ?>
    <?php echo link_to_function($thumbnail, "setFileSrc('".$web_abs_current_path.'/'.$name."')") ?>
  <?php endif; ?>

    <?php ob_start() ?>
    <?php if ($info['size'] < 1000): ?>
      &nbsp;&nbsp;[<?php printf('%d', $info['size']) ?> o]
    <?php else: ?>
      &nbsp;&nbsp;[<?php printf('%d', $info['size'] / 1000) ?> Ko]
    <?php endif; ?>
    <?php $size = ob_get_contents() ?>
    <?php ob_end_clean() ?>
  <?php $delete = 'delete' ?>
<?php endif; ?>
</div>
<div class="assetComment">
  <div id="view_<?php echo $count ?>"><?php echo $name //($action === "index") ? link_to_function($name, "Element.show('edit_".$count."');Element.hide('view_".$count."')") : $name ?></div>
  <?php if($action === "index"): ?>
    <div id="edit_<?php echo $count ?>">
      <?php //echo form_tag('sfMediaLibrary/rename', 'name=sf_asset_rename_form') ?>
        <?php //echo input_hidden_tag('current_path', $current_path) ?>
        <?php //echo input_hidden_tag('name', $name) ?>
        <?php //echo input_hidden_tag('type', $type) ?>
        <?php //echo input_hidden_tag('count', $count) ?>
        <?php //echo input_tag('new_name', $name) ?>
        <?php //echo submit_to_remote('rename', __('Rename', null, 'sfMediaLibrary'), array(
//          'url' => 'sfMediaLibrary/rename',
//          'update' => 'block_'.$count,
//          'script'=> true,
//          'before' => visual_effect('opacity', 'block_'.$count, array('duration' => '0.5', 'from' => '1.0', 'to' => '0.3')),
//          'complete' => visual_effect('opacity', 'block_'.$count, array('duration' => '0.5', 'from' => '0.3', 'to' => '1.0')),
//          ),'class=sf_asset_action_rename')?>

          <?php //echo button_to_function(__('Cancel', null, 'sfMediaLibrary'), "Element.hide('edit_".$count."');Element.show('view_".$count."')") ?>
      </form>
    </div>
    <?php echo javascript_tag("
    Element.hide('edit_".$count."');
    ") ?>
    <div style="text-align:right">
    <?php echo $size ?>
    <?php //echo link_to(image_tag('/sfMediaLibraryPlugin/images/delete.png', array(
      //'alt' => __('Delete', null, 'sfMediaLibrary'),
      //'title' => __('Delete', null, 'sfMediaLibrary'),
      //'align' => 'absmiddle',
    //)), 'sfMediaLibrary/'.$delete.'?name='.$name.'&current_path='.$current_path, array(
     // 'confirm' => __('Are you sure to want to delete this '.$type.'?', null, 'sfMediaLibrary')
    //)) ?>
    </div>
  <?php endif; ?>
</div>

