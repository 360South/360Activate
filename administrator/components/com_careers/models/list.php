<?php
# no direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.modellist');

class CareersModelList extends JModelList {

    public function __construct($config = array()) {
        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null) {
        
        $app 	= JFactory::getApplication();
        $params = $app->getParams();
		
#		echo '<pre>';print_r($params);echo '</pre>';
		
		$value = $params->get('display_num');
		$this->setState('list.limit', $value);

		$value = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $value);		
		
        #parent::populateState($ordering, $direction);
    }

    protected function getListQuery() {
				
		$db 	= $this->getDbo();
		$query 	= $db->getQuery(true);
		$id 	= JRequest::getVar('id');
		$user 	= JFactory::getUser();
		
#		echo $user->id;
		
#		echo '<pre>';print_r($user);echo '</pre>';
		
		/*$query->select(array('a.*','b.state','group_concat(b.image) as image'));
		$query->from('#__careers_items as a');
		$query->join('left','#__careers_images AS b ON (a.id = b.catid)');
		if ($id && $id != 8) :
			$query->where('find_in_set('.$id.',a.catid)');
		elseif($id && $id == 8) :
			$query->where('find_in_set(2,a.catid) OR find_in_set(3,a.catid)');
		endif;
		$query->where('a.state = 1');
		$query->where('b.state = 1');
		$query->group('a.id');
		$query->order('a.date desc');*/
		
		$query->select('*');
		$query->from('#__careers_items');
		$query->where('state = 1');
		$query->order('rand()');
		
#		print($query);
		        
        return $query;
    }


}
