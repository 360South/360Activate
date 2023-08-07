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
#JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_blog/assets/css/blog.css');
?>
<link href="/administrator/components/com_blog/assets/css/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/administrator/components/com_blog/assets/scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/administrator/components/com_blog/assets/scripts/swfobject.js"></script>
<script type="text/javascript" src="/administrator/components/com_blog/assets/scripts/jquery.uploadify.min.js"></script>
<style type="text/css">.hideme{display:none}</style>
<form action="<?php echo JRoute::_('index.php?option=com_blog&view=uploads'); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="upload-form" class="form-validate">
  <div class="row-fluid">
    <div class="span10 form-horizontal">
      <fieldset class="adminform">
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
          <div class="control-label">&nbsp;</div>
          <div class="controls">&nbsp;</div>
          <div class="control-label hideme">Select File</div>
          <div class="controls hideme"><input type="file" name="uploadify" id="uploadify" /></div>
        </div>
        <div id="queue"></div>
      </fieldset>
    </div>
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>
<script type="text/javascript" language="javascript">
jQuery.noConflict();
jQuery("#uploadify").uploadify({
    'swf'     	   		: '/administrator/components/com_blog/assets/scripts/uploadify.swf',
    'uploader'       	: '/administrator/components/com_blog/assets/scripts/uploadify.php',
    'queueID'         	: 'queue',
    'auto'          	: true,
    'multi'           	: true,
	'queueID'			: 'queue',
    'queueSizeLimit'  	: 100,
    'fileTypeDesc'		: 'Image Files',
    'fileTypeExts'		: '*.jpg',
    'fileSizeLimit'   	: '10MB',
    'checkExisting' 	: '/administrator/components/com_blog/assets/scripts/check-exists.php',
	'removeCompleted'	: false,
    'method' 			: 'post',
    'formData' 			: { 'catid' : jQuery('select.inputbox').val() },
	'onUploadStart' : function(file) {
      jQuery('#uploadify').uploadify('settings','formData',{'catid':jQuery('select.inputbox').val()});
    },
	'onUploadError' : function(file, errorCode, errorMsg, errorString) {
       alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
    },
	'onUploadComplete' : function(file) {
	  jQuery('#upload-form').append('<input type="hidden" name="files[]" id="files" value="'+file.name+'" />');
    },
	'onQueueComplete' : function(queueData){
	  setTimeout(submitform, 500);
	  function submitform() {
  	    var files = jQuery('input[name="files[]"]').length;
	    if (queueData.uploadsSuccessful == files) {
		  jQuery('#upload-form').submit();
		}
	  }
	}
});
jQuery(document).ready(function(){
  jQuery('.hideme').css({ 'display':'none' });
  jQuery('.inputbox').change(function(){
    jQuery('.hideme').css({'display':'block'});
  });
});
</script>