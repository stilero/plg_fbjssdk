<?php
/**
 * Plugin_FB_Commments
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Plugin_FB_Commments
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-dec-29 Stilero Webdesign http://www.stilero.com
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

$cache_expire = 60*60*24*365;
header("Pragma: public");
header("Cache-Control: max-age=".$cache_expire);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
?>
 <script src="//connect.facebook.net/en_US/all.js"></script>