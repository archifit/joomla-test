<?php
/**

 @Package Joomla.Site
 @subpackage mod_random_image
 @copyright Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 @license GNU General Public License version 2 or later; see LICENSE.txt
 */

// import namespace
use Joomla\CMS\Factory;
use Joomla\CMS\Log\Log;
use Joomla\CMS\Uri\Uri;


function console_log($message, $data = "") {
	echo '<script>';
	$page = basename ( $_SERVER ['PHP_SELF'] );
	echo 'console.log(' . '"' . "$page: $message" . '"' . ' + \'' . json_encode ( $data ) . '\');';
	echo '</script>';
	debug ( $message );
}
function console_log_data($message, $data = "") {
	$buffer = print_r ( $data, true );
	info ( "$message: " . $buffer );
}

// session_start();

define ( 'APPLICATION_NAME', 'joomla-test' );

// Set flag that this is a parent file.
define ( '_JEXEC', 1 );
$JOOMLA_PATH = '/..';
define ( 'DS', DIRECTORY_SEPARATOR );
define ( 'JPATH_BASE', realpath ( dirname ( __FILE__ ) . $JOOMLA_PATH ) );

require_once (JPATH_BASE . DS . 'includes' . DS . 'defines.php');
require_once (JPATH_BASE . DS . 'includes' . DS . 'framework.php');

$juriBasePath = URI::base ( true );
$toSearch = '/' . APPLICATION_NAME;
$__application_base_path = substr ( $juriBasePath, 0, strpos ( $juriBasePath, $toSearch ) + strlen ( $toSearch ) );

// Instantiate the application.
$mainframe = Factory::getApplication ( 'site' );
$mainframe->initialise ();
// console_log_data('mainframe=', $mainframe->config);
// get the session
$session = & Factory::getSession ();
// the user
$user = & Factory::getUser ();
$__username = $user->get ( 'username' );

?>
