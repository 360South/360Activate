<?php
# no direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.modellist');

class ProfilesModelDetails extends JModelList {

    public function __construct($config = array()) {
        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null) {
        
        $app = JFactory::getApplication();

        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);
        
		if(empty($ordering)) {
			$ordering = 'a.ordering';
		}
        parent::populateState($ordering, $direction);
    }

    protected function getListQuery() {
		
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$id = JRequest::getVar('id');
		
		$query->select('*');
		$query->from('#__profiles_items');
		$query->where('id = '.$id);      
        
        return $query;
    }

}
