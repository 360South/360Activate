<?php  
# no direct access
defined( '_JEXEC' ) or die; 
date_default_timezone_set('Australia/Melbourne');

# variables
$app 		= JFactory::getApplication();
$doc 		= JFactory::getDocument(); 
$tpath 		= $this->baseurl.'/templates/home';

?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://use.fortawesome.com/f9c2e8fb.js"></script>
<script src="/templates/home/js/typed.js"></script>
<script src="/templates/home/js/nouislider.js"></script>
<script src="/templates/home/js/starfield.js"></script>
<!-- <script src="/templates/home/js/game.js"></script> -->
<script src="/templates/home/js/validate.min.js"></script>
<script src="/templates/home/js/owl.carousel.min.js"></script>
<script src="/templates/home/js/jquery.smoothState.min.js"></script>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="theme-color" content="#000000">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Super User" />
<title>Home</title>
<link href="/templates/home/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link rel="stylesheet" href="/templates/home/css/owl.carousel.css" type="text/css" />
<link rel="stylesheet" href="/templates/home/css/owl.theme.css" type="text/css" />
<link rel="stylesheet" href="/templates/home/css/owl.transitions.css" type="text/css" />
<link rel="stylesheet" href="/templates/home/css/flexboxgrid.css" type="text/css" />
<link rel="stylesheet" href="/templates/home/css/nouislider.css" type="text/css" />
<link rel="stylesheet" href="/templates/home/css/template.css" type="text/css" />
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "360Activate",
  "image": "https://www.360activate.com.au/templates/home/images/logo-positive.svg",
  "@id": "",
  "url": "https://www.360activate.com.au/",
  "telephone": "(03) 9699 5110",
  "priceRange": "$649-$200,000",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "9 Moray St",
    "addressLocality": "Southbank",
    "addressRegion": "VIC",
    "postalCode": "3006",
    "addressCountry": "AU"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": -37.8268931,
    "longitude": 144.96081900000001
  },
  "openingHoursSpecification": [{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday"
    ],
    "opens": "10:00",
    "closes": "17:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Friday",
    "opens": "10:00",
    "closes": "15:00"
  }],
  "sameAs": [
    "https://www.facebook.com/360activate/",
    "https://www.facebook.com/360activate/",
    "https://www.youtube.com/channel/UCZfz0h9DvK_NkyltIw2bxIA"
  ],
  "aggregateRating": {
    "@type":"AggregateRating",
    "ratingValue":"5",
    "reviewCount":"3"
  }
}
</script>
</head>
<body>
<div id="starfield"></div>
<div class="mobile_play__game js-play__game"> <a class="btn btn:yellow hover/btn:yellow">Play Game</a> </div>
<div class="mobile_menu__close js-close__menu"> <a class="fa fa-times"></a> </div>
<div class="mobile_menu">
  <?php $module = JModuleHelper::getModule('menu'); echo JModuleHelper::renderModule($module); ?>
</div>
<main id="main" class="is-visible">
  <nav>
    <div class="row u-clearfix">
      <div class="col-xs-4"> <a class="link__logo" href="/"> <img src="/templates/home/images/logo.svg" alt="360Activate | 3D Holographic Displays Australia" /> <span data-letters="Mallki"></span><span data-letters="Mallki"></span> </a> </div>
      <div class="col-xs-8 u-text__right">
        <?php $module = JModuleHelper::getModule('menu'); echo JModuleHelper::renderModule($module); ?>
        <div class="mobile_menu__trigger js-open__menu"> <a class="fa fa-bars"></a> </div>
      </div>
    </div>
  </nav>
  <section class="x404" id="content">
  	<h1>Looks like you got lost.</h1>
    <div class="x404__travolta"> <img src="/templates/home/images/travolta-crunched.gif"> </div>
  </section>
  <div class="container-fluid u-padding__0 bg:gray-3">
    <footer class="row u-margin__0 bg:gray-2 mt+2">
      <div class="col-md-6 col-sm-12 u-padding__0">
        <p><small>© <?php echo date('Y'); ?> 360Activate Pty Ltd. Digital Marketing Solutions Melbourne.</small></p>
      </div>
      <div class="col-md-6 col-sm-12 u-padding__0 u-text__right">
        <p><small><a href="/terms-and-conditions.html">Terms and Conditions</a>.</small></p>
      </div>
    </footer>
  </div>
  </section>
</main>
<script src="/templates/home/js/parallax.min.js"></script> 
<script src="/templates/home/js/applications.js"></script>
</body>
</html>