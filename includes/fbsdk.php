<?php
/**
 * Facebook SDK
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Plugin_FB_Commments
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-dec-29 Stilero Webdesign http://www.stilero.com
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class FBSDK{
    
    protected $appID;
    protected $channelURL; ////WWW.YOUR_DOMAIN.COM/channel.html\
    protected $locale;
    protected $html;
    public static $locEnUS = 'en_US';
    public static $locSvSE = 'sv_SE';
    public static $locFrFR = 'fr_FR';
    public static $locEsES = 'es_ES';
    public static $locDeDE = 'de_DE';

    //protected static $pluginPath = 'plugins/content/plg_fbcomments/fbcomments/includes/';
    
    public function __construct($appID, $channelURL='', $locale='en_US') {
        $this->appID = $appID;
        $this->channelURL = $channelURL;
        $this->locale = $locale;
    }
    
    protected function buildHTML(){
        $html = '<div id="fb-root"></div>';
        $html .= '<script>';
        $html .= 'window.fbAsyncInit = function() {';
        $html .= 'FB.init({
            appId      : \''.$this->appID.'\', // App ID from the App Dashboard
            channelUrl : \''.$this->channelURL.'\', // Channel File for x-domain communication
            status     : true, // check the login status upon init?
            cookie     : true, // set sessions cookies to allow your server to access the session?
            xfbml      : true  // parse XFBML tags on this page?
            });
        };';
        $html .= '(function(d, debug){
            var js, id = \'facebook-jssdk\', ref = d.getElementsByTagName(\'script\')[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(\'script\'); js.id = id; js.async = true;
            js.src = "//connect.facebook.net/'.$this->locale.'/all" + (debug ? "/debug" : "") + ".js";
            ref.parentNode.insertBefore(js, ref);
          }(document, /*debug*/ false));
       </script>';
        $this->html = $html;
    }
    
    public function getHTML(){
        $this->buildHTML();
        return $this->html;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
