<?php
/**
 * @version		$Id: item.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Restricted access');

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');

class JFormFieldThumbnail extends JFormField
{
	protected $type = 'Thumbnail';

	protected function getInput()
	{
		$imgWidth	=	640;
		$imgHeight	=	640;
		
		function DrawResizer($target, $thb_w, $thb_h, $thumbimg) {
			JHTML::_( 'behavior.modal' );
			$tempName = str_replace('[','',$target);
			$tempName = str_replace(']','',$tempName);
			//echo '<br />'.$target.', '.$thb_w.', '.$thb_h.', '.$thumbimg.'<br />';
			echo '<style type="text/css">'."\r";
			echo '	div#thumbPreview_'.$tempName.' {'."\r";
			if (!$thumbimg) { 
			echo '    display:none;'."\r";
			};
			echo '	  margin:5px 0 0 0;'."\r";
			echo '	  padding:0 !important;'."\r";
			echo '  }'."\r";
			echo '	div#thumbPreview_'.$tempName.' img {'."\r";
			echo '	  margin:0;'."\r";
			echo '	  padding:1px;'."\r";
			echo '	  width:'.$thb_w.'px;'."\r";
			echo '	  height:'.$thb_h.'px;'."\r";
			echo '	  border:1px solid #333;'."\r";
			echo '	  background-color: #ccc !important;'."\r";
			echo '  }'."\r";
			echo '	#system-message-container {'."\r";
			echo '	  display:none!important;'."\r";
			echo '  }'."\r";
			echo '</style>'."\r";
			echo '<input class="inputbox" type="text" name="' . $target . '" id="' . $target . '" size="40" maxlength="250" value="' . $thumbimg . '" /> 	';	
			echo '<a class="modal" rel="{handler: \'iframe\', size: {x: 1280, y: 768}, onClose: function() {}}" onclick="return false;" '
			. 'href="index.php?option=com_thumbnail&amp;e_name=' . $target . '&amp;thb_w=' . $thb_w . '&amp;thb_h=' . $thb_h . '&amp;tmpl=component" '
			. 'title="Image"><img src="/administrator/components/com_thumbnail/assets/thumb.png" width="16" height="16" title="Create Thumbnail" /></a>'."\r";
			echo '<div class="clr"></div>';
			echo '<div id="thumbPreview_'.$tempName.'" class="thumb-preview">'
			. '<a class="modal" rel="{handler: \'iframe\', size: {x: 1280, y: 768}, onClose: function() {}}" onclick="return false;" '
			. 'href="index.php?option=com_thumbnail&amp;e_name=' . $target . '&amp;thb_w=' . $thb_w . '&amp;thb_h=' . $thb_h . '&amp;tmpl=component" '
			. 'title="Image">'
			. '<img id="previewThumbnail_'.$tempName.'" name="previewThumbnail_'.$tempName.'" src="/images/thumbnail/' . $thumbimg . '" width="' . $thb_w . '" height="' . $thb_h . '" />'
			. '</a>'
			. '<div class="clr"></div>'
			. '</div>';
		}

		
		DrawResizer($this->name,$imgWidth,$imgHeight,$this->value);
	}
}

?>