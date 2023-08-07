<?php defined('_JEXEC') or die; $prevnext = ServicesHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>
<style>
.postheader__background .img{background-image:url('/images/heros/dt/hero-vr.jpg')}
@media screen and (max-width:980px){.postheader__background .img {background-image:url(/images/heros/tb/hero-vr.jpg)}}
@media screen and (max-width:640px){.postheader__background .img {background-image:url('/images/heros/mb/hero-vr.jpg')}}
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
						<h2>It’s Virtually Reality</h2>
						<p>Evoke a unique emotional connection with your audience though the creation of a custom virtual reality experience that will take your clients into a new realm.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-1 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">For those who want to be</span>
						<h2>Ahead of the Game</h2>
						<p>360Activate are here to make you look good, so we are always searching for the most innovative, cutting edge and exciting forms of marketing around.</p>
						<p>Working together we can deliver fully immersive Virtual Reality experiences to your customers. Whether you’re looking for a fun game, a unique experience or the ability to place someone in another world, we incorporate dramatic environments, dynamic lighting and immersive audio that takes you to another world – your customers will never want to return to real life.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-2 order-md-unset">
				<img src="/images/services/virtual-reality/vr-circ.jpg" class="responsive-img"/>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-4 order-md-unset">
				<img src="/images/services/virtual-reality/vr-plane.jpg" class="responsive-img"/>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-3 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Endless</span>
						<h2>Creative Possibilities</h2>
						<p>Virtual Reality isn’t limited to gaming. 360Activate can transform an otherwise impossible scenario into a mind blowing reality. Imagine standing on the deck of an ancient shipwreck thousands of meters below the ocean or walking through your new house before the first brick is even placed. 360Activate can tailor the technology to staff training programs, the tourism industry, retail marketing and much more. The only limit is imagination.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-5 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid">
						<span class="topheading">When retro meets futuristic you get</span>
						<h2>The VR Box</h2>
						<p>VR Box is our Virtual Reality solution designed to roll in and out of any activation. Its purpose is to make VR easy and accessible for everyone. Everything you need is ready to go, a VR experience can be up and running in minutes. The VR Box was fully designed and built in-house by our VR production team. </p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-6 order-md-unset">
				<img src="/images/services/virtual-reality/vr-box.jpg" class="responsive-img"/>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-8 order-md-unset">
				<img src="/images/services/virtual-reality/vr-box2.jpg" class="responsive-img"/>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-7 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid">
						<span class="topheading">Sleek & Engaging</span>
						<h2>Hire our VR Pack</h2>
						<p>Elegant looking, easy to use and easy to setup, at its heart it contains a custom built, high end gaming PC with all the latest components and a multiple fan cooling system in-built. For maximum audience engagement, the VR Box can be easily paired with a large screen TV or any other digital display. To find out more, just ask our sales team for a demonstration.</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
					<div class="fs+2">
						<p><a href="<?php echo $linky; ?>">Ask us</a> how Virtual Reality can work for you.</p>
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