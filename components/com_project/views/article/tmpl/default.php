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
$opengraph .= '<meta property="og:description" content="' . $this->items[0]->intro . '" />' . "\n";
$opengraph .= '<meta property="og:image" content="' . $this->items[0]->image . '" />' . "\n";
$opengraph .= '<meta property="author" content="360South">' . "\n";

# twitter stuff
$opengraph .= '<meta name="twitter:site" content="@360southbanter">' . "\n";
$opengraph .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
$opengraph .= '<meta name="twitter:title" content="' . $this->items[0]->title . '">' . "\n";
$opengraph .= '<meta name="twitter:description" content="' . $this->items[0]->intro . '">' . "\n";
$opengraph .= '<meta name="twitter:image:src" content="' . $this->items[0]->image . '">' . "\n";

#other
$opengraph .= '<meta name="title" content="' . $this->items[0]->title . '">' . "\n";
$opengraph .= '<meta name="referrer" content="always">' . "\n";
$opengraph .= '<meta name="description" content="' . $this->items[0]->intro . '">' . "\n";
$opengraph .= '<meta name="author" content="360South">' . "\n";
$opengraph .= '<meta itemprop="name" content="' . $this->items[0]->title . '"/>' . "\n";
$opengraph .= '<meta itemprop="description" content="' . $this->items[0]->intro . '"/>' . "\n";
$opengraph .= '<meta itemprop="image" content="' . $this->items[0]->image . '"/>' . "\n";

$doc->addCustomTag( $opengraph );
$doc->setTitle( $this->items[0]->title );

if( is_file( JPATH_COMPONENT . '/views/article/tmpl/default_' . ProjectHelper::getTemplate() . '.php' ) ) :
	echo $this->loadTemplate( ProjectHelper::getTemplate() );
else :
	echo $this->loadTemplate( 'item' );
endif; ?>

<div class="top bg:black u-zIndex__3 js-scroll-up"> <span><i class="fa fa-arrow-up"></i></span> </div>