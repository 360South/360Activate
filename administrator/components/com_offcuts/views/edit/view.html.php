<?php

/**

 * @version     1.0.0

 * @package     com_offcuts

 * @copyright   Copyright (C) 2013. All rights reserved.

 * @license     GNU General Public License version 2 or later; see LICENSE.txt

 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/

 */



// No direct access

defined('_JEXEC') or die;



jimport('joomla.application.component.view');



/**

 * View to edit

 */

class OffcutsViewEdit extends JViewLegacy

{

	protected $state;

	protected $item;

	protected $form;



	/**

	 * Display the view

	 */

	public function display($tpl = null)

	{

		$this->state	= $this->get('State');

		$this->item		= $this->get('Item');

		$this->form		= $this->get('Form');



		// Check for errors.

		if (count($errors = $this->get('Errors'))) {

            throw new Exception(implode("\n", $errors));

		}



		$this->addToolbar();

		parent::display($tpl);

	}



	/**

	 * Add the page title and toolbar.

	 */

	protected function addToolbar()

	{

		JFactory::getApplication()->input->set('hidemainmenu', true);



		$user		= JFactory::getUser();

		$isNew		= ($this->item->id == 0);

        if (isset($this->item->checked_out)) {

		    $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));

        } else {

            $checkedOut = false;

        }

		$canDo		= OffcutsHelper::getActions();



		JToolBarHelper::title(JText::_('COM_OFFCUTS_TITLE_EDIT'), 'edit.png');



		// If not checked out, can save the item.

		if (!$checkedOut && ($canDo->get('core.edit')||($canDo->get('core.create'))))

		{



			JToolBarHelper::apply('edit.apply', 'JTOOLBAR_APPLY');

			JToolBarHelper::save('edit.save', 'JTOOLBAR_SAVE');

		}

		if (!$checkedOut && ($canDo->get('core.create'))){

			JToolBarHelper::custom('edit.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);

		}

		// If an existing item, can save to a copy.

		if (!$isNew && $canDo->get('core.create')) {

			JToolBarHelper::custom('edit.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);

		}

		if (empty($this->item->id)) {

			JToolBarHelper::cancel('edit.cancel', 'JTOOLBAR_CANCEL');

		}

		else {

			JToolBarHelper::cancel('edit.cancel', 'JTOOLBAR_CLOSE');

		}



	}

}

