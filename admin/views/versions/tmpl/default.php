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

// Load function if plugins/editor-xtd/versions/versions.php
//$cleanEditor = JRequest::getCmd('function', 'cleanEditor');
$function = JRequest::getCmd('function', 'jSelectVersion');


if(isset($this->versions)) { $versionsCount = count($this->versions); }

$eName	= JRequest::getVar('ename');
$eName	= preg_replace( '#[^A-Z0-9\-\_\[\]]#i', '', $eName );

// SHOW CONTENT
if(isset($this->content)) {
    // Place the article in one variable
    foreach($this->content as $i) {
        $article = $i['0'];
        if($i['1']) { $article = $article.'<hr id="system-readmore" />'; }
        $article = $article.$i['1'];
    }

    // Convert the article so that it can be put into a javascript function value
    $r = array('\'');       //replace - can be extended like array('\'','"');
    $w = array('&#39;');    //replacewith - can be extended like array('&#39;','&#34;');
    $article = str_replace($r, $w, $article);
    $article = str_replace("\r\n",'',$article);

    // Some changes to show images correct in this view.
    $article = preg_replace('/src="\//', 'src="../', $article);
    ?>

    <!-- Buttons -->
    <form action="<?php echo JRoute::_('index.php?option=com_versions&function='.$function);?>" method="post" name="adminForm">

        <input type="button" value="<?php echo JText::_('COM_VERSIONS_RETURN_TO_LIST'); ?>" onclick="javascript:history.go(-1)" />&nbsp;&nbsp;&nbsp;
        <input type="button" value="<?php echo JText::_('COM_VERSIONS_CLOSE_POPUP'); ?>" onclick="window.parent.SqueezeBox.close()" />&nbsp;&nbsp;&nbsp;
        <input type="button" value="<?php echo JText::_('COM_VERSIONS_RESTORE'); ?>" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo htmlspecialchars($article, ENT_QUOTES); ?>');" />
        
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="option" value="com_versions"/>
        <input type="hidden" name="task" value="showversions"/>
    </form>
    <hr>
    <?php echo $article; ?>

<?php
// SHOW VERSIONS LIST
}else{
    if($versionsCount > 0) {
    
        $rownum = 0;
        $rowswitch = 0;
        ?>
        
        <h2><?php echo $versionsCount.' '.JText::_('COM_VERSIONS_VERSIONS_AVAILABLE'); ?></h2>
        
        <form action="<?php echo JRoute::_('index.php?option=com_versions&function='.$function);?>" method="post" name="adminForm">

            <table class="adminlist">

                <thead>
                    <tr>
                        <th class="title" width="5%">#</th>
                        <th class="title" width="60%"><?php echo JText::_('COM_VERSIONS_DATE'); ?></th>
                        <th class="title" width="30%"><?php echo JText::_('COM_VERSIONS_USER'); ?></th>
                        <th class="title" width="5%"><?php echo JText::_('COM_VERSIONS_VERSION_NO'); ?></th>
                    </tr>
                </thead>

                <tfoot></tfoot>

                <!-- List the available versions -->
                <tbody>
                    <?php
                    foreach($this->versions as $i) {
                        $rownum = $rownum + 1;
                        if($rowswitch == 0) {$rowswitch = 1; }else{ $rowswitch = 0; }
                        ?>

                        <tr class="row<?php echo $rowswitch; ?>">
                            <td class="center"><?php echo $rownum; ?></td>
                            <td><a title='complete' href='?option=com_versions&tmpl=component&ename=&versionid=<?php echo $i['0']; ?>' rel='title'><?php echo $i['1']; ?></a></td>
                            <td><?php echo $i['4']; ?></td>
                            <td><?php echo $i['3']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

            <input type="hidden" name="boxchecked" value="0" />
            <input type="hidden" name="option" value="com_versions"/>
            <input type="hidden" name="task" value="showversions"/>

        </form>
    <?php
    }else{
        echo '<h1>'.JText::_('COM_VERSIONS_TITLE').'</h1><br />';
        echo JText::_('COM_VERSIONS_USE_EDITOR_BUTTON');
    }
}
?>
