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

require_once('controller.php');

$controller = new VersionsController;
$controller->execute(JRequest::getVar('task', 'display'));
