<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');



class JFormFieldRotate extends JFormField

{

	protected $type = 'rotate';



	protected function getInput()

	{

		$strVal	= $this->form->getValue('image');

		$filepath = JPATH_SITE.'/images/offcuts/display/';

		

		$html  = '<input type="button" class="rotate" value="Rotate Image" /> <input type="button" class="refresh" value="Refresh Image" />';

		$html .= '<div><em>Please save any changes prior to rotating.</em></div>';

		$html .= '<script src="/administrator/assets/jQueryRotateCompressed.2.2.js"></script>';

		$html .= '<script>';

		$html .= 'jQuery(document).ready(function(){';

		$html .= '  jQuery(".rotate").click(function(){';

#		$html .= '    jQuery(".image").rotate(90);';

		$html .= '	  jQuery(this).val("Please wait...").attr("readonly",true);';

#		$html .= '	  alert("'.JPATH_SITE.'/index.php?option=com_json&format=raw&task=rotate&image='.$image.'&path='.$filepath.'&degrees=-90");';

		$html .= '	  jQuery.getJSON("'.JPATH_SITE.'/index.php?option=com_json&format=raw",{';

		$html .= '	    task:"rotate",';

		$html .= '	    image:"'.$strVal.'",';

		$html .= '	    path:"'.$filepath.'",';

		$html .= '	    degrees:"-90"';

		$html .= '	  },function(){';

		$html .= '      alert("Image Rotated");';

		$html .= '	    jQuery(".rotate").val("Rotate Image").attr("readonly",false);';

		$html .= '	    jQuery(".controls img").remove();';

		$html .= '	    var image = jQuery("#jform_image").val();';

		$html .= '	    jQuery("#jform_image").before("<img src=\"/images/offcuts/display/"+image+"?str='.@time().'\" class=\"image\" width=\"600\" />");';

		$html .= '	  });';

		$html .= '  });';

		$html .= '  jQuery(".refresh").click(function(){';

		$html .= '    window.location.reload(true);';

		$html .= '  });';

		$html .= '});';

		$html .= '</script>';

				

		return $html;

	}

}

?>