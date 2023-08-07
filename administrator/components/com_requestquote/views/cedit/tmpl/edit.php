<?php
/**
 * @version     1.0.0
 * @package     com_requestquote
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
$document->addStyleSheet('components/com_requestquote/assets/css/requestquote.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function(){
        
    });
    
    Joomla.submitbutton = function(task)
    {
        if(task == 'cedit.cancel'){
            Joomla.submitform(task, document.getElementById('cedit-form'));
        }
        else{
            
            if (task != 'cedit.cancel' && document.formvalidator.isValid(document.id('cedit-form'))) {
                Joomla.submitform(task, document.getElementById('cedit-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_requestquote&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="cedit-form" class="form-validate">
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
          <div class="control-label"><?php echo $this->form->getLabel('date'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('date'); ?></div>
        </div>
        <hr />
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('package'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('package'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('firstname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('firstname'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('lastname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('lastname'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('email'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('phone'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('phone'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('country'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('country'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('cstate'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('cstate'); ?></div>
        </div>
        <hr />
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('adate'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('adate'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('ddate'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('ddate'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('adult'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('adult'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('children'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('children'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('infants'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('infants'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('rooms'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('rooms'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('ability'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('ability'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('nights'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('nights'); ?></div>
        </div>
        
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('hotel'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('hotel'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('stay'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('stay'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('lessons'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('lessons'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('rentals'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('rentals'); ?></div>
        </div>
        
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('request'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('request'); ?></div>
        </div>
        
      </fieldset>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?> </div>
</form>
