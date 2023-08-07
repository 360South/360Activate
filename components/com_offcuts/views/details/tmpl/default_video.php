<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); $linky = JRoute::_( 'index.php?option=com_requestquote&Itemid=108' ); $video = JRoute::_( 'index.php?option=com_offcuts&Itemid=125' ); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2 pt- pb-">
                    <h2>Lorem ipsum dolor</h2>
            <p>Nothing engages quite like well-produced video content.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Ready to roll</span>
            <h2>Lights, Camera, Action!</h2>
            <p>Whether you are talking about a 30 second clip for your website or broadcast quality recording for TV, when you tell your story through video you’ve got a captive audience.</p>
            <p>Take viewers on an emotional journey - with all the twists, turns and complexities only made possible with the power of moving image.</p>
            <p>With industry-standard equipment and evocative compelling storytelling, we will bring your message to life on screen.</p>
          </div>
        </div>
      </div>    
      <div class="col-md-6 col-xs-12 mt+2">
      	<img src="/images/offcuts/video/video-camera.jpg" class="responsive-img" />
      </div>
      <div class="col-md-12 col-xs-12 mt+2">
      	  <div class="video-container">
      		<iframe width="560" height="315" src="https://www.youtube.com/embed/nEapGSFNj_M?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		  </div>
	  </div>
      
      
      <div class="col-md-6 col-xs-12 mt+2">
        <img src="/images/offcuts/video/video-paul.jpg" class="responsive-img" />
      </div>
      <div class="col-md-6 col-xs-12 mt+2">
        <div class="dt h+100%">
          <div class="postbox p+ bg:gray-3 dtc v-mid"> <span class="topheading">Drone Footage</span>
            <h2>Capturing A New Angle</h2>
            <p>Reaching great heights for our clients, we can fly drones above the interior or exterior of your property to capture your world from an aerial perspective.</p>
            <p>This sensational technology is also available as <a href="<?php echo $video; ?>">photography</a>.</p>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-xs-12 mt+2">
      	  <div class="video-container">
      		<iframe width="560" height="315" src="https://www.youtube.com/embed/_9cKnKuT_ug?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		  </div>
	  </div>
     
     
      <div class="col-md-12">
        <div class="postbox mt+2 p+ u-offset bg:gray-3 u-text__center">
          <div class="fs+2">
            <p>So, if you have the seed of an idea, <a href="<?php echo $linky; ?>">bring it to us and watch it grow.</a></p>
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
