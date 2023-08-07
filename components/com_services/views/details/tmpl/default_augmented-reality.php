<?php defined('_JEXEC') or die; $prevnext = ServicesHelper::getPrevNext(); ?>
<style>
.postheader__background .img{background-image:url('/images/heros/dt/hero-ar.jpg')}
@media screen and (max-width:980px){.postheader__background .img {background-image:url(/images/heros/tb/hero-ar.jpg)}}
@media screen and (max-width:640px){.postheader__background .img {background-image:url('/images/heros/mb/hero-ar.jpg')}}
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
						<h2>Unlock a 3D world</h2>
						<p>Integrate the digital with printed media using Augmented Reality. Create interactive experiences for your customers wherever you print your marketing, newspapers, flier, business card and posters can all come to life.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-1 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">What is</span>
						<h2>Augmented Reality?</h2>
						<p>360Activate are at the front line of this rapidly developing field. We’ve always been excited by new technology and innovative design; augmented reality is the epitome of both.</p>
						<p>Augmented Reality lets you place a digital layer over any physical surface. Unlocking that layer with a smartphone or tablet and opens up a 3D experience upon the physical world. Imagine customers scanning an ad for your business and their amazement when it comes to life to display a video or the physical item you’re promoting.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-2 order-md-unset"> <img src="/images/services/augmented-reality/ar-dino.jpg" class="responsive-img"/> </div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-4 order-md-unset"> <img src="/images/services/augmented-reality/ar-dino2.jpg" class="responsive-img"/> </div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-3 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">How Augmented Reality can</span>
						<h2>Benefit You</h2>
						<p>By adding a digital recognition layer to any print media 360Activate can bring your product to life and give the viewer an interactive experience using layers of 3D, animation and product information. This makes your information much more malleable and available to your audience – not to mention fun! Use it as an exciting educational tool for schools or universities, real estate, medicine, physical products, and more. Augmented Reality can be added to already existing printed material or we can help ou design new materials to engage your audience.</p>
					</div>
				</div>
			</div>
			<?php /*<div class="row w-100 u-margin__0">
				<div class="col-md-3 col-sm-6 col-xs-12 mb+2">
					<div class="postbox h+100% mt+2 p- bg:gray-1 u-text__center">
						<svg viewBox="0 0 200 200" width="80">
							<path fill="#0f182e" d="M105.4,137.3L95,125.9L149.5,76c0.7-0.7,1.1-1.5,1.1-2.4c0-0.8-0.3-1.6-0.9-2.2c-1.2-1.3-3.3-1.4-4.6-0.2l-54.6,50l-2.1-2.3
				l-8.2-9l54.5-50c0.7-0.7,1.1-1.5,1.1-2.4c0-0.8-0.3-1.6-0.9-2.2c-1.2-1.3-3.3-1.4-4.6-0.2l-54.6,50L65.4,93.5L130,34.4
				c9.1,4.7,17.2,10.8,24,18.3c6.8,7.5,12.2,16.1,16,25.6L105.4,137.3z M95.4,146.4l-46,13.1c-0.1-0.3-0.4-0.5-0.5-0.8
				c-1.1-2.3-2.3-4.5-4-6.3c-1.7-1.8-3.7-3.3-5.9-4.6c-0.3-0.2-0.4-0.4-0.7-0.6l17.2-44.7l5.1-4.7l4.2,4.6l35.8,39.3L95.4,146.4z
				 M35.9,153.6c0.1,0.1,0.3,0.1,0.4,0.2c1.4,0.9,2.7,1.9,3.8,3.1c1.1,1.2,1.9,2.6,2.7,4.1c0.1,0.1,0.1,0.3,0.2,0.4l-11.3,3.2
				L35.9,153.6z M176.9,78c-4.1-11.1-10.2-21.1-18.1-29.8c-7.8-8.6-17.2-15.6-27.9-20.7c-1.2-0.6-2.7-0.4-3.6,0.5L58.6,90.8l-7.9,7.3
				c-0.4,0.3-0.8,0.8-1,1.4c0,0.1-0.1,0.2-0.1,0.3l-18.5,48.1l-7.9,20.5c-0.5,1.2-0.2,2.5,0.6,3.4c0.6,0.7,1.5,1.1,2.4,1.1
				c0.3,0,0.6,0,0.9-0.1l21.1-6l49.7-14.1c0.3-0.1,0.6-0.2,0.9-0.4c0.1-0.1,0.3-0.2,0.5-0.3l8.1-7.4L176,81.6
				C177,80.6,177.3,79.2,176.9,78"/>
						</svg>
						<h4 class="u-margin__0 mb0">Design 3D Content</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 mb+2">
					<div class="postbox h+100% mt+2 p- bg:gray-1 u-text__center">
						<svg viewBox="0 0 200 200" width="80">
							<path fill="#0f182e" d="M100,27.1c-38.3,0-69.4,32.8-69.4,73.2s31,73.2,69.4,73.2c38.3,0,69.4-32.8,69.4-73.2S138.1,27.1,100,27.1 M100,181.9
				c-42.6,0-77.3-36.6-77.3-81.6c0-45,34.7-81.6,77.3-81.6c42.6,0,77.3,36.6,77.3,81.6C177.3,145.3,142.6,181.9,100,181.9 M100,56.8c-22.7,0-41.2,19.4-41.2,43.5c0,24.2,18.4,43.5,41.2,43.5c22.7,0,41.2-19.4,41.2-43.5
				C141.2,76.2,122.7,56.8,100,56.8 M100,152.2c-27,0-49.2-23.2-49.2-51.9c0-28.7,22-51.9,49.2-51.9c27,0,49.2,23.2,49.2,51.9
				C149.2,129,127,152.2,100,152.2 M100,86.2c-7.2,0-13.4,6.2-13.4,14.1c0,7.7,5.9,14.1,13.4,14.1c7.2,0,13.4-6.2,13.4-14.1C113.1,92.4,107.2,86.2,100,86.2
				 M100,122.8c-11.8,0-21.3-10.1-21.3-22.5c0-12.4,9.5-22.5,21.3-22.5c11.8,0,21.3,10,21.3,22.5C121.1,112.7,111.6,122.8,100,122.8"/>
						</svg>
						<h4 class="u-margin__0 mb0">Create Targets</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 mb+2">
					<div class="postbox h+100% mt+2 p- bg:gray-1 u-text__center">
						<svg viewBox="0 0 200 200" width="80">
							<path fill="#0f182e" d="M178.1,154.8h-75.2v-32.3h75.2V154.8z M97,154.8H21.8v-32.3H97V154.8z M21.8,84.3h34.6v32.3H21.8V84.3z M21.8,46H97v32.3
	H21.8V46z M137.5,116.6H62.3V84.3h75.2V116.6z M181.1,116.6h-37.6V81.3c0-1.6-1.3-2.9-3-2.9h-37.6V43.1c0-1.6-1.3-2.9-3-2.9H18.8
	c-1.7,0-3,1.3-3,2.9v114.6c0,1.6,1.3,2.9,3,2.9h162.4c1.6,0,3-1.3,3-2.9v-38.2C184.1,117.9,182.8,116.6,181.1,116.6"/>
						</svg>
						<h4 class="u-margin__0 mb0">Build your App</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 mb+2">
					<div class="postbox h+100% mt+2 p- bg:gray-1 u-text__center">
						<svg viewBox="0 0 200 200" width="80">
							<path fill="#0f182e" d="M79.2,57.2c-0.6,0.5-1.6,0.9-2.4,0.9s-1.8-0.4-2.4-0.9L56.2,40.8c-1.4-1.2-1.4-3.2,0-4.2c1.4-1.2,3.5-1.2,4.7,0L79.2,53
	C80.6,54,80.6,55.9,79.2,57.2 M79.4,79.1c0,1.6-1.6,3-3.3,3h-4.5H50h-4.5c-1.8,0-3.4-1.4-3.4-3s1.6-3,3.4-3H50h21.5h4.5
	C77.9,76.1,79.4,77.5,79.4,79.1 M147.7,36.5c1.4,1.2,1.4,3.2,0,4.2L129.3,57c-0.6,0.5-1.6,0.9-2.4,0.9s-1.8-0.4-2.4-0.9
	c-1.4-1.2-1.4-3.2,0-4.2l18.3-16.3C144.3,35.2,146.5,35.2,147.7,36.5 M132.3,76.1h26c1.8,0,3.3,1.4,3.3,3s-1.6,3-3.3,3h-26
	c-1.8,0-3.3-1.4-3.3-3S130.5,76.1,132.3,76.1 M101.9,24c1.8,0,3.3,1.4,3.3,3v23.2c0,1.6-1.6,3-3.3,3c-1.8,0-3.4-1.4-3.4-3V27
	C98.6,25.4,100.1,24,101.9,24 M151.8,159.1L151.8,159.1c-1,7.2-6.1,10.9-15.2,10.9h-2.2H128h-27.8h-1.8H80.6
	c-6.5,0-11.6-4.6-11.6-10.3v-44.7v-0.2h0.6c0.4,0,0.6,0,1-0.2c1.2-0.4,26.6-6.8,26.6-27.5V69.1c2.8-0.4,7.5-0.5,10.8,1.6
	c3.2,2.1,4.7,6,4.7,11.8v21.1c0,1.6,1.6,3,3.3,3h12h15.4h4.3c6.5,0,11.6,4.6,11.6,10.3v0.2L151.8,159.1z M62.1,164
	c0,1.6-1.4,2.8-3.2,2.8H44.3c-1.8,0-3.2-1.2-3.2-2.8v-49.3c0-1.6,1.4-2.8,3.2-2.8h14.6c1.8,0,3.2,1.2,3.2,2.8V164z M147.7,100.5
	h-4.3H128h-8.7V82.4c0-7.7-2.6-13.3-7.5-16.5c-7.9-5.3-18.7-2.3-19.3-2.1c-1.4,0.4-2.4,1.6-2.4,2.8V87c0,6.7-3.5,12.3-10.5,16.7
	c-5.5,3.5-11.2,4.9-11.2,4.9c-0.6,0.2-1.2,0.5-1.6,0.9c-1.8-2.3-4.7-3.7-8.1-3.7H44.1c-5.5,0-10.1,4-10.1,8.9V164
	c0,4.9,4.5,9,10.1,9h14.6c3,0,5.5-1.2,7.5-3c3.4,3.7,8.5,6,14.2,6h17.8h1.8h27.8h6.5h2.2c12.4,0,20.5-5.8,21.9-16l7.5-42.3V117v-0.2
	C166,107.7,157.9,100.5,147.7,100.5"/>
						</svg>
						<h4 class="u-margin__0 mb0">Wow your Audience</h4>
					</div>
				</div>
			</div>*/ ?>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-5 order-md-unset">
				<div class="dt h+100%">
					<div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Customer Experience</span>
						<h2>Your Own App</h2>
						<p>360Activate design, create and publish your branded viewing app on both Apple and Android. This extends the reach of your Augmented Reality experience allowing the maximum number of customers and clients access to you, in their pocket, at any time they want.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 mt+2 order-xs-6 order-md-unset"> <img src="/images/services/augmented-reality/ar-melba.jpg" class="responsive-img"/> </div>
			<div class="col-xs-12 order-xs-7 order-md-unset">
				<div class="postbox mt+2 mb+2 p+ bg:gray-3 u-text__center">
					<div class="fs+2 pt- pb-">
						<h3 class="txt:yellow">Try the 360Activate AR App Now!</h3>
						<p>It’s as simple as download the 360Activate app to your phone through <a href="https://itunes.apple.com/au/app/360south-ar/id1119047272?mt=8" target="_blank">iTunes</a> or <a href="https://play.google.com/store/apps/details?id=com.south360.arapp&hl=en" target="_blank">Google Play</a>. Print the 360 Activate target <link>. Scan the target with the app and experience a new version of reality.</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 order-xs-8 order-md-unset">
				<div class="row w-100 u-margin__0">
					<div class="col-xs-12 col-md-4 u-display__flex mb+2">
				  		<span class="postbox p+ bg:gray-1 u-text__center">
					  		<h3><span class="txt:yellow">1.</span> Download App</h3>
					  		<img src="images/services/augmented-reality/app.png" class="mt+b mb+20" />
							<p><a href="https://itunes.apple.com/au/app/360activatear/id1450129733?mt=8" target="_blank">iTunes</a> | <a href="https://play.google.com/store/apps/details?id=com.activate360.activate&hl=en_AU" target="_blank">Google Play</a></p>
						</span>
					</div>
					<div class="col-xs-12 col-md-4 u-display__flex mb+2"> <a class="postbox p+ bg:gray-1 hover/bg:gray-2 u-text__center" href="/design-services-melbourne/360artarget.pdf" target="_blank">
	          <h3><span class="txt:yellow">2.</span> Print Target</h3>
	          <svg viewBox="0 0 612 612" width="110" class="mt+b">
	          <path fill="#0f182e" d="M169.8,347.3h272v41.3h17.7v-50.2c0-4.9-4-8.9-8.9-8.9H161c-4.9,0-8.9,4-8.9,8.9v50.2h17.7L169.8,347.3L169.8,347.3z
		 M300.2,489.3H235c-4.9,0-8.9,4-8.9,8.9c0,4.9,4,8.9,8.9,8.9h65.2c4.9,0,8.9-4,8.9-8.9C309.1,493.3,305.1,489.3,300.2,489.3z
		 M365.1,436H235c-4.9,0-8.9,4-8.9,8.9s4,8.9,8.9,8.9h130.1c4.9,0,8.9-4,8.9-8.9S370,436,365.1,436z M110.8,430.2H164V448h-53.2
		V430.2z M448,430.2h53.2V448H448V430.2z M78.9,424.4h104l-13.2,129.7c-0.3,2.1-0.9,8.6,3.4,13.2c4,4.3,9.2,4.9,14.7,4.9h236.2
		c5.2,0,10.7-0.6,14.7-4.9c4.3-4.6,3.7-11,3.4-13.2L429,424.4h104c2.4,0,4.6-0.9,6.1-2.4c20.8-20.2,21.1-60,21.1-98.2V321
		c0-38.6,0-69.2-21.1-89.4c-1.5-1.5-4-2.4-6.1-2.4h-67.3v-74.1c0-4.9-4-8.9-8.9-8.9h-44.4V97l-47.7-57.2H224.3
		c-12.5,0-30.6,8.6-30.6,24.2v82.3h-44.4c-4.9,0-8.9,4-8.9,8.9v74.1H78.9c-2.4,0-4.6,0.9-6.1,2.4C52,251.8,51.7,282.1,51.7,321v2.8
		c0,38.6,0,78,21.1,98.2C74.4,423.5,76.5,424.4,78.9,424.4z M424.1,554.5H187.9l0,0L205,382.8h202L424.1,554.5L424.1,554.5z M448,164
		v65.2h-35.5V164H448z M224.3,57.5h132.2l38.3,45.9v125.8H211.4V64C211.4,61.8,217.9,57.5,224.3,57.5z M158.2,164h35.5v65.2h-35.5
		V164z M69.5,320.7c0-32.4,0.3-58.8,13.5-74.1h446.8c13.2,15.3,13.5,41.3,13.5,74.1v2.8c0,33-0.3,67-13.5,82.9H427.8l-4.3-41.3H188.8
		l-4.3,41.3H82.6c-13.2-16.2-13.5-50.2-13.5-82.9v-2.8H69.5z"/>
	          </svg> </a>
						</div>
					<div class="col-xs-12 col-md-4 u-display__flex mb+2">
						<div class="postbox p+ bg:gray-1 u-text__center">
							<h3><span class="txt:yellow">3.</span> Experience Ar</h3>
							<img src="images/services/augmented-reality/augmented-reality-01.jpg" class="mt+b"/> </div>
					</div>
				</div>
			</div>

			<!-- <div class="col-md-12">
        <div class="mt+2"> <a href="http://www.360south.com.au/design-services-melbourne/360artarget.pdf" target="_blank"> <img src="/images/services/ar-brochures.jpg" class="responsive-img" /> </a> </div>
        <div class="mt+2"> <a href="http://www.360south.com.au/design-services-melbourne/360artarget.pdf" target="_blank"> <img src="/images/services/ar-brochures2.jpg" class="responsive-img" /> </a> </div>
      </div> -->
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