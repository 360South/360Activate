<?php defined('_JEXEC') or die; ?>
<?php if($option != 'com_project' || $view != 'article') : ?>
<style>
.postheader__background .img { background-image: url('<?php echo $desktop; ?>'); }@media screen and (max-width: 980px) {.postheader__background .img { background-image: url('<?php echo $tablet; ?>'); }}
@media screen and (max-width: 640px) {.postheader__background .img { background-image: url('<?php echo $mobile; ?>'); }}
</style>

<div class="postheader<?php echo $class; ?>" id="parallax">
  <div class="postheader__background layer is-active" data-depth="0.30">
  	<div class="img"> </div>
  </div>
  <div class="container">
    <div class="postheader__head is-centered u-zIndex__3">
      <div class="row">
        <div class="col-md-7">
          <div class="oh">
          	<span class="topheading intro-title"><?php echo $topheading; ?></span>
          </div>
          <h1><?php echo $title; ?></h1>
          <div class="oh tb">
          	<div class="intro-line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>