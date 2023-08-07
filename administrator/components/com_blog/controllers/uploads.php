<?php
# No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Cedit controller class.
 */
class BlogControllerUploads extends JControllerForm
{

    function __construct() {
        $this->view_list = 'uploads';
        parent::__construct();
    }

}