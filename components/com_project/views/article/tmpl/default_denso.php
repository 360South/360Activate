<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>

<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-01.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">A unique solution</div>
            </div>
            <div class="oh">
              <div class="intro-title">for a large product</div>
            </div>
          </h1>
          <div class="oh tb">
            <div class="intro-line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-sm-12">
        <div class="postbox p+ u-offset bg:gray-3">
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1 u-text__center">
              <?php if( $this->items[0]->service ) : ?>
              <ul class="tags-list">
                <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
                <li><?php echo ProjectHelper::getServiceName( $service ); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
              <div class="fs+2 pt0 pb+30">
                <p>Find out below how we developed a quick and cost-effective solution to rendering 3D models while maintaining that essential wow factor.</p>
              </div>
            </div>
          </div>
        </div>
		<div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/EBEaWEFLsrQ" frameborder="0" allowfullscreen></iframe></div> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12 col-xs-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Quick turnaround<br />for the expo</h2>
                </div>
                <div class="col-sm-5">
					<h3 style="margin-top:0">THE UNIT</h3>
                  	<p>The HOLO SPARK, our flagship holographic display was used at the Denso’s expo stall to command attention and inform customers about their product offerings.</p>
					<h3>THE STAND</h3>
					<p>Custom product selector (touchscreen interface) to view info about each product, not to mention the custom vinyl wrap on stand with Denso branding.</p>
					<h3>CONTENT</h3>
					<p>Some of Denso’s more popular consumer products such as the radiator, spark plug, direct injection coil, alternator, starter motor, compressor and more were filmed instead of created as 3D models as a more cost-effective solution. For Denso to show their large products in a holographic setting we created a custom designed well-lit 360-degree turntable rig to accommodate the large size of the products. We filmed them on as they spun in front of a green screen and harnessed that footage to create products very similar to that of an animation. This helped us to also fit into the tight production schedule, meaning we delivered a great result with a quick turn-around to get to the AAA expo on time!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate">
        	<img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-02.jpg" class="responsive-img" />
        	<img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-03.gif" class="holo-img" />
        </div> 
        <div class="row mt+2 js-skip animate is-animated">
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-06.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-07.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-08.jpg" class="responsive-img" /> </div>
        </div>       
        <div class="row mt+2 js-skip animate is-animated">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-04.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-05.jpg" class="responsive-img" /> </div>
        </div>
        <div class="row mt+2 js-skip animate is-animated">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-09.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-10.jpg" class="responsive-img" /> </div>
        </div>
        <div class="row mt+2 js-skip animate is-animated">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-11.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/denso-12.jpg" class="responsive-img" /> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-sm-12 col-xs-12">
        <div class="row s-skip animate">
          <div class="col-xs-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row u-text__center">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                  <h2>Client</h2>
                  <ul class="tags-list">
					<li><?php echo $this->items[0]->title; ?></li>
				  </ul>
                  <h2>Services</h2>
                  <?php if( $this->items[0]->service ) : ?>
                  <ul class="tags-list">
                    <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
                    <li><?php echo ProjectHelper::getServiceName( $service ); ?></li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                  <?php /*<div class="pb-"></div>*/ ?>
                  <?php echo ProjectHelper::getShares(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fuild u-padding__0">
    <div class="row u-margin__0 mt+2">
      <?php $i = 0; foreach($prevnext as $item) : ?>
      <div class="col-sm-6 mb+2"> <a class="project project-footer <?php echo ($i == 0 ? 'u-text__right' : ''); ?>" href="<?php echo $item->link; ?>"> 
        <!-- <img src="<?php echo $item->image; ?>" class="responsive-img" /> --> 
        <img src="<?php echo $item->image; ?>" class="responsive-img" />
        <div class="project__caption p2+ u-zIndex__1">
          <h3><?php echo $item->title; ?></h3>
          <?php if( $item->service ) : ?>
          <ul class="tags-list">
            <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
            <li><?php echo ProjectHelper::getServiceName( $service ); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
        </a> </div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</div>
