<?php defined('_JEXEC') or die; $Itemid = JRequest::getVar('Itemid'); $i = 0; ?>

<div class="container">
  <div class="row bg:gray-2">
    <div class="col-sm-12">
      <?php foreach($this->items as $item) : ?>
      <?php $linky = JURI::base() . substr( JRoute::_('index.php?option=com_blog&view=article&id=' . $item->id . ':' . JFilterOutput::stringURLSafe( $item->title ) . '&Itemid=' . $Itemid ), strlen( JURI::base( true ) ) +1 ); ?>
      <div class="u-display__flex <?php echo ($i != 0 ? 'js-skip animate' : ''); ?>"> <a class="postbox mb+2 p+ <?php echo ($i==0 ? 'u-offset' : ''); ?> bg:gray-3 hover/bg:gray-2" id="post-<?php echo $item->id; ?>" href="<?php echo $linky; ?>">
        <div class="row u-margin__0 middle-xs">
          <div class="col-sm-7">
            <div class="postbox p+">
              <div class="author flex middle small">
            	<div class="avatar-image flex0"> <img src="<?php echo BlogHelper::getAuthorImage( $item->author ); ?>" class="avatar-image--small" /> </div>
                <div class="author-meta flex1">
                	<div class="author-meta__title"> <?php echo BlogHelper::getAuthorName( $item->author ); ?> </div>
                    <div class="author-meta__date">
                    	<time datetime="2017-01-30T16:05:19.175Z"><?php echo date( "d.m.Y", strtotime( BlogHelper::getPostDate( $item->id ) ) ); ?></time>
                        <span class="readingTime">/ <?php echo BlogHelper::read_time( $item->body ); ?></span>
                    </div>
                </div>
            </div>
              <h3><?php echo $item->title; ?></h3>
              <p><?php echo $item->introtext; ?></p>
              <i class="fa fa-arrow-right"></i> </div>
          </div>
          <div class="col-sm-5 <?php echo ($i%2 == 0 ? 'first-xs last-sm' : 'first-xs'); ?>"> <img src="<?php echo $item->image; ?>" class="responsive-img" /> </div>
        </div>
        </a> </div>
      <?php $i++; endforeach; ?>
      <?php if ($this->pagination) : ?>
          <div class="pagination mb+2">
            <div class="text-center"> <?php echo $this->pagination->getPagesLinks(); ?> </div>
          </div>
      <?php endif; ?>
    </div>
  </div>
</div>
