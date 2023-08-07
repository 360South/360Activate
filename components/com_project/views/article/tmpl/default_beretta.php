<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>


<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-01.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">Second to None</div>
            </div>
            <div class="oh">
              <div class="intro-title"></div>
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
                <p>Heads turned and huge crowds formed at the Beretta stand at their two recent exhibitions.</p>
              </div>
            </div>
          </div>
        </div>
		<div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/2zOBu_Wb7lU" frameborder="0" allowfullscreen></iframe></div> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Beretta went <br />in guns blazing</h2>
                </div>
                <div class="col-sm-5">
                  	<p>At two expos in Sydney and Melbourne there was a buzz of excitement surrounding the Beretta brand.</p>
 
                    <p>Two holographic displays – the SPARK and the BLAZE were the centre of attention, drawing crowds with our incredible animation, exciting sound effects and custom designed stands.</p>
 
                    <p>The large BLAZE unit promoted the Tikka T3x Rifle series, the animation depicted the exploded gun to reveal its individual features and functions. The stand had an actual T3x rifle displayed behind a viewing window allowing a deeper connection between product and story.</p>
 
                    <p>The smaller SPARK unit exhibited a rotation of lifestyle animations, representing the multiple gun brands that Beretta were promoting, each with their own unique elegance, fashioned by sounds effects and visual styles. We integrated a custom touchscreen competition registration system into the stand, allowing customers to be lured in by the display and then won over by the opportunity to win a prize, creating a win-win situation where Beretta was able to harness this data and information for future sales.</p>
 
                    <p><strong>AFTER THE SHOW</strong></p>
                    <p>Beretta has purchased both units and have gone on to display them in their prestige showroom, where the they continue to impress customers and influence sales daily.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-03.jpg" class="responsive-img" /> </div>
                
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-04.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-05.jpg" class="responsive-img" /> </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> 
          <video preload="auto" autoplay="" loop="" muted="" volume="0" poster="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-05.jpg" width="100%" height="100%">
          <source src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-06.mp4" type="video/mp4">
  
          Your browser does not support the video tag.
          </video>
        </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-09.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-08.jpg" class="responsive-img" /> </div>
        </div>
        
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/ber-07.jpg" class="responsive-img" /> </div>

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
                  <?php echo ProjectHelper::getShares(); ?> </div>
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
