<?php
/**
 * @version     1.0.0
 * @package     com_blog
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
$document->addStyleSheet('components/com_blog/assets/css/blog.css');
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
	js("#jform_catid").trigger("liszt:updated");
    });
    
    Joomla.submitbutton = function(task)
    {
        if(task == 'iedit.cancel'){
            Joomla.submitform(task, document.getElementById('iedit-form'));
        }
        else{
            
            if (task != 'iedit.cancel' && document.formvalidator.isValid(document.id('iedit-form'))) {
                Joomla.submitform(task, document.getElementById('iedit-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_blog&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="iedit-form" class="form-validate">
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
          <div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
        </div>
        <?php
			foreach((array)$this->item->catid as $value): 
				if(!is_array($value)):
					echo '<input type="hidden" class="catid" name="jform[catidhidden]['.$value.']" value="'.$value.'" />';
				endif;
			endforeach;
		?>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
        </div>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('image'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('image'); ?></div>
        </div>
      </fieldset>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?> </div>
</form>
