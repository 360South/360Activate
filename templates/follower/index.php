<?php
# no direct access
defined( '_JEXEC' ) or die;
date_default_timezone_set('Australia/Melbourne');

# variables
$app 		= JFactory::getApplication();
$doc 		= JFactory::getDocument();
$params 	= $app->getParams();
$pageclass 	= $params->get('pageclass_sfx');
$tpath 		= $this->baseurl.'/templates/home';

$this->setGenerator(null);

$menu 		= $app->getMenu();
$active 	= $menu->getActive();
$params 	= new JRegistry;
$params->loadString($active->params);

# seo stuff
$title = $doc->getTitle();
$doc->setTitle($title);

if($params->get('catid')) {
	$catid = $params->get('catid');
} else {
	$catid = 0;
}

# remove scrips
unset($this->_script['text/javascript']);

# add stylesheets
$doc->addStyleSheet( $tpath.'/css/owl.carousel.css' );
$doc->addStyleSheet( $tpath.'/css/owl.theme.css' );
$doc->addStyleSheet( $tpath.'/css/owl.transitions.css' );
$doc->addStyleSheet( $tpath.'/css/magnific-popup.css' );
$doc->addStyleSheet( $tpath.'/css/iziModal.min.css' );
$doc->addStyleSheet( $tpath.'/css/flexboxgrid.css' );
$doc->addStyleSheet( $tpath.'/css/nouislider.css' );
$doc->addStyleSheet( $tpath.'/css/template.css' );

$option = JRequest::getVar('option');
$view   = JRequest::getVar('view');

$termsLinky  	= JRoute::_( 'index.php?option=com_content&view=article&id=2&Itemid=139' );
$privacyLinky  	= JRoute::_( 'index.php?option=com_content&view=article&id=4&Itemid=148' );

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
<script src="/templates/home/js/jquery.magnific-popup.min.js"></script>
<script src="/templates/home/js/validate.min.js"></script>
<script src="/templates/home/js/owl.carousel.min.js"></script>
<script src="/templates/home/js/jquery.smoothState.min.js"></script>
<script src="/templates/home/js/iziModal.min.js"></script>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="theme-color" content="#000000">
<jdoc:include type="head" />
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2177121805936027'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=2177121805936027&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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
<script type="text/javascript"> _linkedin_data_partner_id = "321828"; </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=321828&fmt=gif" /> </noscript>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-61244331-1', 'auto');
ga('send', 'pageview');
</script>
<jdoc:include type="modules" name="position-10" />
<div class="mobile_menu__close js-close__menu"> <a class="fa fa-times"></a> </div>
<div class="mobile_menu">
  <jdoc:include type="modules" name="position-1" />
</div>
<span class="loader js-scroll-down"></span>
<main id="main" class="is-visible">
  <nav>
    <div class="row clearfix">
      <div class="col-xs-3"> <a class="link__logo" href="/"> <img src="templates/home/images/logo.svg" alt="360Activate | 3D Holographic Displays Australia" /> <span data-letters="Mallki"></span><span data-letters="Mallki"></span> </a> </div>
      <div class="col-xs-9 u-text__right">
        <jdoc:include type="modules" name="position-1" />
        <div class="mobile_menu__trigger js-open__menu"> <a class="fa fa-bars"></a> </div>
      </div>
    </div>
  </nav>
  <section id="section" class="<?php echo $option . '_' . $view; ?> bg:gray-2">
    <jdoc:include type="modules" name="position-2" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="position-3" />
    <jdoc:include type="modules" name="position-4" />
    <div class="container-fluid u-padding__0">
      <div class="row u-margin__0">
        <div class="col-md-6 col-sm-12 u-padding__0 u-display__flex position-6">
          <jdoc:include type="modules" name="position-6" />
        </div>
        <div class="col-md-6 col-sm-12 u-padding__0 u-display__flex position-7">
          <jdoc:include type="modules" name="position-7" />
        </div>
      </div>
    </div>
    <div class="container-fluid u-padding__0 bg:gray-3">
      <footer class="row u-margin__0 bg:gray-2 mt+2">
        <div class="col-md-6 col-sm-12 u-padding__0">
          <p><small>© <?php echo date('Y'); ?> 360Activate Pty Ltd. Digital Marketing Solutions Melbourne.</small></p>
        </div>
        <div class="col-md-6 col-sm-12 u-padding__0 u-text__right">
          <p><small><a href="<?php echo $privacyLinky; ?>">Privacy Policy</a> | <a href="<?php echo $termsLinky; ?>">Terms and Conditions</a>.</small></p>
        </div>
      </footer>
    </div>
  </section>
</main>
<script src="/templates/home/js/parallax.min.js"></script>
<script src="/templates/home/js/applications.js"></script>
<script type="application/ld+json"> { 
"@context" : "http://schema.org",
"@type" : "LocalBusiness",
"image": "https://www.360activate.com.au/templates/home/images/logo.svg", 
"address" : {
"@type": "PostalAddress",
"addressLocality": "Southbank", 
"addressRegion": "Victoria", 
"postalCode": "3006", 
"streetAddress": "9 Moray Street" }, 
"name":"360 Activate",
"url":"https://www.360activate.com.au/",
"email":"info@360activate.com.au",
"telephone":"0396995110",
"openingHours": [ 
"Mo-Fr 08:30-17:30"] 
} </script>
</body>
</html>