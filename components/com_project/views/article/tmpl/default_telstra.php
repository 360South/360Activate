<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>


<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/telstra-hero.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">Unlock the door to a world of new opportunities</div>
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
                <p>The very best in networking technology deserves an equally impressive platform to be shared on. To achieve this, Telstra partnered with 360Activate to produce a visually engaging holographic animation to be shown at the 2019 Vantage Expo.</p>
              </div>
            </div>
          </div>
        </div>
		<div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/mfaiuyr5Lng?rel=0" frameborder="0" allowfullscreen></iframe></div> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>A network second <br/>to none</h2>
                </div>
                <div class="col-sm-5">
                  	<p>The holographic animation takes the viewer on a journey from what Telstra’s current network consists of, all the way to their soon-to-be-implemented vision of 5G. Displaying various animated icons and processes, the animation covers a range of services Australians use their Telstra internet for. From analytics and security through to online gaming and robotics, Telstra’s new 5G internet will provide an all new high-speed platform for all Australians to enjoy. With unrivalled speeds and connectivity, Telstra’s new 5G network is second to none.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/telstra-01.jpg" class="responsive-img" /> </div>
                
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/telstra-gif1.gif" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/telstra-gif2.gif" class="responsive-img" /> </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/telstra-02.jpg" class="responsive-img" /> </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/telstra-03.jpg" class="responsive-img" /> </div>

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
