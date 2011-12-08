<?php
/*------------------------------------------------------------------------
# com_versions - rjVersions component
# ------------------------------------------------------------------------
# author    Ronald J. de Vries
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.rjdev.nl
# Technical Support:  Forum - http://www.rjdev.nl
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Acces Restricted');

jimport('joomla.application.component.controller');

class VersionsController extends JController {

  public function display() {
    $view = JRequest::getCmd('view', false);
    if(!$view) JRequest::setVar('view', 'versions');
    parent::display();
  }

}