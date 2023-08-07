<?php defined('_JEXEC') or die; $id = JRequest::getVar('id'); $session = JFactory::getSession(); ?>

<div class="container">
  <div class="row bg:gray-2">
    <div class="col-md-12">
      <div class="postbox p+ u-offset bg:gray-3 mb+2">
      	<?php if ($id == 99) : ?>
        <div class="fs+2 pb- u-text__center">
        	<p>Thank you for your interest to work with us.<br> We appreciate you taking the time to apply for this position.</p>
        </div>
        <?php else : ?>
        <div class="row">
          <div class="col-sm-3 col-sm-offset-1 pr+">
            <h3><?php echo $this->items[0]->title; ?></h3>
            <span class="topheading">Posted <date>/ <?php echo date( "d.m.Y", strtotime( $this->items[0]->date ) ); ?></date> </span>
          </div>
          <div class="col-sm-7">
            <div class="fs+2 pb-2">
              <p><?php echo $this->items[0]->intro; ?></p>
            </div>
            <?php echo $this->items[0]->body; ?> </div>
        </div>
        <?php endif; ?>
      </div>
      <?php if ($id != 99) : ?>
      <div class="postbox p+ bg:gray-3 mb+2">
        <div class="row">
          <div class="col-sm-3 col-sm-offset-1">
            <h3>About<br> 360South</h3>
          </div>
          <div class="col-sm-7">
            <div class="fs+2 pb-2">
              <p>360South is a multimedia and website design studio based in Southbank, Melbourne.</p>
            </div>
            <p>Since 2002 we’ve grown by working with the latest digital technology to create sleek graphic design, dynamic website design and compelling visual content that drives business for progressive and ambitious clients all over the world.</p>
            <p>The 360South HQ houses a diverse team of professional designers specialising in website design and development, graphic design and print, virtual tours and interactive maps, video and photography.</p>
          </div>
        </div>
      </div>
      <div class="postbox p+ bg:gray-3">
        <div class="row">
          <div class="col-sm-3 col-sm-offset-1">
            <h3>Apply Now</h3>
            <p>No need to be formal.<br> Just send us your links<br> and we’ll be in touch.</p>
          </div>
          <div class="col-sm-7">
            <?php /*<form name="request-form" class="js-request-form" method="post">
              <div class="text-field is-required">
                <label class="text-field__label" for="name">Full Name</label>
                <input class="text-field__input bg:darkblue" id="name" name="name" type="text">
              </div>
              <div class="text-field mt+ is-required">
                <label class="text-field__label" for="name">Phone Number</label>
                <input class="text-field__input bg:darkblue" id="phone" name="phone" type="text">
              </div>
              <div class="text-field mt+ is-required">
                <label class="text-field__label" for="name">Email Address</label>
                <input class="text-field__input bg:darkblue" id="email" name="email" type="text">
              </div>
              <div class="text-field mt+ is-required">
                <label class="text-field__label" for="portfolio">Your portfolio link</label>
                <input class="text-field__input bg:darkblue" id="portfolio" name="portfolio" type="text">
              </div>
              <div class="text-field mt+">
                <label class="text-field__label" for="github">Dribble/Behance</label>
                <input class="text-field__input bg:darkblue" id="behance" name="behance" type="text">
              </div>
              <div class="u-text__right"> <a class="btn btn:yellow hover/btn:yellow js-submit"><span><strong>Submit</strong></span></a> </div>
              <div class="u-hidden">
                <input type="hidden" name="option" value="com_careers" />
                <input type="hidden" name="position" value="<?php echo $this->items[0]->id; ?>" />
                <input type="hidden" name="task" value="form.submit" />
                <?php echo JHtml::_('form.token'); ?>
              </div>
            </form>*/ ?>
			  <p>If we sound like a good fit for you, send an email to <a href="mailto:careers@360south.com.au">careers@360south.com.au</a> with:</p>
			  <ul>
				  <li>your resume and details of recent experience</li>
				  <li>a link to your website or examples of your recent best work</li>
				  <li>any relevant industry portfolio links</li>
			  </ul>

          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
