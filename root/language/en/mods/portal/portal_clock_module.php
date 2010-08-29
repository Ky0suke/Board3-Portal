<?php
/**
* @package Portal - Clock
* @version $Id: portal_birthday_list_module.php 678 2010-08-29 12:49:25Z marc1706 $
* @copyright (c) 2009, 2010 Board3 Portal Team
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
$lang = array_merge($lang, array(
	'CLOCK'		=> 'Clock',
	
	// ACP
	'ACP_PORTAL_CLOCK_SETTINGS'		=> 'Clock Settings',
	'ACP_PORTAL_CLOCK_SETTINGS_EXP'	=> 'This is where you customize your clock',
	'ACP_PORTAL_CLOCK_SRC'			=> 'Clock',
	'ACP_PORTAL_CLOCK_SRC_EXP'		=> 'Enter the filename of your clock. The clock needs to be located in styles/*yourstyle*/theme/images/portal/.',
));

?>