<?php

defined('_JEXEC') or die;
date_default_timezone_set("Australia/Melbourne"); 

# seo stuff
$doc   = JFactory::getDocument();

# facebook stuff
$opengraph  = '<meta property="og:site_name" content="360South">' . "\n";
$opengraph  = '<meta property="og:type" content="website" />' . "\n";
$opengraph .= '<meta property="og:url" content="' . JFactory::getURI()->toString() . '" />' . "\n";
$opengraph .= '<meta property="og:title" content="' . $this->items[0]->title . '" />' . "\n";
$opengraph .= '<meta property="og:description" content="' . $this->items[0]->introtext . '" />' . "\n";
$opengraph .= '<meta property="og:image" content="' . $this->items[0]->image . '" />' . "\n";
$opengraph .= '<meta property="author" content="' . BlogHelper::getAuthorName( $this->items[0]->author ) . '">' . "\n";

# twitter stuff
$opengraph .= '<meta name="twitter:site" content="@360southbanter">' . "\n";
$opengraph .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
$opengraph .= '<meta name="twitter:title" content="' . $this->items[0]->title . '">' . "\n";
$opengraph .= '<meta name="twitter:description" content="' . $this->items[0]->introtext . '">' . "\n";
$opengraph .= '<meta name="twitter:image:src" content="' . $this->items[0]->image . '">' . "\n";

#other
$opengraph .= '<meta name="title" content="' . $this->items[0]->title . '">' . "\n";
$opengraph .= '<meta name="referrer" content="always">' . "\n";
$opengraph .= '<meta name="description" content="' . $this->items[0]->introtext . '">' . "\n";
$opengraph .= '<meta name="author" content="360South">' . "\n";
$opengraph .= '<meta itemprop="name" content="' . $this->items[0]->title . '"/>' . "\n";
$opengraph .= '<meta itemprop="description" content="' . $this->items[0]->introtext . '"/>' . "\n";
$opengraph .= '<meta itemprop="image" content="' . $this->items[0]->image . '"/>' . "\n";

$doc->addCustomTag( $opengraph );
$doc->setTitle( $this->items[0]->title ); 

# seo stuff
$doc   = JFactory::getDocument();
$doc->setTitle( $this->items[0]->title );

?>

<div class="container">
  <div class="row bg:gray-2">
    <div class="col-md-12">
      <div class="postbox p+ u-offset bg:gray-3">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
          	<div class="author flex middle">
            	<div class="avatar-image flex0"> <img src="<?php echo BlogHelper::getAuthorImage( $this->items[0]->author ); ?>" class="avatar-image--small" /> </div>
                <div class="author-meta flex1">
                	<div class="author-meta__title"> <?php echo BlogHelper::getAuthorName( $this->items[0]->author ); ?> </div>
                    <div class="author-meta__position"> <?php echo BlogHelper::getAuthorPosition( $this->items[0]->author ); ?> </div>
                    <div class="author-meta__date">
                    	<time datetime="2017-01-30T16:05:19.175Z"><?php echo date( "d.m.Y", strtotime( BlogHelper::getPostDate() ) ); ?></time>
                        <span class="readingTime">/ <?php echo BlogHelper::read_time( $this->items[0]->body ); ?></span>
                    </div>
                </div>
            </div>
            <div class="fs+2 pt- mb+10">
              <p><?php echo $this->items[0]->introtext; ?></p>
            </div>
            <?php if( $this->items[0]->subintrotext ) : ?>
            <div class="fs+1">
              <?php echo $this->items[0]->subintrotext; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- <div class="mt+2 mb+2 bg:gray-3"> <img src="/images/blog/blog-vr.jpg" class="responsive-img" /> </div> -->
      <div class="postbox p+ mt+2 u-offset bg:gray-3">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 fs+1">
          	<article>
          		<?php echo $this->items[0]->body; ?>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row bg:gray-2">
    <div class="col-sm-12 col-xs-12">
      <div class="row mt+2 js-skip animate">
        <div class="col-xs-12">
          <div class="postbox p+ bg:gray-3">
            <div class="row u-text__center">
              <div class="col-xs-12 col-sm-8 col-sm-offset-2"> <?php echo BlogHelper::getShares(); ?> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="top bg:black u-zIndex__3 js-scroll-up"> <span><i class="fa fa-arrow-up"></i></span> </div>