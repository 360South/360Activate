<?php defined('_JEXEC') or die; ?>
<div class="container-fluid u-padding__0">
  <div class="postbox p+ u-text__center"> <span class="topheading">We love what we do</span>
    <h3>These big-shots love us too!</h3>
    <div class="row u-margin__0 home">
    	<?php $i=1;foreach($images as $image) : ?>
            <div class="col-md-2 col-sm-6 col-xs-6 <?php echo ($i == 1 || $i%6 == 0 ? 'col-md-offset-1' : ''); ?>">
                <div class="p+">
                	<?php /*<img src="<?php echo $image; ?>" class="responsive-img" />*/ ?>
                	<?php echo $image; ?>
                </div>
            </div>
      	<?php $i++;endforeach; ?>
    </div>
  </div>
</div>