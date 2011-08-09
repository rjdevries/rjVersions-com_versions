<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of Versions component
 */
//class com_versionsInstallerScript
//{
//	/**
//	 * method to run after an install/update/uninstall method
//	 *
//	 * @return void
//	 */
//	function postflight($type, $parent)
//	{
//		// $parent is the class calling this method
//		// $type is the type of change (install, update or discover_install)
//		echo "hallo";
//		die();
//		$db=JFactory::getDbo();
//		$db->setQuery("DELETE FROM `#__menu` WHERE `title` = 'versions'");
//		$db->query();
//		echo '<p>' . JText::_('COM_VERSIONS_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
//	}
//
//}