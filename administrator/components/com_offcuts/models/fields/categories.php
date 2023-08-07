<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');



class JFormFieldCategories extends JFormField

{

	protected $type = 'categories';



	protected function getInput()

	{

		$strVal	= $this->form->getValue('catid');

		

		# Create a new query object.

		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		

		$query->clear();

		$query->select('id,title');

		$query->from('#__offcuts_categories');

		$query->where('state=1');

		$query->order('title asc');

		$db->setQuery($query->__toString());

		

		$result = $db->loadObjectList();

		

		$options		= array();

		$options[0]		= JHtml::_('select.option', '0', '- Select Category -');



		foreach($result as $item) :

			# build items

			$options[]	= JHtml::_('select.option', $item->id, $item->title);

		endforeach;

		

		$selectlist  = '';

		$selectlist .= '<select name="'.$this->name.'" id="'.$this->name.'" class="inputbox" size="1">';

		$selectlist .= JHtml::_('select.options', $options, 'value', 'text', $strVal, true);

		$selectlist .= '</select>';



		return $selectlist;

	}

}