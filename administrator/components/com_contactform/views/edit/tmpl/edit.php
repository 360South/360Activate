<?php
/**
 * @version     1.0.0
 * @package     com_contactform
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
$document->addStyleSheet('components/com_contactform/assets/css/contactform.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function(){
        
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

<form action="<?php echo JRoute::_('index.php?option=com_contactform&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="edit-form" class="form-validate">
  <div class="row-fluid">
    <div class="span10 form-horizontal">
      <fieldset class="adminform">
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('id'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('state'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('emailto'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('emailto'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('body'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('body'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('thankyou'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('thankyou'); ?></div>
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
    <?php echo JHtml::_('form.token'); ?> </div>
</form>
