<?php
/**
 * @version     1.0.0
 * @package     com_addons
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_addons/assets/css/addons.css');

#echo '<pre>';print_r($this->item->addons);echo '</pre>';
?>
<script type="text/javascript">
js = jQuery.noConflict();
js(document).ready(function(){

  js('input:hidden.catid').each(function(){
	var name = js(this).attr('name');
	if(name.indexOf('catidhidden')){
	  js('#jform_catid option[value="'+js(this).val()+'"]').attr('selected',true);
	}
  });
  js('#jform_catid').chosen().change(function(){
	if(js('#jform_catid option:selected').length == 0){
	  js("#jform_catid option[value='']").attr('selected','selected');
	}
  });
  js("#jform_catid").trigger("liszt:updated");
  
  js('input:hidden.addons').each(function(){
	var name = js(this).attr('name');
	if(name.indexOf('addonshidden')){
	  if (js(this).val() > 0) {
	    js('#jform_addons option[value="'+js(this).val()+'"]').attr('selected',true);
	  }
	}
  });
  js('#jform_addons').chosen().change(function(){
	if(js('#jform_addons option:selected').length == 0){
	  js("#jform_addons option[value='']").attr('selected','selected');
	}
	if (js(this).val() == null) {
	  js('input.addons').remove();
	  js('#jform_addons option').each(function(){
	    js(this).attr('selected',false);
	  });
	  js('#jform_addons option').first().attr('selected','selected');
	}
  });
  js("#jform_addons").trigger("liszt:updated");
  
});


Joomla.submitbutton = function(task)
{
	if(task == 'edit.cancel'){
		Joomla.submitform(task, document.getElementById('edit-form'));
	}
	else{
		
		if (task != 'edit.cancel' && document.formvalidator.isValid(document.id('edit-form'))) {
			Joomla.submitform(task, document.getElementById('edit-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
		}
	}
}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_addons&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="edit-form" class="form-validate">
  <div class="form-inline form-inline-header">
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('id'); ?></div>
    </div>
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('state'); ?></div>
    </div>
    <?php /*<div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('image'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('image'); ?></div>
    </div>
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('image2'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('image2'); ?></div>
    </div>*/ ?>
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
    </div>
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('body'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('body'); ?></div>
    </div>
  </div>
  <input type="hidden" name="task" value="" />
  <?php echo JHtml::_('form.token'); ?>
  </div>
</form>
