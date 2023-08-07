<?php defined('_JEXEC') or die;
$prevnext = DisplaysHelper::getPrevNext(); ?>
<?php $contactLinky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>
<?php $addons 		= DisplaysHelper::getAddons($this->items[0]->catid); ?>
<?php $title 		= explode(' ',$this->items[0]->title); ?>
<?php #echo '<pre>';print_r($this->items);echo '</pre>'; ?>

<style>
.postheader__background .img { background-image: url('/images/heros-displays/dt/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>.jpg'); }
@media all and (max-width: 980px) {
	.postheader__background .img { background-image: url(/images/heros-displays/tb/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>.jpg); }
}
@media all and (max-width: 640px) {
	.postheader__background .img { background-image: url('/images/heros-displays/mb/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>.jpg'); }
}
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
          	<span class="topheading intro-title"><?php echo $topheading; ?></span>
          </div>
          <h2 class="grey mb0"><?php echo $title[0]; ?></h2>
          <h1 class="blue"><?php echo $title[1]; ?></h1>
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
						<h2>Introducing the Holo Fan</h2>
						<p>Be enthralled by 3D videos magnificently appear to float in mid-air. The Holo Fan is an effortless, cost-effective and captivating advertising solution.</p>
					</div>
				</div>
				<div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/displays/<?php echo DisplaysHelper::getTemplate(); ?>/holo-fan-top.jpg" class="responsive-img" /> </div>
				<div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
					<div class="fs+2 pt- pb-">
						<span class="topheading mb+20">Holo Fan</span>
						<h2 class="mb+20">Specs &amp; Features</h2>
						<p>The latest in holographic technology. Holo Fans are an effective tool for increasing sales and providing entertainment. Draw lingering crowds, they are the perfect advertising solutions for all businesses, from retail to exhibitions and more.</p>
						<div class="row mt+60 specs">
							<div class="col-md-4 col-sm-12 col-xs-12 u-text__left pr+ pb+30">
								<p><strong>Viewable Sides:</strong> 1</p>
								<p><strong>WxHxD:</strong> 420x420x130mm</p>
								<p><strong>Weight:</strong> 1.5kg</p>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 u-text__left pr+ pb+30">
								<p><strong>Viewing Angle:</strong> 176&deg;</p>
								<p><strong>Easy change of content via WiFi/App</strong></p>
								<p><strong>Quiet to run</strong></p>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 u-text__left pb+30">
								<p><strong>Unite multiple fans</strong></p>
								<p><strong>Indoor LCD digital signage</strong></p>
								<p><strong>Plays MP4 Video +</strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php $i=0;foreach($addons as $addon) : $addon->title = preg_replace("/<span[^>]*>([\s\S]*?)<\/span[^>]*>/",'',$addon->title); ?>

				<?php if ($i % 2 === 0) : ?>

					<div class="col-md-6 col-xs-12 mt+2">
						<div class="dt h+100%">
							<div class="postbox p+ bg:gray-3 dtc v-mid">
								<span class="topheading mb+10">Add ons</span>
								<h2 class="darkblue mt0 mb+20"><span class="grey">+</span><?php echo $addon->title; ?></h2>
								<?php echo $addon->body; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 mt+2">
						<img src="/images/addons/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>/<?php echo JFilterOutput::stringURLSafe($addon->title); ?>.jpg" class="responsive-img"/>
					</div>
					<?php if ($addon->title == 'Stand') : ?>
					<div class="col-md-12 col-xs-12 mt+2">
						<img src="/images/addons/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>/stand-large.jpg" class="responsive-img"/>
					</div>
					<?php endif; ?>

				<?php else : ?>

					<div class="col-md-6 col-xs-12 mt+2">
						<img src="/images/addons/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>/<?php echo JFilterOutput::stringURLSafe($addon->title); ?>.jpg" class="responsive-img"/>
					</div>
					<div class="col-md-6 col-xs-12 mt+2">
						<div class="dt h+100%">
							<div class="postbox p+ bg:gray-3 dtc v-mid">
								<span class="topheading mb+10">Add ons</span>
								<h2 class="darkblue mt0 mb+20"><span class="grey">+</span><?php echo $addon->title; ?></h2>
								<?php echo $addon->body; ?>
							</div>
						</div>
					</div>
					<?php if ($addon->title == 'Stand') : ?>
					<div class="col-md-12 col-xs-12 mt+2">
						<img src="/images/addons/<?php echo JFilterOutput::stringURLSafe($this->items[0]->title); ?>/stand-large.jpg" class="responsive-img"/>
					</div>
					<?php endif; ?>

				<?php endif; ?>
			<?php $i++;endforeach; ?>

			<div class="col-md-12">
				<div class="postbox mt+2 mb+2 p+ bg:gray-3 u-text__center">
					<div class="fs+2 pt- pb-">
						<p><a href="<?php echo $contactLinky; ?>">Contact us</a> to talk about the possibilities for boosting your sales by attracting customers to your store.</p>
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
        <?php echo $item->intro; ?>
        <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
      </a> </div>
		<?php $i++; endforeach; ?>
	</div>
</div>