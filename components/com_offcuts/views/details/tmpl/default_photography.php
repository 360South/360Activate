<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_offcuts&Itemid=129' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Truly great photography tells its audience much more than just what’s contained within the frame.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-8 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Find your</span>
            <h2>Unique angle</h2>
            <p>Whether we are taking product shots at our in-house Melbourne studio, or portraying you in your own environment, our professional photographers know how to find the right angles to position your business in the best light.</p>
            <p>We don’t just point and shoot. Our photographers see the world in a different way. They create real connections with the spaces, people and objects they shoot.</p> 
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-4 mt+2">
        <div class="image_wrapper">
          <div class="img" style="background-image:url(/images/offcuts/photography/photo-fitmother-03.jpg);"></div>
        </div>
      </div>
      <div class="col-md-6 col-sm-4 mt+2">
        <div class="image_wrapper">
          <div class="img" style="background-image:url(/images/offcuts/photography/photo-drone-02.jpg);"></div>
        </div>
      </div>
      <div class="col-md-6 col-sm-8 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Drone Photography</span>
            <h2>A New Perspective</h2>
            <p>360South offers an exciting new angle for your business. Drone photography allows us to create an aerial view of your landscape, showroom, construction site and more.</p>
            <p>3D terrain mapping via our drone work allows us to create virtual fly-throughs and can be useful for 3D animation of this unique perspective.</p>
            <p>This sensational technology is also available for <a href="<?php echo $linky; ?>">video</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row u-margin__0 bg:gray-2">
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-architecture" href="#"> <img src="/images/offcuts/photography/architecture/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Architecture</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-camping" href="#"> <img src="/images/offcuts/photography/camping/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Camping</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-commercial" href="#"> <img src="/images/offcuts/photography/commercial/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Commercial</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-fashion" href="#"> <img src="/images/offcuts/photography/fashion-and-retail/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Fashion & Retail</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-health" href="#"> <img src="/images/offcuts/photography/health-and-lifestyle/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Health & Lifestyle</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-industrial" href="#"> <img src="/images/offcuts/photography/industrial/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Industrial</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-learning" href="#"> <img src="/images/offcuts/photography/learning-and-edu/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Learning & Edu</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-portrait" href="#"> <img src="/images/offcuts/photography/portrait/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Portrait</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-4 js-skip animate"> <a class="project mt+2 no-link js-product" href="#"> <img src="/images/offcuts/photography/product/thumb.jpg" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3>Product</h3>
        <i class="fa fa-arrow-right"></i> </div>
      </a> </div>
  </div>
  <div class="row u-margin__0 mt+2">
    <?php $i = 0; foreach($prevnext as $item) : ?>
    <div class="col-sm-6 mb+2"> <a class="project project-footer <?php echo ($i == 0 ? 'u-text__right' : ''); ?>" href="<?php echo $item->link; ?>"> <img src="<?php echo $item->image; ?>" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1">
        <h3><?php echo $item->title; ?></h3>
        <p><?php echo $item->intro; ?></p>
        <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
      </a> </div>
    <?php $i++; endforeach; ?>
  </div>
</div>
