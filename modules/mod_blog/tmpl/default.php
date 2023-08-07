<?php defined('_JEXEC') or die; ?>
<div class="container-fluid">
  <div class="row">
  	<?php foreach($list as $item) : ?>   
    <?php $linky = JURI::base() . substr( JRoute::_( 'index.php?option=com_blog&view=article&id=' . $item->id . ':' . JFilterOutput::stringURLSafe( $item->title ) . '&Itemid=106' ), strlen( JURI::base( true ) ) +1 ); ?>
    <div id="post-<?php echo $item->id; ?>" class="col-md-3 col-sm-6 u-display__flex mb+2">
      <a class="postbox p2+ bg:gray-1 hover/bg:gray-2" href="<?php echo $linky; ?>">
        <span class="topheading">News <date>/ <?php echo date("d.m.Y", strtotime($item->date)); ?></date></span>
        <h3><?php echo $item->title; ?></h3>
        <p><?php echo $item->metadesc; ?></p>
        <i class="fa fa-arrow-right link__bottom"></i>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
  <!-- <a class="button" href="#">View All</a> -->
</div>