<?php
# No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Cedit controller class.
 */
class ServicesControllerIupload extends JControllerForm
{

    function __construct() {
        $this->view_list = 'iupload';
        parent::__construct();
    }

}