<?php

defined('_JEXEC') or die;
require_once __DIR__ . '/helper.php';

$images = ModLogosHelper::getImages();

require JModuleHelper::getLayoutPath('mod_logos', $params->get('layout', 'default'));

?>