<?php

defined('_JEXEC') or die('Acces Restricted');

jimport('joomla.application.component.controller');

class VersionsController extends JController {

  public function display() {
    $view = JRequest::getCmd('view', false);
    if(!$view) JRequest::setVar('view', 'versions');
    parent::display();
  }

}