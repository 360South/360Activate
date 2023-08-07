<?php
/**
 * @version     1.0.0
 * @package     com_offcuts
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
$document->addStyleSheet('components/com_offcuts/assets/css/offcuts.css');

#echo '<pre>';print_r($this->item->offcuts);echo '</pre>';
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
  
  js('input:hidden.offcuts').each(function(){
	var name = js(this).attr('name');
	if(name.indexOf('offcutshidden')){
	  if (js(this).val() > 0) {
	    js('#jform_offcuts option[value="'+js(this).val()+'"]').attr('selected',true);
	  }
	}
  });
  js('#jform_offcuts').chosen().change(function(){
	if(js('#jform_offcuts option:selected').length == 0){
	  js("#jform_offcuts option[value='']").attr('selected','selected');
	}
	if (js(this).val() == null) {
	  js('input.offcuts').remove();
	  js('#jform_offcuts option').each(function(){
	    js(this).attr('selected',false);
	  });
	  js('#jform_offcuts option').first().attr('selected','selected');
	}
  });
  js("#jform_offcuts").trigger("liszt:updated");
  
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

<form action="<?php echo JRoute::_('index.php?option=com_offcuts&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="edit-form" class="form-validate">
  <div class="form-inline form-inline-header">
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('id'); ?></div>
    </div>
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
    </div>
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('state'); ?></div>
    </div>
    
    
  </div>
  <div class="row-fluid">
    <div class="control-group">
      <div class="control-label"><?php echo $this->form->getLabel('intro'); ?></div>
      <div class="controls"><?php echo $this->form->getInput('intro'); ?></div>
    </div>
    <fieldset class="adminform">
      <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('body'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('body'); ?></div>
      </div>
      <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('image1'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('image1'); ?></div>
      </div>
       <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('image2'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('image2'); ?></div>
      </div>
       <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('image3'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('image3'); ?></div>
      </div>
      <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('metatitle'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('metatitle'); ?></div>
      </div>
      <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('metadesc'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('metadesc'); ?></div>
      </div>
      <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('metakeys'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('metakeys'); ?></div>
      </div>
    </fieldset>
  </div>
  <input type="hidden" name="task" value="" />
  <?php echo JHtml::_('form.token'); ?>
  </div>
</form>
