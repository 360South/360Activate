<?php defined('_JEXEC') or die; ?>

<div class="row u-display__flex">
  <div class="col-sm-12 u-padding__0"> <a class="project project-footer" href="<?php echo $list['link']; ?>" style="background-image: url('<?php echo $list['image']; ?>')"> <img src="<?php echo $list['image']; ?>" class="responsive-img opacity:0" />
    <div class="project__caption p2+ u-zIndex__1">
      <h3><?php echo $list['title']; ?></h3>
      <?php if(empty($list['tags'])) { ?>
	      <p><?php echo $list['text']; ?></p>
      <?php } else { ?>
      <ul class="tags-list">
        <?php foreach($list['tags'] as $tag) : ?>
    	    <li><?php echo ModRandomHelper::getServiceName($tag); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php } ?>
      <i class="fa fa-arrow-right link__left"></i> </div>
    </a> </div>
</div>
