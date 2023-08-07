<?php

# no direct access
defined('_JEXEC') or die;
$id      = JRequest::getVar('id');
$session = JFactory::getSession();
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCelwrGs2jB03puFQWpYC8rXo5bPfZC02g&libraries=places"></script> 
<script>function autoComplete() { var input = document.getElementById('a_address');	var autocomplete = new google.maps.places.Autocomplete(input); } google.maps.event.addDomListener(window, 'load', autoComplete);</script>
<div class="clearfix">
  <div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 text-center">
      <h2><?php echo ($session->get('position', '') ? $this->items[0]->title . ': ' : ''); ?>Application</h2>
      <div class="intro">
        <p><?php //echo $this->items[0]->body; ?></p>
      </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
<section class="bottom-line">
  <div class="container form">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <?php if ($id == 1) : ?>
        <?php //echo count($this->items); ?>
        <div class="padding-bottom-20">
        	<p>Thank you for your interest to work with us. We appreciate you taking the time to apply for this position.</p>
        </div>
        <?php else : ?>
        <?php if ($id == 2) : ?>
        <p><strong class="red">There was an error processing your form, please try again:</strong></p>
        <?php elseif ($id == 3) : ?>
        <p><strong class="red">ERROR: The captcha security code was incorrect, please try again.</strong></p>
        <?php endif; ?>
        <div class="clearfix">
          <form id="application-form" name="application-form" enctype="multipart/form-data" class="validate-form" action="<?php echo JURI::current(); ?>" method="post">
          	<div class="row">
            	<?php if(!$session->get('position', '')) : ?>
                <fieldset class="bottom-line padding-bottom-20 padding-top-20">
                    <div class="col-sm-6">
                        <legend>STEP 1</legend>
                        <label>Position</label>
                        <p>Please select a position.</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input">
                        	<label class="hidden" for="a_email">Email</label>
                            <select name="a_position" id="a_position" class="required input-select">
                            	<option value="0" <?php ($session->get('a_position', '') == 0 ? 'selected="selected"' : ''); ?>>General</option>
                            	<?php foreach($this->items as $item) { ?>
                            		<option value="<?php echo $item->id; ?>" <?php ($session->get('a_position', '') == $item->id ? 'selected="selected"' : ''); ?>><?php echo $item->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            	</fieldset>
                <?php endif; ?>
            	<fieldset class="bottom-line padding-bottom-20 padding-top-20">
                    <div class="col-sm-6">
                        <legend>STEP <?php echo ($session->get('position', '') ? '1' : '2'); ?></legend>
                        <label>Résumé</label>
                        <p>Please attach your résumé.</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input">
                        	<label class="hidden" for="a_resume">Résumé</label>
                            <a class="button file-button" onClick="uploadFile()"><i class="fa fa-plus"></i><i class="fa fa-spinner fa-pulse fa-fw"></i> Add Résumé</a>
                            <?php if($session->get('a_resume')) : ?>
                            	<span class="filename" onClick="removeItem(this)"><?php echo $session->get('a_resume'); ?><span class="remove">x<span></span>
                            <?php endif; ?>
                            <input type="text" name="a_resume" id="a_resume" class="required file" value="<?php echo $session->get('a_resume'); ?>" />
                        </div>
                    </div>
            	</fieldset>
                <fieldset class="bottom-line padding-bottom-20 padding-top-20">
                    <div class="col-sm-6">
                        <legend>STEP <?php echo ($session->get('position', '') ? '2' : '3'); ?></legend>
                        <label>Contact Information</label>
                        <p>Please add contact information.</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input">
	                       	<label class="hidden" for="a_fname">Full Name</label>
 		                    <input type="text" name="a_fname" id="a_fname" class="required" value="<?php echo $session->get('a_fname'); ?>" placeholder="Full Name" />
                        </div>
                        <div class="row clearfix form-group">
                        	<div class="col-md-6">
                                <div class="input">
                                	<label class="hidden" for="a_email">Email</label>
                                    <input type="text" name="a_email" id="a_email" class="required" value="<?php echo $session->get('a_email'); ?>" placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input">
                                	<label class="hidden" for="a_mobile">Mobile</label>
                                    <input type="text" name="a_mobile" id="a_mobile" class="required" value="<?php echo $session->get('a_mobile'); ?>" placeholder="Mobile" />
                                </div>                            
                            </div>
                        </div>
                        <div class="input">
                        	<label class="hidden" for="a_address">Address</label>
	                        <input type="text" name="a_address" id="a_address" class="required" value="<?php echo $session->get('a_address'); ?>" placeholder="Address" />
                        </div>                        
                    </div>
            	</fieldset>
                <fieldset class="bottom-line padding-bottom-20 padding-top-20">
                    <div class="col-sm-6">
                        <legend>STEP <?php echo ($session->get('position', '') ? '3' : '4'); ?></legend>
                        <label>Cover Letter</label>
                        <p>Please add any additional information you'd like us to consider.</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input">
                        	<label class="hidden" for="a_letter">Mobile</label>
                            <textarea name="a_letter" id="a_letter" rows="9" class="required" placeholder="Cover Letter" ><?php echo $session->get('a_letter'); ?></textarea>
                        </div>
                    </div>
            	</fieldset>
            </div>
            <div class="row clearfix padding-top-20">
              <div class="col-sm-6"> <div class="g-recaptcha" data-sitekey="6Lc93QYUAAAAAGVYdiRiRd93iQXnVTYlw4XxfBDY"></div> </div>
              <div class="input col-sm-6">
                <input type="submit" name="submit" value="Submit Application" class="button" id="submit">
                <input type="hidden" name="option" value="com_careers" />
                <?php if($session->get('position', '')) : ?>
                <input type="hidden" name="a_position" value="<?php echo $session->get('position', ''); ?>" />
                <?php endif; ?>
                <input type="hidden" name="Itemid" value="<?php echo JRequest::getVar('Itemid'); ?>" />
                <input type="hidden" name="task" value="form.submit" />
              </div>
            </div>
            <div class="row clearfix padding-top-20 padding-bottom-20">
            	<div class="col-sm-12">
                     <p><small>Koustas is proud to be an Equal Employment Opportunity and Affirmative Action employer. We do not discriminate based upon race, religion, color, national origin, sex, sexual orientation, gender identity, age, status as a protected veteran, status as an individual with a disability, or other applicable legally protected characteristics.</small></p>
             	</div>
			</div>
            <?php echo JHtml::_('form.token'); ?>
          </form>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  </div>
</section>
