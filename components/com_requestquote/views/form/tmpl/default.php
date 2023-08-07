<?php

# no direct access

defined( '_JEXEC' ) or die;



$session = JFactory::getSession();



$id = JRequest::getVar( 'id' );



$services = RequestquoteHelper::getService();



$name = $session->get( 'name', '' );

$email = $session->get( 'email', '' );

$phone = $session->get( 'phone', '' );

$company = $session->get( 'company', '' );

$website = $session->get( 'website', '' );



$budget = $session->get( 'budget', '' );

$timeframe = $session->get( 'timeframe', '' );

$project = $session->get( 'project', '' );



//echo '<pre>'; print_r($session); echo '</pre>';



?>



<div id="content">

	<div class="container">

		<div class="row bg:gray-2 mt+2 mb+2">

			<div class="col-md-12">

				<div class="postbox p+ bg:gray-3 u-offset">

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

					<?php elseif($id == 3) : ?>

					<div class="u-text__center">

						<h2>Error</h2>

						<p>There was an Google recaptcha error processing your form, please try again:</p>

					</div>

					<?php else : ?>

					<div class="u-text__center">

						<h2>Request a quote</h2>

						<p>Have a project you’re interested in discussing with us?<br> Fill in the form below and we will contact you to discuss a quote.</p>

					</div>

					<?php endif; ?>

					<div class="row u-margin__0">

						<div class="col-md-10 col-md-offset-1">

							<form name="request-form" class="js-request-form request-form" method="post">

								<fieldset class="mt+">

									<legend>Your Details</legend>

									<div class="text-field is-required">

										<label class="text-field__label" for="name">Full Name</label>

										<input class="text-field__input bg:darkblue" id="name" name="name" type="text" value="<?php echo $name; ?>">

									</div>

									<div class="text-field mt+ is-required">

										<label class="text-field__label" for="email">Email</label>

										<input class="text-field__input bg:darkblue" id="email" name="email" type="text" value="<?php echo $email; ?>">

									</div>

									<div class="text-field mt+ is-required">

										<label class="text-field__label" for="phone">Phone Number</label>

										<input class="text-field__input bg:darkblue" id="phone" name="phone" type="text" value="<?php echo $phone; ?>">

									</div>

									<div class="text-field mt+ is-required">

										<label class="text-field__label" for="company">Company / Organization</label>

										<input class="text-field__input bg:darkblue" id="company" name="company" type="text" value="<?php echo $company; ?>">

									</div>

									<div class="text-field mt+">

					                    <label class="text-field__label" for="hear">How Did You Hear About Us?</label>

					                    <select class="text-field__input bg:darkblue" id="hear" name="hear">

					                      <option class="emptyselect" value="" ></option>

					                      <option value="Facebook">Facebook</option>

					                      <option value="Instagram">Instagram</option>

					                      <option value="LinkedIn">LinkedIn</option>

					                      <option value="YouTube">YouTube</option>

					                      <option value="Google">Google</option>

					                      <option value="Referral">Referral</option>

					                    </select>

					                </div>

								</fieldset>

								<hr class="bg:gray-2">

								</hr>

								<fieldset id="project-type">

									<legend>Type of project</legend>

									<div class="row u-margin__0 toggle-container">

										<?php foreach($services as $service) : $slug = JFilterOutput::stringURLSafe($service->title); ?>

										<div class="col-sm-6">

											<div class="checkbox mt+">

												<input class="checkbox__input" name="<?php echo $slug; ?>" id="<?php echo $slug; ?>" type="checkbox" <?php echo ( $session->get( $slug ) ? 'checked="checked"' : '' ); ?>>

												<label for="<?php echo $slug; ?>" class="checkbox__label">

													<?php echo $service->title; ?>

												</label>

												<div class="checkbox__help">

													<?php echo $service->intro; ?>

												</div>

											</div>

										</div>

										<?php endforeach; ?>

									</div>

								</fieldset>

								<hr class="bg:gray-2">

								</hr>

								<fieldset id="project-desc">

									<legend>About the project</legend>

									<div class="toggle-container">

										<div class="slider mt+ pb+">

											<label class="slider__label" for="budget">Budget</label>

											<div class="slider__help pb+">(Ballpark is fine, a transparent budget will help us ensure we can meet your expectations)</div>

											<div class="pb+">

												<div id="slider__tool"></div>

											</div>

											<input class="slider__input required" type="text" id="budget" name="budget" value="<?php echo $budget; ?>" readonly/>

										</div>

										<div class="text-field mt+ is-required">

											<label class="text-field__label text-field__label-desktop" for="timeframe">Is there a specific timeframe or deadline for the project?</label>

										

											<label class="text-field__label text-field__label-mobile" for="timeframe">Timeframe or deadline?</label>

											<input class="text-field__input bg:darkblue" id="timeframe" name="timeframe" type="text" value="<?php echo $timeframe; ?>">

										</div>

										<div class="text-field mt+ is-required">

											<label class="text-field__label text-field__label-desktop" for="project">Describe the project, requirements, competitors, and goals.</label>

											<label class="text-field__label text-field__label-mobile" for="project">Describe the project</label>

											<textarea id="project" name="project" class="text-field__input bg:darkblue"><?php echo $project; ?></textarea>

										</div>

										<div class="text-field mt+"> 

                            				<div class="g-recaptcha" data-sitekey="6LccwS8UAAAAAMV_c_7n4zVmDAgudcf2PVf88_tn"></div>

                        				</div>

									</div>

								</fieldset>

								<hr class="bg:gray-2">

								</hr>

								<div class="u-text__right"> <a class="btn btn:yellow hover/btn:yellow js-submit"><span><strong>Submit</strong></span></a> </div>

								<div class="u-hidden">
                                    <input type="hidden" name="ipaddress" id="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
									<input type="hidden" name="option" value="com_requestquote"/>

									<input type="hidden" name="task" value="form.submit"/>

									<?php echo JHtml::_('form.token'); ?> </div>

							</form>

						</div>

					</div>

					<?php endif; ?>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-sm-6 col-xs-12 u-display__flex">

				<div class="postbox p+ bg:gray-3">

					<span class="topheading">Showroom</span>

					<p><a class="logo"><img src="/templates/home/images/logo-positive.svg" alt="360Activate | 3D Holographic Displays Australia"></a></p>

					<p>9 Moray Street<br> Southbank VIC 3006</p>

					<p>Telephone <a href="tel:+61396995110">(03) 9699 5110</a><br> Email <a href="mailto:info@360activate.com.au">info@360activate.com.au</a>

					</p>

					<div class="row social"> <a class="fa fa-facebook" href="https://www.facebook.com/360activate/" target="_blank" aria-hidden="true"></a> <a class="fa fa-instagram" href="https://www.instagram.com/360activate/" target="_blank" aria-hidden="true"></a> <a class="fa fa-youtube-play" href="https://www.youtube.com/channel/UCZfz0h9DvK_NkyltIw2bxIA" target="_blank" aria-hidden="true"></a> </div>

					<p><a href="http://maps.google.com/?q=9+Moray+Street+Southbank+VIC+3006+AU" target="_blank">Get directions to the 360Activate HQ</a>

					</p>

				</div>

			</div>

			<div class="col-sm-6 col-xs-12 u-display__flex">

				<div id="location-map" class="h+100% w+100%"></div>

			</div>

		</div>

	</div>

