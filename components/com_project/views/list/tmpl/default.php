<?php defined('_JEXEC') or die; $Itemid = JRequest::getVar('Itemid'); $i = 0; ?>
<?php $sectors = ProjectHelper::getSector(); ?>
<?php $services = ProjectHelper::getService(); ?>
<?php
//render breadcrumb module
$modName = 'mod_header '; 
$modTitle = 'Header ';
$_mod_header  = JModuleHelper::getModule($modName, $modTitle);
$mod_header  = JModuleHelper::renderModule($_mod_header );
?>
<?php echo $mod_header;?>
<div id="content">
	<?php /*<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="postbox u-offset" style="z-index: 99;overflow:visible">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<select class="select wide" name="sector">
								<option data-display="Filter by Sector" value="0">All</option>
								<?php foreach($sectors as $sector) : ?>
								<option value="<?php echo $sector->id; ?>">
									<?php echo $sector->title; ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-sm-6 col-xs-12">
							<select class="select wide" name="service">
								<option data-display="Filter by Service" value="0">All</option>
								<?php foreach($services as $service) : ?>
								<option value="<?php echo $service->id; ?>">
									<?php echo $service->title; ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>*/ ?>
	<div class="container-fluid" id="portfolio">
		<div class="row u-offset u-margin__0 bg:gray-2">
			<?php foreach($this->items as $item) : $linky = JRoute::_('index.php?option=com_project&view=article&id=' . $item->id . ':' . JFilterOutput::stringURLSafe( $item->title ) . '&Itemid=' . $Itemid ); ?>
			<div class="col-xs-12 col-sm-12 col-md-4<?php echo ($i >= 3 ? ' js-skip' : ''); ?>">
				<a class="project mt+2" sector-id="<?php echo $item->sector; ?>" service-id="<?php echo $item->service; ?>" href="<?php echo $linky; ?>">
					<img src="<?php echo ($item->image ? $item->image : 'http://placehold.it/640x430'); ?>" class="responsive-img" />
					<div class="project__caption p2+ u-zIndex__1">
						<h3><?php echo $item->title; ?></h3>
						<?php if($item->service) : ?>
						<ul class="tags-list">
							<?php foreach(explode(',', $item->service) as $service) : ?>
							<li><?php echo ProjectHelper::getServiceName2($service); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
						<i class="fa fa-arrow-right"></i>
					</div>
				</a>
			</div>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</div>