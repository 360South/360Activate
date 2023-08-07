<?php defined('_JEXEC') or die; $prevnext = ServicesHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Here at 360South we build high end websites that look great, but there’s no point having a great website if no one is looking at it.</p>
            <p>So let's make sure your new website is being seen by the right audience.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">What your business needs</span>
            <h2>Custom Solutions</h2>
            <p>We create custom tailored solutions dependent on your unique situation. Whether you're targeting your local area or you're taking things global, we're your strategic partner on a journey to dominating your space.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/services/SEO.gif" class="responsive-img" /> </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/services/digital-marketing/digi-marketing-01.jpg" class="responsive-img" /> </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Targeting</span>
            <h2>Local Communities</h2>
            <p>For local clients our local SEO & PPC campaigns deliver a huge return on investment and is all the marketing that many businesses need.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Targeting</span>
            <h2>Gobal Communities</h2>
            <p>While for more advanced campaigns we interweave strategies like SEO, Content Marketing, PPC, Digital PR and email marketing into one fluent 'system' that is constantly bringing in new leads and sales.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2"> <img src="/images/services/digital-marketing/digi-marketing-02.jpg" class="responsive-img" /> </div>
      </div>
      <div class="col-md-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p>If you're looking for a results based marketing campaign that tracks the impact on your business, not just meaningless metrics, then <a href="<?php echo $linky; ?>">contact us</a> for a free strategy consult.</p>
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
