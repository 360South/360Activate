<?php
defined('_JEXEC') or die;

require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JUri::base();
?>

<div class="container-fluid home u-padding__0">
  <div class="postbox p+ u-text__center"> <span class="topheading">We love what we do</span>
    <h3>These big-shots love us too!</h3>
    <div class="row u-margin__0">
    	<?php $i=1;foreach($list as $item) : $filename = JFilterOutput::stringURLSafe($item->name); ?>
			<?php if( is_file( JPATH_ROOT . '/images/logos/' . $filename . '.svg' ) ) : ?>
                <div class="col-md-2 col-sm-6 col-xs-12 <?php echo ($i == 1 || $i%6 == 0 ? 'col-md-offset-1' : ''); ?>">
                	<div class="p+"><img src="<?php echo '/images/logos/' . $filename; ?>.svg" class="responsive-img" /></div>
                </div>
            <?php endif; ?>
      	<?php $i++;endforeach; ?>
    </div>
  </div>
</div>