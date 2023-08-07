<?php defined('_JEXEC') or die; $Itemid = JRequest::getVar('Itemid'); ?>

<div class="container">
	<div class="row bg:gray-2">
		
			<?php $i = 1; foreach($this->items as $item) : $linky = JURI::base().substr(JRoute::_('index.php?option=com_careers&view=details&id=' . $item->id . ':' . JFilterOutput::stringURLSafe($item->title) . '&Itemid=' . $Itemid), strlen(JURI::base(true)) + 1); ?>
			<div class="col-xs-12 col-sm-6 u-display__flex animate js-skip">
				<a class="postbox p2+ <?php echo ($i != count($this->items) && $i != (count($this->items)) - 1 ? 'mb+2' : ''); ?> bg:gray-3 hover/bg:gray-2" href="<?php echo $linky; ?>"><h4><?php echo $item->title; ?></h4><p><?php echo $item->intro; ?></p><i class="fa fa-arrow-right link__bottom"></i></a>
			</div>
			<?php $i++; endforeach; ?>
			
	</div>
</div>