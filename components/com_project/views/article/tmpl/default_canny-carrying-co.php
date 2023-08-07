<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>

<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/hero.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">Bringing art to the people.</div>
            </div>
            <div class="oh">
              <div class="intro-title"></div>
            </div>
          </h1>
          <div class="oh tb">
            <div class="intro-line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="content">
    <div class="container">
        <div class="row bg:gray-2">
            <div class="col-sm-12">
                <div class="postbox p+ u-offset bg:gray-3">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 u-text__center">
                            <?php if( $this->items[0]->service ) : ?>
                            <ul class="tags-list">
                                <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
                                <li><a href="<?php echo ProjectHelper::getServiceLink( $service ); ?>"><?php echo ProjectHelper::getServiceName( $service ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                            <div class="fs+2 pt- pb-">
                                <p>With over 100 years in the business Canny Carrying Com know how to get things from A to B. What they didn’t know was how to upgrade their online presence and demonstrate to the world that the although they started with only two horse drawn carriages, five generations of family have built them up to become a leader in logistics.</p>
                            </div>
                            <?php if($this->items[0]->website) : ?><p><a href="<?php echo $this->items[0]->website; ?>" target="_blank" class="btn btn:yellow hover/btn:yellow">View Website</a></p><?php endif; ?>
                        </div>
                    </div>
                </div>
<!--                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/xk_7p9XJSFA?rel=0" frameborder="0" allowfullscreen></iframe></div> </div>-->

                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-1.gif" class="responsive-img" /> </div>
                <div class="row mt+2 js-skip animate">
                    <div class="col-sm-12">
                        <div class="postbox p+ bg:gray-3">
                            <div class="row">
                                <div class="col-sm-5 col-sm-offset-1">
                                  <h2>Creating the perfect logo</h2>
                                </div>
                                <div class="col-sm-5">
                                  <p>The Canny Carrying Co logo was in need of a refresh to represent the more modern methods of logistics used in this day and age. Using the multiple C’s in the name and giving a more modern shape that provides a viewer suggestions of a variety of road related features including stop signs, wheel nuts and road markings. Completing the logo shape with a green section further enhances the symbology of roads whilst displaying a forward moving arrow, a perfect representation for logisitics.</p>
                                  <p>To really benefit from the refresh of the website Canny Carrying Co needed to revisit the methods in which people are able to interact with them online. Retaining their online portal but making it more prominent and easily found, as well as dressing it in the new styling allows people to easily engage with trust.</p>
                                  <p>Continuing the symbolic nature of the logo 360South developers added animation to provide interest and engagement whilst further demonstrating the forward momentum of Canny Carrying Co. Creating an clean template with consistent colouring makes it easy to expand the website as needed either within the customised content management system (CMS) or through the integration of third party products. Either way this web site has the ability to stay the course and expand just like Canny Carrying Co does!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-2.jpg" class="responsive-img" /> </div>

                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-3.jpg" class="responsive-img" /> </div>

                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-4.jpg" class="responsive-img" /> </div>

                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-5.jpg" class="responsive-img" /> </div>
              
                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-6.jpg" class="responsive-img" /> </div>
                <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-7.jpg" class="responsive-img" /> </div>
                            
                <div class="row mt+2 js-skip animate">
                  <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-8.jpg" class="responsive-img" /> </div>
                  <div class="col-xs-12 col-sm-6"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/canny-9.jpg" class="responsive-img" /> </div>
                </div>
              
                </div>
            </div>
        </div>

    </div>
    <div class="container">
    <div class="row bg:gray-2">
      <div class="col-sm-12 col-xs-12">
        <div class="row s-skip animate">
          <div class="col-xs-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row u-text__center">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                  <h4>Client</h4>
                  <span class="topheading pb-"><?php echo $this->items[0]->title; ?></span>
                  <h4>Services</h4>
                  <?php if( $this->items[0]->service ) : ?>
                  <ul class="tags-list">
                    <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
                    <li><a href="<?php echo ProjectHelper::getServiceLink( $service ); ?>"><?php echo ProjectHelper::getServiceName( $service ); ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                  <div class="pb-"></div>
                  <?php echo ProjectHelper::getShares(); ?> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fuild u-padding__0">
    <div class="row u-margin__0 mt+2">
      <?php $i = 0; foreach($prevnext as $item) : ?>
      <div class="col-sm-6 mb+2"> <a class="project project-footer <?php echo ($i == 0 ? 'u-text__right' : ''); ?>" href="<?php echo $item->link; ?>"> 
        <img src="<?php echo $item->image; ?>" class="responsive-img" alt="Canny Carrying Co" />
        <div class="project__caption p2+ u-zIndex__1">
          <h3><?php echo $item->title; ?></h3>
          <?php if( $item->service ) : ?>
          <ul class="tags-list">
            <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
            <li><a href="<?php echo ProjectHelper::getServiceLink( $service ); ?>"><?php echo ProjectHelper::getServiceName( $service ); ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
        </a> </div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</div>
