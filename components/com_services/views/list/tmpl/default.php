<?php defined('_JEXEC') or die; $Itemid = JRequest::getVar('Itemid'); ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-sm-12">
        <div class="postbox p+ mb+2 u-offset bg:gray-3">
          <div class="u-text__center">
            <span class="topheading">Solutions</span>
            <h2>Marketing Becomes Reality</h2>
			<p>Let your customers step into your products and become immersed in your brand.</p>
			<p>Launches, trade shows, expos and retail spaces can now come to life.</p>
          </div>
        </div>
        <div class="row">
          <?php foreach($this->items as $item) : ?>
          <?php $linky = ServicesHelper::getLinky($item->title); ?>
         	
         	 <div class="col-xs-12 col-sm-6 col-md-6 project-item-all">
      				<a class="project mt+2" href="<?php echo $linky; ?>">
      				<img src="/images/<?php echo JFilterOutput::stringURLSafe($item->title); ?>-banner.jpg" class="responsive-img" />
      				<img src="/images/icons/<?php echo JFilterOutput::stringURLSafe($item->title); ?>.svg" height="62" alt="<?php echo $item->title; ?>" class="icon" />
      				<div class="project__caption p1+ u-zIndex__1">
      					<?php if ($item->title == 'Animation & Special FX') : ?>
      					 <h3>Animation<br />& Special FX</h3>
      					<?php else : ?>
      					 <h3><?php echo str_replace(' ','<br />',$item->title); ?></h3>
      					<?php endif; ?>
      					<i class="fa fa-arrow-right"></i>
      				</div>
      				</a>
      			</div> 
			
         
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

