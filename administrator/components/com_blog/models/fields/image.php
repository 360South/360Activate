<?php
defined('JPATH_BASE') or die;
jimport('joomla.form.formfield');

class JFormFieldImage extends JFormField
{
	protected $type = 'image';

	protected function getInput()
	{
		$strVal	= $this->form->getValue('image');
		$image = '<img src="/images/blog/display/'.$strVal.'" width="600" class="image" /><input type="hidden" aria-required="true" required="required" size="40" class="inputbox required invalid" value="'.$strVal.'" id="jform_image" name="jform[image]" aria-invalid="true">';
		
		return $image;
	}
}