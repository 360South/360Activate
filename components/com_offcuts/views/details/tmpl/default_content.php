<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Vestibulum iaculis blandit tellus, quis dignissim leo gravida non!</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid">
           	<span class="topheading">What is</span>
            <h2>Content</h2>
            <p>To give your holograms unit the maximum wow factor, you’ll need some visually extraordinary and engaging animated content. Deliver your brand message to customers like never before.</p>
            <p>RealVision produce high end animation guaranteed to get everyone talking.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/offcuts/augmented-reality/ar-dino.jpg" class="responsive-img" /> </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/offcuts/augmented-reality/ar-dino2.jpg" class="responsive-img" /> </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid">
           	<?php /*<span class="topheading">How AR can</span>*/ ?>
            <h2>Brand Promotion</h2>
            <p>Take your logo to another dimension, let our creative animation team bring your branding to life with state of the art 3D rendering and special effects.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid">
           	<?php /*<span class="topheading">How AR can</span>*/ ?>
            <h2>Physical Product</h2>
            <p>Place your physical product inside the hologram unit and watch it come to life within a truly immersive 3D animation.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/offcuts/augmented-reality/ar-dino2.jpg" class="responsive-img" /> </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/offcuts/augmented-reality/ar-dino2.jpg" class="responsive-img" /> </div>     
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid">
           	<?php /*<span class="topheading">How AR can</span>*/ ?>
            <h2>Virtual Product</h2>
            <p>Let us create an animated virtual 3D replica of your product. The perfect solution to demonstrate how your product works while allowing the viewer to personally connect with your brand.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid">
           	<?php /*<span class="topheading">How AR can</span>*/ ?>
            <h2>Message Promotion</h2>
            <p>Get your message across with a high impact, memorable 3D animation to promote your offcut offerings, proven to get people talking.</p>
            <ul>
				<li>3D Animation</li>
				<li>HD Holograms</li>
			</ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/offcuts/augmented-reality/ar-dino2.jpg" class="responsive-img" /> </div>      
      
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
