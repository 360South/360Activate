<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>


<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nab-hero.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">A World First in Banking</div>
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
                <p>NAB approached 360Activate wanting to demystify credit card offers and rewards programs for their customers. So our animation and holographics teams created a solution to really pack some punch.</p>
              </div>
            </div>
          </div>
        </div>
		    <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/tB90puc2zHs" frameborder="0" allowfullscreen></iframe></div> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Making<br/> Credit Cards<br /> Captivating</h2>
                </div>
                <div class="col-sm-5">
                  	<p>Let’s be honest: credit cards and rewards programs are not exactly the stuff of binge-watching. So how do you draw a crowd eager to talk banking? With an interactive information kiosk featuring a holographic display and touchscreen! Never seen before in the banking sector, this stand enables the customer to scroll through available offers and leave their details to be contacted later for more information.</p>

					          <p>The smart system is able to gauge which information or products are most important to the customer, compare campaign total interactions to previous campaign data and send gathered data to the NAB team.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nab-01.png" class="responsive-img" /> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/bose.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/switch.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/watch.jpg" class="responsive-img" /> </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nab-02.png" class="responsive-img" /> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/bans.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/toaster.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/weber.jpg" class="responsive-img" /> </div>
        </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nab-03.png" class="responsive-img" /> </div>


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
