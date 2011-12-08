<?php
/*------------------------------------------------------------------------
# com_versions - rjVersions component
# ------------------------------------------------------------------------
# author    Ronald J. de Vries
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.rjdev.nl
# Technical Support:  Forum - http://www.rjdev.nl
-------------------------------------------------------------------------*/
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of Versions component
 */
class com_versionsInstallerScript
{
	/**
	 * method to run after an install/update/uninstall method
	 */
	function postflight($type, $parent){
        if ($type == 'install' || $type == 'update') {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            $query->delete('#__menu');
            $id = JComponentHelper::getComponent('com_versions')->id;
            $query->where('component_id = '.$id);
            $query->where('client_id = 1');
            $db->setQuery($query);
            $db->query();
        }   
    }   
}