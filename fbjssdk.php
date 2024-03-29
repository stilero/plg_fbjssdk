<?php
/**
 * FaceBook JavaScript SDK Plugin
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-dec-29 Stilero Webdesign http://www.stilero.com
 * @category Plugins
 * @license	GPLv2
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

// import library dependencies
jimport('joomla.plugin.plugin');
define('FBJSSDK_INCLUDES', JPATH_PLUGINS.'/system/fbjssdk/includes/');
JLoader::register('FBSDK', FBJSSDK_INCLUDES.'fbsdk.php');

class plgSystemFbjssdk extends JPlugin {
    
    private $channelFile;
    private $fbAppId;
    private $locale;
    
    function plgSystemFbjssdk ( &$subject, $config ) {
        parent::__construct( $subject, $config );
        $this->channelFile = JURI::root().'plugins/system/fbjssdk/includes/channel.php';
        $this->fbAppId = $this->params->def('fbappid');
        $language = JFactory::getLanguage();
        $locale = str_replace( "-", "_", $language->getTag() );
        $this->locale = $locale;
    }
    
    function onAfterRender(){
        if(!JFactory::getApplication()->isSite()){
            return;
        }
        $FBSDK = new FBSDK($this->fbAppId, $this->channelFile, $this->locale);
        $fbSDKHTML = $FBSDK->getHTML();
        $output = JResponse::getBody();
        $matches = preg_split('/(<body.*?>)/i', $output, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE); 
        $newOutput = $matches[0] . $matches[1] . $fbSDKHTML . $matches[2];
        JResponse::setBody($newOutput);
        return true;
    }
    
} //End Class