<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

jimport('joomla.filesystem.folder');



class JFormFieldImages extends JFormField

{

	protected $type = 'images';



	protected function getInput()

	{

		$strVal	= $this->form->getValue('image');

		

		$filepath	= str_replace('/administrator','',JPATH_BASE.'/images/displays');

		$files		= JFolder::files($path=$filepath);

		

		$options 	= array();

		$options[]	= JHtml::_('select.option', '0', '- Select Image -');

		

		foreach($files as $file) :

			if($file != 'index.html' && $file != 'Thumbs.db') :

				$options[$file] = $file;

			endif;

		endforeach;

		

#		asort($options);

		

		$selectlist  = '';

		$selectlist .= '<select name="'.$this->name.'" id="'.$this->name.'">';

		$selectlist .= JHtml::_('select.options', $options, 'value', 'text', $strVal, true);

		$selectlist .= '</select>';



		return $selectlist;

	}

}