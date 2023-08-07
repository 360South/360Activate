<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>

<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-01.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">Animating the</div>
            </div>
            <div class="oh">
              <div class="intro-title">elements</div>
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
                <p>To introduce the Nikon Key Mission 360 Camera and its all-weather features, 360Activate generated an animated hologram that emphasised the camera's water and shock-proofing along with its 360 degree capabilities.</p>
              </div>
            </div>
          </div>
        </div>
		<div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/AKG05tqSMk4" frameborder="0" allowfullscreen></iframe></div> </div>
        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12 col-xs-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Realism with<br />a twist</h2>
                </div>
                <div class="col-sm-5">
                  	<p>A holographic display was the ideal medium to celebrate the camera’s features allowing the depiction of realistic elements such as rain and lightning in a confined area. For an added level of depth we structured a grass hill into the interior adding vibrancy and feeling of outdoor adventure.</p>
					<p>The Key Mission 360 Camera was created as a detailed 3D model and was prominently displayed in one of Melbourne’s leading camera stores during the product launch. It received a myriad of positive attention from customers and sparked great curiosity in their product.</p>
					<h4 style="margin-top:30px">Props</h4>
					<p>Physical props in our machines add an extra level of depth, but you don’t have to go overboard. For Nikon’s camera, we structured a grass hill into the interior, it added a splash of vibrancy and carried the theme of outdoorsy adventure through all aspects of the brief.</p>
					<h4 style="margin-top:30px">3D Modelling</h4>
					<p>Want to incorporate a 3D model of your product into our displays? Look no further, our animation team can create highly detailed 3D renders and that’s exactly what they did to create the Key Mission 360 Camera model.</p>
					<h4 style="margin-top:30px">Product Launch</h4>
					<p>Our unit was prominently displayed in one of Melbourne’s leading camera stores during the Nikon Key Mission 360 product launch. It received a myriad of positive attention from customers and sparked great curiosity in their product.</p>
					<p>See our video above to look at what how we conquered the elements.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt+2 js-skip animate is-animated">
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-03.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-04.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-4"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-05.jpg" class="responsive-img" /> </div>
        </div>
        <div class="mt+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-06.jpg" class="responsive-img" /> </div>
        
        <div class="row mt+2 js-skip animate is-animated">
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-07.jpg" class="responsive-img" /> </div>
          <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/nikon-02.jpg" class="responsive-img" /> </div>
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
