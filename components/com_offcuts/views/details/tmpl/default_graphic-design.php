<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Great graphic design immediately captures your audience’s attention and draws them in.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Let’s Get</span>
            <h2>Personal</h2>
            <p>At 360South we work hard to understand your brand and what it represents. We take this information and convert it into targeted custom solutions to help boost your business.</p>
            <p>We create smart design solutions that will reflect the personality of your brand and leave a lasting impression on your customers.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <img src="/images/offcuts/graphic-design/graph-des1.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <img src="/images/offcuts/graphic-design/graph-des2.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">From The Ground Up</span>
            <h2>Brand Creation</h2>
            <p>Starting from the ground up? We love that! </p>
            <!-- <p>We’re proud to have been part of many humble beginnings that have expanded to create great names for themselves. If you’ve got a great idea we can help you right from the start.</p> -->
            <p>We love to see the sparkle of an idea in a clients eye when they come in for their first meeting. To then help that person build bring that brand to life from the ground up is one of the greatest joys. The triumph is knowing you’ve guided a brand grow from a seedling to a successful fruit tree.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Not just logos</span>
            <h2>We Design It All</h2>
            <p>Our range of abilities and disciplines is so extensive you’ve got to dig deep to find something we can’t do. From business cards to billboards, we can design it all and we do it better than anyone else.</p>
            <ul class="inline-list">
                <li>Branding</li>
                <li>Business cards</li>
                <li>Brochures</li>
                <li>Flyers</li>
                <li>Publication</li> 
                <li>Signage</li>
                <li>Bollards</li>
                <li>Flags</li>
                <li>Posters</li>
                <li>Stationary</li>
                <li>Point of Sale</li>
                <li>Illustrations</li>
            </ul>
            <p>Not to mention we’ll handle all the printing too, no need to lift a finger!</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/graphic-design/graph-des3.jpg" class="responsive-img" />
      </div>
      <div class="col-xs-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p>If you’ve got a great brief, we want to be a part of it. <a href="<?php echo $linky; ?>">Let’s create something epic.</a></p>
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
