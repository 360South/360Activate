<?php

defined('_JEXEC') or die;
require_once __DIR__ . '/helper.php';

$app 		= JFactory::getApplication();
$menu 		= $app->getMenu();
$active 	= $menu->getActive();
$params 	= new JRegistry;
$params->loadString($active->params);

$option  = JRequest::getVar('option');
$view    = JRequest::getVar('view');
$class   = '';
$desktop = ModHeaderHelper::getImage('dt');
$tablet  = ModHeaderHelper::getImage('tb');
$mobile  = ModHeaderHelper::getImage('mb');


switch ($option) {
    case 'com_project':

		$topheading = $view == 'article' ? ModHeaderHelper::getProjectTitle(JRequest::getVar('id')) : ($params->get('pageclass_sfx')  == '' ? $active->title : $params->get('pageclass_sfx'));
		$title      = $view == 'article' ? 'A platform for powerful stories' : ($params->get('page_heading')  == '' ? $active->title : $params->get('page_heading'));
		$class      = $view == 'article' ? ' h+100' : '';
		
        break;
    case 'com_blog':
        		
		
		$topheading = ($params->get('pageclass_sfx')  == '' ? $active->title : $params->get('pageclass_sfx')) . ($view == 'article' ? ' <date> / ' . date("d.m.Y", strtotime(ModHeaderHelper::getPostDate(JRequest::getVar('id')))) . '</date>' : '');
		$title      = $view == 'article' ? ModHeaderHelper::getPostTitle(JRequest::getVar('id')) : ($params->get('page_heading')  == '' ? $active->title : $params->get('page_heading'));
	
        break;
	
	case 'com_services':
        	
			$topheading = ($view == 'details' ? 'Solutions' : '');
			$title      = $params->get('page_heading')  == '' ? $active->title : $params->get('page_heading');
				
        break;
	
		
	case 'com_displays':
        	
			$topheading = ($view == 'details' ? 'Solutions' : '');
			$title      = $params->get('page_heading')  == '' ? $active->title : $params->get('page_heading');
				
        break;
	
    default:
		
		$topheading = $params->get('pageclass_sfx')  == '' ? $active->title : $params->get('pageclass_sfx');
		$title      = $params->get('page_heading')  == '' ? $active->title : $params->get('page_heading');
		
        break;
}

if (strpos($title, '  ') !== false) {
	
    $explode = explode('<br />', str_replace('  ', '<br />', $title));
	$title   = '';

	foreach($explode as $item) {
		$title .= '<div class="oh">
					   <div class="intro-title"> ' . $item . ' </div>
				   </div>';
	}
	
} else {
	
	$title = '<div class="oh">
				   <div class="intro-title"> ' . $title . ' </div>
			   </div>';	
}


require JModuleHelper::getLayoutPath('mod_header', $params->get('layout', 'default'));

?>