<?php
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';
$list = ModRandomHelper::getRandom();
require JModuleHelper::getLayoutPath('mod_random', $params->get('layout', 'default'));
