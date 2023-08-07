<?php defined('_JEXEC') or die; $prevnext = ProjectHelper::getPrevNext(); ?>


<div class="postheader h+100" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30" style="background-image: url(images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-hero.jpg);"> </div>
  <div class="container">
    <div class="postheader__head is-centered">
      <div class="row">
        <div class="col-md-7">
          <div class="oh"> <span class="topheading intro-title"><?php echo $this->items[0]->title; ?></span> </div>
          <h1>
            <div class="oh">
              <div class="intro-title">Promoting bladder and</div>
            </div>
            <div class="oh">
              <div class="intro-title">bowel health</div>
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
                <li><?php echo ProjectHelper::getServiceName( $service ); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
              <div class="fs+2 pt0 pb+30">
                <p>The Continence Foundation supports those affected by or at risk of bladder and bowel control problems.</p>
              </div>
            </div>
          </div>
        </div>

		    <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> 
          <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Stqm2chw5P4?rel=0" frameborder="0" allowfullscreen></iframe>
          </div> 
        </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-01.jpg" class="responsive-img" /> </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-03.jpg" class="responsive-img" /> </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> 
          <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/6ccJT0_pCRw?rel=0" frameborder="0" allowfullscreen></iframe>
          </div> 
        </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-02.jpg" class="responsive-img" /> </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-04.jpg" class="responsive-img" /> </div>

        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Visualising <br/> what you can’t see</h2>
                </div>
                <div class="col-sm-5">
                  	<p>3D models and animation are powerful tools for helping us to see things we wouldn’t normally be able to see. The inner workings of the human body are the perfect example. By creating a 3D animated video, we are able to teach the 5 million Australians who experience incontinence about the group of muscles known as the pelvic floor, and how exercising these muscles can help treat and even cure incontinence.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-05.jpg" class="responsive-img" /> </div>

        <div class="row mt+2 js-skip animate">
          <div class="col-sm-12">
            <div class="postbox p+ bg:gray-3">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <h2>Animation <br/> aids education</h2>
                </div>
                <div class="col-sm-5">
                    <p>The Continence Foundation supports those affected by or at risk of bladder and bowel control problems. They engaged 360Activate to create two animated videos — one for males and one for females — showing the location of the pelvic floor muscles, and demonstrating strengthening exercises. The visuals and voiceover together teach the viewer how to engage these muscles repeatedly, strengthening them to give more control when laughing, coughing or sneezing. These visual aids assist people to try these exercises themselves and perform them correctly. With the right tools aiding education, the Continence Foundation and 360Activate are able to help improve people’s lives.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt+2 mb+2 bg:gray-3 js-skip animate"> <img src="images/projects/<?php echo ProjectHelper::getTemplate(); ?>/cfa-06.jpg" class="responsive-img" /> </div>


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
                  <h2>Client</h2>
                  <ul class="tags-list">
					<li><?php echo $this->items[0]->title; ?></li>
				  </ul>
                  <h2>Services</h2>
                  <?php if( $this->items[0]->service ) : ?>
                  <ul class="tags-list">
                    <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
                    <li><?php echo ProjectHelper::getServiceName( $service ); ?></li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                  <?php /*<div class="pb-"></div>*/ ?>
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
        <!-- <img src="<?php echo $item->image; ?>" class="responsive-img" /> -->
        <img src="<?php echo $item->image; ?>" class="responsive-img" />
        <div class="project__caption p2+ u-zIndex__1">
          <h3><?php echo $item->title; ?></h3>
          <?php if( $item->service ) : ?>
          <ul class="tags-list">
            <?php foreach( explode( ',', $this->items[0]->service ) as $service ) : ?>
            <li><?php echo ProjectHelper::getServiceName( $service ); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
        </a> </div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</div>