</div>

<script type="application/javascript">

function initMap(){var e={zoom:16,center:new google.maps.LatLng(-37.826801,144.960791),scrollwheel:!1,navigationControl:!1,mapTypeControl:!1,mapTypeId:google.maps.MapTypeId.ROADMAP,styles:[{featureType:"all",elementType:"all",stylers:[{invert_lightness:!0},{saturation:10},{lightness:30},{gamma:.5},{hue:"#435158"}]},{featureType:"road",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road.highway.controlled_access",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#00b4ff"}]},{featureType:"road.highway.controlled_access",elementType:"labels.text",stylers:[{visibility:"off"}]},{featureType:"road.highway.controlled_access",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"labels",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road.local",elementType:"all",stylers:[{visibility:"on"}]}]};map=new google.maps.Map(document.getElementById("location-map"),e);var l={path:"M50,2.5c-19.2,0-34.8,15-34.8,33.4C15.2,61.3,50,97.5,50,97.5s34.8-36.2,34.8-61.6 C84.8,17.5,69.2,2.5,50,2.5z M50,48.2c-7.1,0-12.9-5.8-12.9-12.9c0-7.1,5.8-12.9,12.9-12.9c7.1,0,12.9,5.8,12.9,12.9 C62.9,42.4,57.1,48.2,50,48.2z",fillColor:"#00b4ff",fillOpacity:1,anchor:new google.maps.Point(49,100),strokeWeight:0,scale:.75};new google.maps.Marker({position:new google.maps.LatLng(-37.826801,144.960791),map:map,icon:l})}var map;

</script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCYN3aJH48_7bQKx90T098UkktmSXz7Bo4&callback=initMap"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>

