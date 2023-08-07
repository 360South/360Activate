<?php
# no direct access
defined( '_JEXEC' ) or die;

$session = JFactory::getSession();

$id = JRequest::getVar( 'id' );

$services = HirequoteHelper::getService();

$name = $session->get( 'name', '' );
$email = $session->get( 'email', '' );
$phone = $session->get( 'phone', '' );
$company = $session->get( 'company', '' );
$website = $session->get( 'website', '' );

$budget = $session->get( 'budget', '' );
$timeframe = $session->get( 'timeframe', '' );
$project = $session->get( 'project', '' );
$machine = $session->get( 'machine', '' );
$address = $session->get( 'address', '' );
$activation = $session->get( 'activation', '' );
$budget = $session->get( 'budget', '' );
$aboutyou = $session->get( 'aboutyou', '' );
$other = $session->get( 'other', '' );
//echo '<pre>'; print_r($session); echo '</pre>';

?>

<div id="content" class="hire-quote-form">
	<div class="container">
		
		<div class="row bg:gray-2 mt+2 mb+2">
			<div class="col-md-12">
				<div class="postbox p+ bg:gray-3">
					<?php if($id == 1) : ?>
					<div class="u-text__center">
						<h2>Success!</h2>
						<p>Thank you for taking the time to complete the form.</p>
						<p>If you are seeing this screen it means that your details have been forwarded onto the crew at 360Activate.<br/> So you'll be hearing from us shortly.</p>
					</div>
					<?php else : ?>
					<?php if($id == 2) : ?>
					<div class="u-text__center">
						<h2>Error</h2>
						<p>There was an error processing your form, please try again:</p>
					</div>
					<?php else : ?>
					<div class="u-text__center pb-">
						<h2>Hire quote</h2>
						<p>Have a project you’re interested in discussing with us?<br> Fill in the form below and we will contact you to discuss a quote.</p>
					</div>
					<?php endif; ?>
					<div class="row u-margin__0">
						<div class="col-md-10 col-md-offset-1">
							<form name="request-form" class="js-request-form request-form" method="post">
								<fieldset id="">
									<legend>Holographic Display</legend>
									<label class="slider__label">Select the product(s) of interest</label>
									<div class="row u-margin__0 toggle-container">
									<?php 
										
										$holographicDispalys = array( 
							                array (
							                    "image" => "/images/hire/form/holofan.jpg",   
							                    "slug" => "holo-fan",
							                    "title" => "Holo Fan"
							                ),
							                array (
							                    "image" => "/images/hire/form/hd3.jpg",   
							                    "slug" => "hd3",
							                    "title" => "HD3"
							                ),
							                array (
							                    "image" => "/images/hire/form/pop3.jpg",   
							                    "slug" => "pop3",
							                    "title" => "POP3"
							                ),
							                array (
							                    "image" => "/images/hire/form/xl3.jpg",   
							                    "slug" => "xl3",
							                    "title" => "XL3"
							                ),
							                array (
							                    "image" => "/images/hire/form/xxl360.jpg",   
							                    "slug" => "xxl3",
							                    "title" => "XXL3"
							                ),
							                array (
							                    "image" => "/images/hire/form/diamond.jpg",   
							                    "slug" => "diamond",
							                    "title" => "Diamond"
							                ),
							                array (
							                    "image" => "/images/hire/form/holobox.jpg",   
							                    "slug" => "holocube",
							                    "title" => "Holocube"
							                ),
							                array (
							                    "image" => "/images/hire/form/deepframe.jpg",   
							                    "slug" => "deepframe",
							                    "title" => "Deepframe"
							                )
							            );

									?>
									<?php foreach($holographicDispalys as $holographicDispaly) : ?>
										<div class="col-xs-6 col-sm-3">
											<div class="checkbox mt+ img-select-outer">
												<input class="checkbox__input" name="<?php echo $holographicDispaly['slug']?>" id="<?php echo $holographicDispaly['slug']?>" type="checkbox">
												<label for="<?php echo $holographicDispaly['slug']?>" class="checkbox__label img-select">
													<img src="<?php echo $holographicDispaly['image']?>" />
													<?php echo $holographicDispaly['title']?>
												</label>
												
											</div>
										</div>
									<?php endforeach; ?>	
									</div>
								</fieldset>
								<hr class="bg:gray-2"></hr>
								<fieldset id="project-desc">
									<legend>Activation Details</legend>
									<div class="toggle-container">
										<div class="text-field is-required">
											<label class="text-field__label text-field__label-desktop" for="machine">Number of required machine</label>
											<input class="text-field__input bg:darkblue" id="machine" name="machine" type="text" value="<?php echo $machine; ?>">
										</div>
										<div class="text-field mt+ is-required">
											<label class="text-field__label text-field__label-desktop" for="address">Address of hire location</label>
											<input class="text-field__input bg:darkblue" id="address" name="address" type="text" value="<?php echo $address; ?>">
										</div>
										<div class="text-field mt+ is-required">
											<label class="text-field__label text-field__label-desktop" for="activation">Date of activation (DD/MM/YYYY)</label>
											<input class="text-field__input bg:darkblue" id="activation" name="activation" type="text" value="<?php echo $activation; ?>">
										</div>
										<div class="text-field mt+">
											<label class="text-field__label text-field__label-desktop" for="budget">Approx Budget</label>
											<input class="text-field__input bg:darkblue" id="budget" name="budget" type="text" value="<?php echo $budget; ?>">
										</div>
										<div class="text-field mt+">
											<label class="text-field__label text-field__label-desktop" for="aboutyou">Tell us about your event/expo/retail outlet or others...</label>
											<label class="text-field__label text-field__label-mobile" for="aboutyou">Tell us about your event</label>
											<textarea id="aboutyou" name="aboutyou" class="text-field__input bg:darkblue"></textarea>
										</div>
									</div>
								</fieldset>
								<hr class="bg:gray-2"></hr>
								<fieldset id="">
									<legend>Add-ons</legend>
									<label class="slider__label">Select the options of interest</label>
									<div class="row u-margin__0 toggle-container">
									<?php 
										
										$addons = array( 
							                array (
							                    "image" => "/images/hire/form/stands.jpg",   
							                    "slug" => "stands",
							                    "title" => "Stands"
							                ),
							                array (
							                    "image" => "/images/hire/form/animation.jpg",   
							                    "slug" => "animation",
							                    "title" => "Animation"
							                ),
							                array (
							                    "image" => "/images/hire/form/props.jpg",   
							                    "slug" => "props",
							                    "title" => "Props"
							                ),
							                array (
							                    "image" => "/images/hire/form/flightcase.jpg",   
							                    "slug" => "flightcase",
							                    "title" => "Flightcase"
							                ),
							                array (
							                    "image" => "/images/hire/form/scent.jpg",   
							                    "slug" => "scent",
							                    "title" => "Scent"
							                ),
							                array (
							                    "image" => "/images/hire/form/media-hood.jpg",   
							                    "slug" => "social-media-hood",
							                    "title" => "Social Media Hood"
							                ),
							                array (
							                    "image" => "/images/hire/form/interactivity.jpg",   
							                    "slug" => "interactivity",
							                    "title" => "Interactivity"
							                ),
							                array (
							                    "image" => "/images/hire/form/control.jpg",   
							                    "slug" => "control",
							                    "title" => "Control"
							                )
							                
							            );

									?>
									<?php foreach($addons as $addon) : ?>
										<div class="col-xs-6 col-sm-3">
											<div class="checkbox mt+ img-select-outer">
												<input class="checkbox__input" name="<?php echo $addon['slug']?>" id="<?php echo $addon['slug']?>" type="checkbox">
												<label for="<?php echo $addon['slug']?>" class="checkbox__label img-select">
													<img src="<?php echo $addon['image']?>" />
													<?php echo $addon['title']?>
												</label>
												
											</div>
										</div>
									<?php endforeach; ?>	
									</div>
								</fieldset>
								<hr class="bg:gray-2"></hr>
								<fieldset class="mt+">
									<legend>Your Details</legend>
									<div class="text-field is-required">
										<label class="text-field__label" for="name">Full Name*</label>
										<input class="text-field__input bg:darkblue" id="name" name="name" type="text" value="<?php echo $name; ?>">
									</div>
									<div class="text-field mt+ is-required">
										<label class="text-field__label" for="company">Company / Organization*</label>
										<input class="text-field__input bg:darkblue" id="company" name="company" type="text" value="<?php echo $company; ?>">
									</div>
									<div class="text-field mt+ is-required">
										<label class="text-field__label" for="phone">Phone Number*</label>
										<input class="text-field__input bg:darkblue" id="phone" name="phone" type="text" value="<?php echo $phone; ?>">
									</div>
									<div class="text-field mt+ is-required">
										<label class="text-field__label" for="email">Email*</label>
										<input class="text-field__input bg:darkblue" id="email" name="email" type="text" value="<?php echo $email; ?>">
									</div>
									<div class="text-field mt+">
										<label class="text-field__label" for="phone">Website</label>
										<input class="text-field__input bg:darkblue" id="website" name="website" type="text" value="<?php echo $website; ?>">
									</div>
									<div class="text-field mt+">
										<label class="text-field__label" for="other">Anything else we have forgotten</label>
										<input class="text-field__input bg:darkblue" id="other" name="other" type="text" value="<?php echo $other; ?>">
									</div>
									
									
								</fieldset>
								<hr class="bg:gray-2">
								</hr>
								
								
								<div class="u-text__right"> <a class="btn btn:yellow hover/btn:yellow js-submit"><span><strong>Submit</strong></span></a> </div>
								<div class="u-hidden">
									<input type="hidden" name="ipaddress" id="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
									<input type="hidden" name="option" value="com_hirequote"/>
									<input type="hidden" name="task" value="form.submit"/>
									<?php echo JHtml::_('form.token'); ?>
                                </div>
							</form>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

