<?php
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';
$list = ModProjectsHelper::getProjects();
require JModuleHelper::getLayoutPath('mod_projects', $params->get('layout', 'default'));
