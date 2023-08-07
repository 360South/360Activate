<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

jimport('joomla.filesystem.folder');



class JFormFieldFiles extends JFormField

{

	protected $type = 'files';



	protected function getInput()

	{

		$strVal	= $this->form->getValue('filename');

		

		$filepath	= str_replace('/administrator','',JPATH_BASE.'/images/displays');

		

		$files 			= array();

		$files['base']	= JFolder::files($path=$filepath);

		$folders		= JFolder::listFolderTree($filepath,$filter,$maxLevel=3,$level=0,$parent=0);

		foreach ($folders as $folder) :

			$files[$folder['name']]	= JFolder::files($path=$folder['fullname']);

		endforeach;

		

#		echo '<pre>';print_r($files);echo '</pre>';

		

		$options = array();

#		$options[''] = '--- BASE ---';

		foreach($files as $key => $items) :

			$options[$key] = '--- Select File ---';

			foreach($items as $file):

				if($file != 'index.html' && $file != 'Thumbs.db') :

					if ($key == 'base') :

						$options['/images/displays/'.$file] = $file;

					else :

						$options['/images/displays/'.$key.'/'.$file] = $file;

					endif;

				endif;

			endforeach;

		endforeach;

		

#		echo '<pre>';print_r($options);echo '</pre>';

		

		$selectlist  = '';

		$selectlist .= '<select name="'.$this->name.'" id="'.$this->name.'">';

		$selectlist .= JHtml::_('select.options', $options, 'value', 'text', $strVal, true);

		$selectlist .= '</select>';



		return $selectlist;

	}

}