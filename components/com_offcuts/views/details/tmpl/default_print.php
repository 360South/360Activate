<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>At 360South, we understand that print is about more than just graphic design.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">The full offcut</span>
            <h2>Beyond Design</h2>
            <p>Professional in its appearance and produced with the highest quality materials, we want to make sure your print media reflects positively on you and your business.</p>
            <p>That’s why we go beyond just design.</p>
            <p>We oversee the complete production process, we think carefully about the colour, weight and texture of your materials, so we can deliver a final product that feels perfect in your hand.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/print/print1-bcs.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/print/print2-largejobs.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Choose your</span>
            <h2>Quantity, scale, style</h2>
            <p>500 or 5,000 printed flyers? You got it.<br>
                Need a particular paper colour and weight? Just ask.<br>
                Large format printing for signage? Easy.<br>
                Offset printing for high volume commercial quantities? Done.<br>
                Cheap, fast digital printing solutions? We’re your go to.<br>
                Want the fancy business card trimmings like gold foil? We’ll make it happen.</p>
            <p>We offer every print option and can help guide you with our knowledge on what will suit your project needs and suggest print trends. </p>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p>Your print media is how the world sees your business. If you want to make a statement worth remembering, <a href="<?php echo $linky; ?>">talk to us today.</a></p>
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
