<?php defined('_JEXEC') or die; $prevnext = ServicesHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-xs-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>We make magic in 360°</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Giving you</span>
            <h2>The Full picture</h2>
            <p>360 Virtual Tours are interactive and immersive, allowing viewers to become deeply involved in the image.</p>
            <p>Delve into something a bit different and put a spin on things (literally). Glide effortlessly in a 360-degree scope around any space of your choosing, incorporate floorplans, interactive maps, hotspots, sound and even video.</p>
            <p>With the advancements of devices such as tablets and smartphones, interactive media is becoming an expected entity in modern websites.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <img src="/images/services/virtual-tours/virtualtours-map.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <img src="/images/services/virtual-tours/virtualtours-interface.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Hotspots, Maps & </span>
            <h2>Interface Design</h2>
            <p>Now that we’ve created your virtual tours you’ll need an awesome way of travelling from one VT to another, we’ll design the user interface around your brand, including: hotspots, buttons, maps and more. </p>
            <p>When that’s looking awesome, we can implement the VT into your website, allowing users great access to view your epic space.</p>
          </div>
        </div>
      </div>
      <div class="col-xs-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p>Got a location you want to share with the world? We’ll give you the tools to inform your customers about you in an engaging and stimulating way. <a href="<?php echo $linky; ?>">Tell us about your brief today</a>.</p>
            <p>For more on our amazing virtual tours go to our 360VT Website Now!</p>
          </div>
          <p><a href="http://virtual-tours.com.au/" target="_blank" class="btn btn:yellow hover/btn:yellow"><span><strong>360VT Website</strong></span></a></p>
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
