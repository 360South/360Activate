<?php defined('_JEXEC') or die; $prevnext = OffcutsHelper::getPrevNext(); ?>



<div id="content">

  <div class="container">

    <div class="row bg:gray-2">

      <div class="col-md-12">

        <div class="postbox p+ u-offset bg:gray-3">

          <div class="row">

            <div class="col-sm-10 col-sm-offset-1"> <?php echo $this->items[0]->body; ?> </div>

          </div>

        </div>

      </div>

    </div>

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

