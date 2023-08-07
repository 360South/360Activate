<?php
# no direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.modellist');

class ProjectModelList extends JModelList {

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

		$query->select('*');
		$query->from('#__project_items');
		$query->where('state = 1');
		$query->order('ordering asc');

        return $query;
    }


}
