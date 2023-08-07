<?php defined('_JEXEC') or die; $i = 0; $num = array(0, 1, 2); ?>

<div class="container-fluid">
	<div class="row u-offset u-margin__0 bg:gray-2">
		<?php foreach($this->items as $item) : ?>
		<div class="col-xs-12 col-sm-6 col-md-4<?php echo (!in_array($i, $num) ? ' js-skip animate' : ''); ?>">
			<div class="project project-footer mt+2">
				<img src="<?php echo ($item->image ? $item->image : '/images/thumbnail/thumb.jpg'); ?>" class="responsive-img" />
				<div class="project__caption p+ u-zIndex__1">
					<h3><?php echo $item->title; ?></h3>
					<span class="topheading"><?php echo $item->position; ?></span>
				</div>
			</div>
		</div>
		<?php $i++; endforeach; ?>
	</div>
</div>