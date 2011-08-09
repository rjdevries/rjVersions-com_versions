<?php

defined('_JEXEC') or die('Acces Restricted');

require_once('controller.php');

$controller = new VersionsController;
$controller->execute(JRequest::getVar('task', 'display'));
