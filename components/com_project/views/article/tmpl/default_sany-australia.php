<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>


<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/hero_optimised.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">RACING AHEAD</div>
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
                <p>Sany Australia tasked us with increasing their brand awareness within Australia. After researching their typical customer demographic, we recommended an extensive promotional push in conjunction with the nations favourite place to punt... racing.com</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>DIGGING YOU OUT<br>OF A HOLE</h2>
                </div>
                <div class="col-sm-5">
                    <p>Every Thursday Racing.com run a segment where the team try and find the viewers an edge by assessing the form for the weekend races around the country, as part of our broadcast package we were able to brand this segment the ‘Dig You Out Stakes’. Part of the promotion was to create an eye-catching animation to lead into the programme and 360Activate showed once again they are ahead of the field.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/m2Ed2EEl_b0?rel=0" frameborder="0" allowfullscreen></iframe></div> </div>
<!--
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Never run out of <br/>battery again</h2>
                </div>
                <div class="col-sm-5">
                  	<p>Out and about with no battery? Forgot to bring your cable? AirCharge has got you covered. Place your device on any wireless charging pad and top up instantly. Wherever you are, stay charged for longer with the AirCharge app. With it comes access the global map of all the charging locations as well as the most extensive wireless marketing network available. Each charging point gives you access to local advertising, menus and information that’s growing every day so you can always stay informed.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/aircharge-01.jpg" class="responsive-img" /> </div>
-->                
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/dyo1.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/dyo2.jpg" class="responsive-img" /> </div>
        </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/dyo3.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/dyo4.jpg" class="responsive-img" /> </div>
        </div>
        
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/digout_optimised.jpg" class="responsive-img" /> </div>

        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>WINNING BIG, VERY BIG!</h2>
                </div>
                <div class="col-sm-5">
                    <p>In racing parlance, they say, ‘go big, or go home’ and the competition that we organised with Sany and Racing.com certainly fit that criteria – prizes do not come much bigger than a 1.6 tonne excavator worth over $27,000! Over 10,000 entries to the competition shows that when it comes to creating brand awareness, we are right on the money.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/HcO2v1xBigo?rel=0" frameborder="0" allowfullscreen></iframe></div> </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/competition_optimised.jpg" class="responsive-img" /> </div>

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
