<?php
// No direct access to this file
defined( '_JEXEC' ) or die( 'Restricted access' );
// import Joomla view library
jimport('joomla.application.component.view');
// inherit the JView class
class VersionsViewVersions extends JView {
    protected $msg = null;

    // Overwriting JView display method
    function display($tpl = null) {

        $versionsId = (int)JRequest::getVar('versionid',0);

        // Get available versions
        if($versionsId > 0) {
            $this->content = $this->getContent();
        }else{
            $this->versions = $this->getVersions();
        }

        // Display the view
        parent::display($tpl);
    }

    function getVersions() {

        $contentId = (int)JRequest::getVar('id',0);
        $db = JFactory::getDbo();
        
        $query	= $db->getQuery(true);
	$query->select('#__versions.id, #__versions.modified, #__versions.modified_by, #__versions.version, #__users.username');
	$query->from('#__versions, #__users');
	$query->where('#__versions.modified_by = #__users.id');
        $query->where('content_id = '.$contentId);
        $query->order('#__versions.id');
        
        $db->setQuery($query);
        $result = $db->loadRowList();

        return $result;
        
    }

    function getContent() {

        $versionsId = (int)JRequest::getVar('versionid',0);
        $db = JFactory::getDbo();
        
        $query	= $db->getQuery(true);
	$query->select('`introtext`, `fulltext`');
	$query->from('#__versions');
	$query->where('id = '.(int) $versionsId);
        
        $db->setQuery($query);
	$result = $db->loadRowList();

        return $result;

    }


}
