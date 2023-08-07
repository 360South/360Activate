<?php

defined('_JEXEC') or die;
require_once __DIR__ . '/helper.php';

$list = ModBlogHelper::getPosts();

require JModuleHelper::getLayoutPath('mod_blog', $params->get('layout', 'default'));