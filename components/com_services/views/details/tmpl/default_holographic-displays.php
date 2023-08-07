<?php defined('_JEXEC') or die; $prevnext = ServicesHelper::getPrevNext(); ?> 
<?php $contactLinky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>
<?php $displays = ServicesHelper::getDisplays(); ?>
<?php #echo '<pre>';print_r($displays);echo '</pre>'; ?>
<style>
.postheader__background .img{background-image:url('/images/heros/dt/hero-holo.jpg')}
@media screen and (max-width:980px){.postheader__background .img {background-image:url(/images/heros/tb/hero-holo.jpg)}}
@media screen and (max-width:640px){.postheader__background .img {background-image:url('/images/heros/mb/hero-holo.jpg')}}
</style>
<div class="postheader" id="parallax">
	<div class="postheader__background layer is-active" data-depth="0.30">
		<div class="img"> </div>
	</div>
	<div class="container">
		<div class="postheader__head is-centered u-zIndex__3">
			<div class="row">
				<div class="col-md-7">
					<div class="oh">
						<span class="topheading intro-title">
							<?php echo $topheading; ?>
						</span>
					</div>
					<h2 class="grey mb0">
						<?php echo $title[0]; ?>
					</h2>
					<h1 class="blue">
						<?php echo $title[1]; ?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="row bg:gray-2">
			<div class="col-md-12">
				<div class="postbox p+ u-offset bg:gray-3 u-text__center">
					<div class="fs+2 pt- pb-">
						<h2>Explore our Holo Range</h2>
						<p>Available for lease or purchase, our  unique holographic display units come in styles and sizes to suit your space and needs.</p>
						<p><a href="<?php echo $contactLinky; ?>">Book now</a> to visit our Southbank showroom.</p>
					</div>
				</div>
			</div>
			<?php $i=0;$order=1;foreach($displays as $display) : $Itemid = ServicesHelper::getItemid($display->title); $linky = JURI::base().substr(JRoute::_('index.php?option=com_displays&Itemid='.$Itemid),strlen(JURI::base(true))+1); ?>
				<?php $title = explode(' ',$display->title); ?>
				<?php if ($i % 2 === 0) : ?>
					<div class="col-md-6 col-sm-4 mt+2 animate js-skip is-animated order-xs-<?php echo $order+1; ?> order-md-unset">
						<a href="<?php echo $linky; ?>"><img src="<?php echo $display->image; ?>" class="responsive-img"/></a>
					</div>
					<div class="col-md-6 col-sm-8 mt+2 animate js-skip is-animated order-xs-<?php echo $order; ?> order-md-unset">
						<div class="u-display__flex h+100%">
							<a class="postbox p+ bg:gray-3 hover/bg:gray-2" href="<?php echo $linky; ?>">
								<?php /*<h3 class="grey mt0 mb0 pb0"><?php echo $title[0]; ?></h3>*/ ?>
								<h2 class="blue mt0"><?php echo $title[0]; ?></h2>
								<?php echo $display->body; ?>
								<p><i class="fa fa-arrow-right" aria-hidden="true"></i></p>
							</a>
						</div>
					</div>
				<?php else : ?>
					<div class="col-md-6 col-sm-8 mt+2 animate js-skip is-animated order-xs-<?php echo $order; ?> order-md-unset">
						<div class="u-display__flex h+100%">
							<a class="postbox p+ bg:gray-3 hover/bg:gray-2" href="<?php echo $linky; ?>">
								<?php /*<h3 class="grey mt0 mb0 pb0"><?php echo $title[0]; ?></h3>*/ ?>
								<h2 class="blue mt0"><?php echo $title[0]; ?></h2>
								<?php echo $display->body; ?>
								<p><i class="fa fa-arrow-right" aria-hidden="true"></i></p>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-4 mt+2 animate js-skip is-animated order-xs-<?php echo $order+1; ?> order-md-unset">
						<a href="<?php echo $linky; ?>"><img src="<?php echo $display->image; ?>" class="responsive-img"/></a>
					</div>
				<?php endif; ?>
			<?php $i++;$order=$order+2;endforeach; ?>
			<div class="col-md-12">
				<div class="postbox mt+2 mb+2 p+ bg:gray-3 u-text__center">
					<div class="fs+2 pt- pb-">
						<p>Unsure of what’s right for you or interested in pricing?<br/>Please <a href="<?php echo $contactLinky; ?>">contact</a> one of our sales representatives.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row u-margin__0 mt+2">
		<?php $i = 0; foreach($prevnext as $item) : ?>
		<div class="col-md-6 col-xs-12 mb+2"> <a class="project project-footer <?php echo ($i == 0 ? 'u-text__right' : ''); ?>" href="<?php echo $item->link; ?>"> <img src="<?php echo $item->image; ?>" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3><?php echo $item->title; ?></h3>
        <p><?php echo $item->intro; ?></p>
        <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
      </a> </div>
		<?php $i++; endforeach; ?>
	</div>
</div>