<?php
/**
 * @version     1.0.0
 * @package     com_blog
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Blog.
 */
class BlogViewUploads extends JViewLegacy
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
			
#			echo '<pre>'; print_r($post); echo '</pre>';
			
			$catid = $post['jform']['catid'];
			
			$i=0;
			foreach($post['files'] as $file){	
				
				$db 	= JFactory::getDbo();
				$query 	= $db->getQuery(true);
				
				# get next ordering
				$query->select('ordering');
				$query->from('#__blog_images');
				$query->where('catid = '.$catid);
				$query->order('ordering desc');
				$db->setQuery($query->__toString(),0,1);
				$ordering = $db->loadResult();
				
				# get category title
				$query->clear();
				$query->select('title');
				$query->from('#__blog_items');
				$query->where('id = '.$catid);
				$db->setQuery($query->__toString(),0,1);
				$category = $db->loadResult();
							
				if ($ordering) : 
					$ordering = ($ordering+1); 
				else : 
					$ordering = 1; 
				endif;
				
				# add to database
				$query->clear();
				$query->insert('#__blog_images');
				$query->set( 'title="Image '.$ordering.'",image="'.$file.'",catid='.$catid.',ordering='.$ordering );
				$db->setQuery($query);
				$db->query();
				#echo $query.'<br />';*/
				
				$i++;
			};
			
			$newurl		=	'index.php?option=com_blog&view=iitems&filter_catid='.$catid;
			$message 	=	'Uploads complete';
			$msg_type 	=	'message';
			JFactory::getApplication()->redirect( $newurl, $message, $msg_type, true );
			
		endif;

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
		}
        
		BlogHelper::addSubmenu('uploads');
        
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
		require_once JPATH_COMPONENT.'/helpers/blog.php';

		$state	= $this->get('State');
		$canDo	= BlogHelper::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_BLOG_TITLE_UPLOADS'), 'uploads.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/uploads';
        /*if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
			    JToolBarHelper::addNew('uploads.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0])) {
			    JToolBarHelper::editList('uploads.edit','JTOOLBAR_EDIT');
		    }

        }

		if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('uploads.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('uploads.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'uploads.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('uploads.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
            	JToolBarHelper::custom('uploads.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			    JToolBarHelper::deleteList('', 'uploads.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    } else if ($canDo->get('core.edit.state')) {
			    JToolBarHelper::trash('uploads.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_blog');
		}*/
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_blog&view=uploads');
        
        $this->extra_sidebar = '';
        //
		
		JToolBarHelper::back('Go Back','index.php?option=com_blog');
        
	}
    
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
#		'a.checked_out' => JText::_('COM_BLOG_ILIST_CHECKED_OUT'),
#		'a.checked_out_time' => JText::_('COM_BLOG_ILIST_CHECKED_OUT_TIME'),
#		'a.created_by' => JText::_('COM_BLOG_ILIST_CREATED_BY'),
		'a.title' => JText::_('COM_BLOG_ILIST_TITLE'),
		'a.image' => JText::_('COM_BLOG_ILIST_IMAGE'),
		);
	}

    
}
