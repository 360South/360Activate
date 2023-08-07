<?php

defined('_JEXEC') or die;

$prevnext = BlogHelper::getPrevNext(); ?>

<div class="container">
  <div class="row bg:gray-2">
    <div class="col-md-12">
      <div class="postbox p+ u-offset bg:gray-3">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="fs+2 pt- mb+10">
              <p>Powerful Connections is the series of stories presented by Vodafone that highlight the power of mobile technology in human relationships. We built a responsive platform that presents these stories in a sexy way.</p>
            </div>
            <?php echo $this->items[0]->body; ?> </div>
        </div>
      </div>
      <div class="mt+2 mb+2 bg:gray-3"> <img src="http://www.basicagency.com/sites/default/files/styles/wide_image/public/general/omma_awards_bb_dakota.jpg?itok=E307aumh" class="responsive-img" /> </div>
      <div class="postbox p+ u-offset bg:gray-3">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <p>Earlier this year, we partnered with women’s fashion brand, BB Dakota, to help them better tell their story through a new flagship eCommerce experience that was focused on bringing content and commerce together. We helped elevate their brand to the digital space by providing creative direction, art direction and photography and video direction. The new BB Dakota eCommerce platform streamlines the purchase decision process by providing the user with a highly contextualized shopping experience from beginning to end. The site delivers a rich, immersive experience through big imagery, high-quality branded video content, and deeper brand storytelling through collection pages and an online journal. All created on a custom-built Wordpress CMS.</p>
            <p>Earlier this year, we partnered with women’s fashion brand, BB Dakota, to help them better tell their story through a new flagship eCommerce experience that was focused on bringing content and commerce together. We helped elevate their brand to the digital space by providing creative direction, art direction and photography and video direction. The new BB Dakota eCommerce platform streamlines the purchase decision process by providing the user with a highly contextualized shopping experience from beginning to end. The site delivers a rich, immersive experience through big imagery, high-quality branded video content, and deeper brand storytelling through collection pages and an online journal. All created on a custom-built Wordpress CMS.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid u-padding__0">
  <div class="row u-margin__0 mt+2">
    <?php $i = 0; foreach($prevnext as $item) : ?>
    <div class="col-sm-6 mb+2"> <a class="project project-footer <?php echo ($i == 0 ? 'u-text__right' : ''); ?>" href="<?php echo $item->link; ?>"> <img src="<?php echo $item->image; ?>" class="responsive-img" />
      <div class="project__caption p2+ u-zIndex__1"> <span class="topheading">Blog
        <date> / <?php echo date("d.m.Y", strtotime($item->date)); ?></date>
        </span>
        <h3><?php echo $item->title; ?></h3>
        <i class="fa <?php echo ($i == 1 ? 'fa-arrow-right' : 'fa-arrow-left link__right'); ?>"></i> </div>
      </a> </div>
    <?php $i++; endforeach; ?>
  </div>
</div>