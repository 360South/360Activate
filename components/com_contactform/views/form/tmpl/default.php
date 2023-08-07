<?php
defined('_JEXEC') or die;

$servicesLinky  = JRoute::_( 'index.php?option=com_services&Itemid=104' );
$careersLinky   = JRoute::_( 'index.php?option=com_careers&Itemid=137' );
$profilesLinky  = JRoute::_( 'index.php?option=com_profiles&Itemid=134' );
$images         = ContactformHelper::getImages();
$images 		= array_slice($images,0,8);
?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-6 col-sm-8 u-offset">
        <div class="u-display__flex">
          <div class="postbox p+ bg:gray-3"> <span class="topheading">About the company</span>
            <h2>Who are 360Activate?</h2>
            <p>We’re 360Activate. A Melbourne-based digital marketing solutions team with our finger in the pie of every new tech on the block. Holographics, Augmented Reality, Virtual Reality, 3D animation and more. We can cater to your timeframe and budget for expos, retail outlets, education institutes and more. Delivery the wow factor every single time with our fully supplied marketing solutions. We provide the concept, the content, the hardware and the manpower. Our experienced team produce seriously good results, without ever taking ourselves too seriously.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-4 u-offset">
        <div class="image_wrapper"> <div class="img" style="background-image:url(/images/headers/360activate-aboutus-01.jpg);"></div> </div>
      </div>
      <?php /*<div class="col-md-6 col-sm-4 mt+2 animate js-skip">
        <div class="image_wrapper"> <div class="img" style="background-image:url(/images/headers/who7-360south.jpg);"></div> </div>
      </div>
      <div class="col-md-6 col-sm-8 mt+2 animate js-skip">
        <div class="u-display__flex">
          <a class="postbox p+ bg:gray-3 hover/bg:gray-2" href="<?php echo $careersLinky; ?>"> <span class="topheading">Join the team</span>
            <h2>Now Hiring!</h2>
            <p>We are seeking a full-time PHP web developer with ecommerce experience to work in our Southbank studio on customised web and ecommerce solutions.</p>
            <p><i class="fa fa-arrow-right"></i></p>
          </a>
        </div>
      </div>*/ ?>
      <div class="col-md-6 col-sm-4 mt+2 animate js-skip">
        <div class="image_wrapper"> <div class="img" style="background-image:url(/images/headers/360activate-aboutus-02.jpg);"></div> </div>
      </div>
      <div class="col-md-6 col-sm-8 mt+2 animate js-skip">
        <div class="u-display__flex">
          <a class="postbox p+ bg:gray-3 hover/bg:gray-2" href="<?php echo $profilesLinky; ?>"> <span class="topheading">The People</span>
            <h2>Meet the 360crew</h2>
            <p>We’re often asked how we are able to deliver all our services to the highest standard, it’s because we’ve got the right people to make it happen.</p>
            <p>Our outstanding team is the reason we’re so successful. We work hard, we play hard, and we know exactly what we’re talking about.</p>
            <p><i class="fa fa-arrow-right"></i></p>
          </a>
        </div>
      </div>
      <div class="col-sm-12 bg:gray-2 animate js-skip">
        <div class="row u-text__center">
          <div class="col-sm-12 col-xs-12 mt+2">
            <div class="postbox p+ bg:gray-3"> <span class="topheading">We love what we do</span>
              <h2>These big-shots love us too!</h2>
            </div>
          </div>
          <?php foreach($images as $image) : ?>
          <div class="col-md-3 col-sm-4 col-xs-6 mt+2">
            <div class="p+ bg:gray-3 hover/bg:gray-2">
            	<?php /*<img src="<?php echo $image; ?>" class="responsive-img" />*/ ?>
            	<?php echo $image; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="row u-margin__0 animate js-skip mt+2">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-xs-6"> <img class="responsive-img" src="images/headers/squares/squares6.jpg" /> </div>
            <div class="col-xs-6"> <img class="responsive-img" src="images/headers/squares/squares4.jpg" /> </div>
            <div class="col-sm-12 col-xs-12 mt+2"> <img class="responsive-img" src="images/headers/squares/squares1.jpg" /> </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12 col-xs-12 mt+2"> <img class="responsive-img" src="images/headers/squares/squares2.jpg" /> </div>
            <div class="col-xs-6"> <img class="responsive-img" src="images/headers/squares/squares5.jpg" /> </div>
            <div class="col-xs-6"> <img class="responsive-img" src="images/headers/squares/squares3.jpg" /> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
