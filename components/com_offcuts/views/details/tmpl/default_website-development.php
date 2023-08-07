<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>360South proudly state that we never outsource and we don’t use templates.<br> Everything we develop is from scratch and is 100% done in-house.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Website functionality</span>
            <h2>Cracking the Code</h2>
            <p>Maybe you have a website design that needs our talented team of coders to work their magic on. Or you are looking for the complete web design and development package.</p>
            <p>Either way you’ve come to the right place. Flawless functionality is key to a great website, and we know exactly how to achieve this.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<div class="image_wrapper"> <div class="img" style="background-image:url(/images/headers/who7-360south.jpg);"></div> </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/WebDevelopment.gif" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">User Experience</span>
            <h2>The correct response </h2>
            <p>We’ll convert your static website design into a dynamic online presence that will leave your competitors green with envy.</p>
            <p>As experts in responsive website design, irrespective of whether it’s being viewed on desktop, smartphone or tablet, we’ll prioritise your content for the best possible experience.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Having a word</span>
            <h2>With the management </h2>
            <p>More often than not our clients want to update their own website content. We develop a flexible and easy to use open source CMS (Content Management System) to provide a hassle-free way to make this happen.</p>
            <p>We recommend WordPress for its ease of use and customisation, Joomla for websites with involved functionality and intensive role management requirements, and OpenCart for e-commerce sites.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/Logos.gif" class="responsive-img" />
      </div>
      
      
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/rms.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Bookings made easy to</span>
            <h2>Accommodate your customers</h2>
            <p>We’ve mastered the RMS Cloud so that you have access to brilliant booking engine at your fingertips. If you’re in the hospitality/accommodation industry this beauty could be perfect for your business. A fully integrated, responsive, highly intelligent booking system that will help you create a smooth experience for your customers. Ask us more about how this clever API could work for you.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
            <p><a href="<?php echo $linky; ?>">Get in touch</a> today and let's develop a working relationship.</p>
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
