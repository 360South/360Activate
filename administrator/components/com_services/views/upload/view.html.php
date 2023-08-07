<?php
/**
 * @version     1.0.0
 * @package     com_services
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Services.
 */
class ServicesViewUpload extends JViewLegacy
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
		
		$post			= JRequest::get('post');
		
		if ($post) :
			
			$newurl		=	'index.php?option=com_services&view=items';
			$message 	=	'Upload Complete';
			$msg_type 	=	'message';
			JFactory::getApplication()->redirect( $newurl, $message, $msg_type, true );
			
		endif;

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
		}
        
		ServicesHelper::addSubmenu('upload');
        
		$this->addToolbar();
        
        $this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.'/helpers/services.php';

		$state	= $this->get('State');
		$canDo	= ServicesHelper::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_SERVICES_TITLE_UPLOAD'), 'upload.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/upload';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
#			    JToolBarHelper::addNew('upload.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0])) {
#			    JToolBarHelper::editList('upload.edit','JTOOLBAR_EDIT');
		    }
			
			JToolBarHelper::back('Go Back','index.php?option=com_services');

        }

		if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('upload.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('upload.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'upload.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('upload.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
            	JToolBarHelper::custom('upload.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			    JToolBarHelper::deleteList('', 'upload.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    } else if ($canDo->get('core.edit.state')) {
			    JToolBarHelper::trash('upload.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

/*		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_services');
		}*/
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_services&view=upload');
        
        $this->extra_sidebar = '';
        //
        
	}
    
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.checked_out' => JText::_('COM_SERVICES_ILIST_CHECKED_OUT'),
		'a.checked_out_time' => JText::_('COM_SERVICES_ILIST_CHECKED_OUT_TIME'),
		'a.created_by' => JText::_('COM_SERVICES_ILIST_CREATED_BY'),
		'a.title' => JText::_('COM_SERVICES_ILIST_TITLE'),
		'a.image' => JText::_('COM_SERVICES_ILIST_IMAGE'),
		);
	}

    
}
