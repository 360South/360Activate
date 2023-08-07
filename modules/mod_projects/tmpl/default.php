<?php
defined( '_JEXEC' )or die;
$linkyAll = JRoute::_( 'index.php?option=com_project&Itemid=105' );

$linkyHolo = JRoute::_( 'index.php?option=com_services&Itemid=184' );
$linkyVR = JRoute::_( 'index.php?option=com_services&Itemid=130' );
$linkyAR = JRoute::_( 'index.php?option=com_services&Itemid=140' );
$linky3D = JRoute::_( 'index.php?option=com_services&Itemid=127' );
?>

<div class="container">
	<div class="row u-text__center">
		<div class="col-sm-12 col-xs-12 mt+2 mb+2">
			<div class="postbox p+ bg:darkblue">
				<span class="topheading">360Activate</span>
				<h3>The hub of innovative marketing tech.</h3>
				<p>Holographic displays, Augmented Reality, Virtual Reality, 3D animation and more...<br/>We deliver complete activation solutions, meaning we provide the hardware, the strategy, the content,<br/>the manpower, and the wow factor.</p>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-3 project-item-all">
			<a class="project mt+2" href="<?php echo $linkyHolo; ?>">
			<img src="/images/holographic-displays-banner.jpg" class="responsive-img" />
			<img src="/images/icons/holographic-displays.svg" height="62" alt="Holographic Displays" class="icon" />
			<div class="project__caption p1+ u-zIndex__1">
				<h3>Holographic<br />Displays</h3>
				<i class="fa fa-arrow-right"></i>
			</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 project-item-all">
			<a class="project mt+2" href="<?php echo $linkyVR; ?>">
			<img src="/images/virtual-reality-banner.jpg" class="responsive-img" />
			<img src="/images/icons/virtual-reality.svg" height="62" alt="Virtual Reality" class="icon" />
			<div class="project__caption p1+ u-zIndex__1">
				<h3>Virtual<br />Reality</h3>
				<i class="fa fa-arrow-right"></i>
			</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 project-item-all">
			<a class="project mt+2" href="<?php echo $linkyAR; ?>">
			<img src="/images/augmented-reality-banner.jpg" class="responsive-img" />
			<img src="/images/icons/augmented-reality.svg" height="62" alt="Augmented Reality" class="icon" />
			<div class="project__caption p1+ u-zIndex__1">
				<h3>Augmented<br />Reality</h3>
				<i class="fa fa-arrow-right"></i>
			</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 project-item-all">
			<a class="project mt+2" href="<?php echo $linky3D; ?>">
			<img src="/images/animation-special-fx-banner.jpg" class="responsive-img" />
			<img src="/images/icons/animation-special-fx.svg" height="62" alt="Animation & Special FX" class="icon" />
			<div class="project__caption p1+ u-zIndex__1">
				<h3>Animation<br />& Special FX</h3>
				<i class="fa fa-arrow-right"></i>
			</div>
			</a>
		</div>
	</div>
</div>

<div class="container">
	<div class="row u-text__left">
		<div class="col-md-6 col-sm-12 col-xs-12 mt+2">
			<div class="postbox p+ bg:darkblue">
				<span class="topheading">How we can</span>
				<h3>Advance your brand</h3>
				<div class="row">
					<div class="col-sm-6 col-xs-12 col-md-6 pt+30 pb+30 pr+">
						<img src="/images/icons/eye.svg" height="62" alt="Stand Out" class="icon mb+20"/>
						<h4 class="white">Stand out</h4>
						<p>Gain the ultimate marketing advantage with our latest tech.</p>
					</div>
					<div class="col-sm-6 col-xs-12 col-md-6 pt+30 pb+30">
						<img src="/images/icons/engage.svg" height="62" alt="Engage Customers" class="icon mb+20"/>
						<h4 class="white">Engage Customers</h4>
						<p>We create experiences that encourage memorable and unique interactions.</p>
					</div>
					<div class="col-sm-6 col-xs-12 col-md-6 pb+30 pr+">
						<img src="/images/icons/tag.svg" height="62" alt="Boost Sales" class="icon mb+20"/>
						<h4 class="white">Boost Sales</h4>
						<p>See a clear return on investment with increased brand awareness.</p>
					</div>
					<div class="col-sm-6 col-xs-12 col-md-6 pb+30">
						<img src="/images/icons/memory.svg" height="62" alt="Lasting Impression" class="icon mb+20"/>
						<h4 class="white">Lasting Impression</h4>
						<p>Build an enduring, positive association with your brand.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12 mt+2">
			<img src="/images/melba-stand.png" class="responsive-img absolute-bottom"/>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 project-item-all">
			<a class="project mt+2" href="<?php echo $linkyAll; ?>">
			<img src="/images/case-studies.jpg" class="responsive-img" />
			<div class="project__caption p2+ u-zIndex__1">
				<h3>Activation Case Studies</h3>
				<i class="fa fa-arrow-right"></i>
			</div>
			</a>
		
		</div>
		<?php foreach($list as $item) : $linky = JURI::base() . substr( JRoute::_('index.php?option=com_project&view=article&id=' . $item->id . ':' . JFilterOutput::stringURLSafe( $item->title ) . '&Itemid=105' ), strlen( JURI::base( true ) ) +1 ); ?>
		<div class="col-xs-12 col-sm-6 col-md-4 project-item">
			<a class="project mt+2" href="<?php echo $linky; ?>"><img src="<?php echo ($item->image ? $item->image : 'http://placehold.it/640x430'); ?>" class="responsive-img" />
			<div class="project__caption p2+ u-zIndex__1">
				<h3><?php echo $item->title; ?></h3>
				<?php if($item->service) : ?>
				<ul class="tags-list">
					<?php foreach(explode(',', $item->service) as $service) : ?>
					<li><?php echo ModProjectsHelper::getServiceName($service); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				<i class="fa fa-arrow-right"></i>
			</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- <a class="button" href="#">View All Projects</a> </div> -->