<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Do you want SEO friendly copy that your customers and Google will both love?</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Looking for</span>
            <h2>The Right Words?</h2>
            <p>Everyone thinks they can right, write? Wrong!</p>
            <p>There’s an enormous difference between being able to string a coherent sentence together and being able to create captivating, enthralling, stimulating copy that truly sells your business or offcuts.</p>
            <p>360South offers in-house copywriting that will help get your website to the top of the search engine rankings fast.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <img src="/images/offcuts/copywriting/copywriting-01.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/copywriting/copywriting-02.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Blah <small>blah <small>blah <small>blah</small></small></small></span>
            <h2>Sometimes Less is more</h2>
            <p>Nobody enjoys wading through endless pages of unorganised content to find what they are looking for, we ensure your message is strategically delivered, and received loud and clear by the customer without the unnecessary fluff.</p>
            <p>Working together we’ll determine your core ethos, filter out the noise, and help you tell your story.</p>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p><a href="<?php echo $linky; ?>">Communiqué with us today</a> for a deluge of inventive,<br> phenomenal, stupefying, pulchritudinous stuff!</p>
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
