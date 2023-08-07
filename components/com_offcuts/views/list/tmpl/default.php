<?php defined('_JEXEC') or die; $Itemid = JRequest::getVar('Itemid'); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-sm-12">
        <div class="postbox p+ mb+2 u-offset bg:gray-3">
          <div class="u-text__center">
            <span class="topheading">INSPIRATION</span>
            <h2>A CONCEPT HERE, A RENDER THERE</h2>
            <p>Content doesn’t always make it out to the world, but that doesn’t mean we aren’t just as proud of it!</p>
            <p>These are some of the snippets from our favourite concepts, proposals and everything in between.</p>
          </div>
        </div>
        <div class="row project">
          <?php foreach($this->items as $item) : ?>
            <?php if ($item->image2 && $item->image2):?>
           	  <div class="col-xs-12 col-sm-6 col-md-6 project-item-all project-item-left">
                <img src="<?php echo $item->image2; ?>"  alt="<?php echo $item->title; ?>" />
                <div class="project__caption p1+ u-zIndex__1">
                  <?php if ($item->intro) : ?>
                   <h3><?php echo str_replace(' ','<br />',$item->intro); ?></h3>
                  <?php endif; ?>
                  
                </div>
              </div> 
              <div class="col-xs-12 col-sm-6 col-md-6 project-item-all project-item-right">
                <img src="<?php echo $item->image3; ?>"  alt="<?php echo $item->title; ?>" />
                <div class="project__caption p1+ u-zIndex__1">
                  <?php if ($item->intro) : ?>
                   <h3><?php echo str_replace(' ','<br />',$item->intro); ?></h3>
                  <?php endif; ?>
                  
                </div>
              </div>
            <?php else:?>
              <div class="col-xs-12 project-item-all">
                <img src="<?php echo $item->image1; ?>"  alt="<?php echo $item->title; ?>" />
                <div class="project__caption p1+ u-zIndex__1">
                  <?php if ($item->intro) : ?>
                   <h3><?php echo str_replace(' ','<br />',$item->intro); ?></h3>
                  <?php endif; ?>
                  
                </div>
              </div> 
            <?php endif;?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

