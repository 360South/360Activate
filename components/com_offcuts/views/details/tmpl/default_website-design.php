<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Specialists in spectacular website design for progressive and ambitious businesses, our team of sharp-eyed designers and developers will provide you with a website you'll be proud of.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Your website </span>
            <h2>Designed for success </h2>
            <p>We develop websites from the ground up, so that they are laser focused to achieve your business goals. We understand the need to stop visitors in their tracks and to deliver information immediately, clearly and consistently.</p>
            <p>You can rest in safe hands knowing we will search for the best strategy for your custom user interface.</p>
            <p>Ever heard of UX and UI? They are the two key components in ensuring your users have an effortless experience when navigating through your website.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/WebDesign.gif" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/headers/who-360south.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Targeted functions</span>
            <h2>Working for You </h2>
            <p>Every website we design both looks awesome and has strategically planned functionality.</p>
			<p>Your website is your most loyal employee. It is out there promoting you 24/7 and is ready to take enquiries any time of day or night.</p>
			<p>We’ll make sure your #1 sales tool is dressed to impress.</p>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p>So, if you’re ready for a website design that goes beyond fancy bells and whistles,<br> <a href="<?php echo $linky; ?>">we want to work with you.</a></p>
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
