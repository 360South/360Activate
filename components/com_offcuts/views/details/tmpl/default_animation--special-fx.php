<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>
<style>
.postheader__background .img{background-image:url('/images/heros/dt/hero-holo2.jpg')}
@media screen and (max-width:980px){.postheader__background .img {background-image:url(/images/heros/tb/hero-holo2.jpg)}}
@media screen and (max-width:640px){.postheader__background .img {background-image:url('/images/heros/mb/hero-holo2.jpg')}}
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
			<div class="col-xs-12">
				<div class="postbox p+ u-offset bg:gray-3 u-text__center">
					<div class="fs+2 pt- pb-">
						<h2>Get animated</h2>
						<p>Boundaries don’t exist in the world of animation, if you can dream it up we can bring it to life.</p>
					</div>
				</div>
				<div class="mt+2">
					<a href="https://www.youtube.com/watch?v=jafjnZJ_yo8" target="_blank"> <img src="/images/offcuts/video_fake.jpg" class="responsive-img" /> </a>
				</div>
			</div>

			<div class="col-md-6 col-xs-12 order-xs-1 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Chocolate or Pistachio</span>
						<h2>Choose your flavour</h2>
						<p>2D or 3D animation, we’ll create the perfect solution for your next big project.</p>
						<p>We can produce animation for TV commercials, websites, educational and training videos, product visualization and architectural fly-throughs.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 order-xs-1 order-md-unset mt+2">
				<img src="/images/offcuts/3DLogo.gif" class="responsive-img"/>
			</div>
			<div class="col-md-6 col-xs-12 order-xs-4 order-md-unset mt+2">
				<img src="/images/offcuts/OffcutsGif.gif" class="responsive-img"/>
			</div>
			<div class="col-md-6 col-xs-12 order-xs-3 order-md-unset mt+2">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Keep it moving</span>
						<h2>Add the Dynamic Touch</h2>
						<p>Great websites use animated elements to give users a more engaging, fun experience as well as encouraging intuitive navigation around your website.</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="postbox mt+2 p+ bg:gray-3 u-text__center">
					<div class="fs+2">
						<p><a href="<?php echo $linky; ?>">Let’s create something</a> that you can get animated about!</p>
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