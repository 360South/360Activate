<?php
/**
 * @version     1.0.0
 * @package     com_services
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      360South Pty Ltd <tech@360south.com.au> - http://www.360south.com.au/
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Iedit controller class.
 */
class ServicesControllerIedit extends JControllerForm
{

    function __construct() {
        $this->view_list = 'ilist';
        parent::__construct();
    }

}