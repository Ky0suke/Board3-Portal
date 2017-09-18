<?php
/**
*
* [Dutch] translated by Dutch Translators (https://github.com/dutch-translators)
* @package Board3 Portal v2.2 - Statistics
* @copyright (c) 2013 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
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
	'ST_TOP'		=> 'Aantallen',
	'ST_TOP_ANNS'	=> 'Totaal Aankondigingen:',
	'ST_TOP_STICKYS'=> 'Totaal Stickies:',
	'ST_TOT_ATTACH'	=> 'Totaal Bijlagen:',
	'TOPICS_PER_DAY_OTHER'	=> 'Onderwerpen per dag: <strong>%d</strong>',
	'TOPICS_PER_DAY_ZERO'	=> 'Onderwerpen per dag: <strong>0</strong>',
	'POSTS_PER_DAY_OTHER'	=> 'Berichten per dag: <strong>%d</strong>',
	'POSTS_PER_DAY_ZERO'	=> 'Berichten per dag: <strong>0</strong>',
	'USERS_PER_DAY_OTHER'	=> 'Gebruikers per dag: <strong>%d</strong>',
	'USERS_PER_DAY_ZERO'	=> 'Gebruikers per dag: <strong>0</strong>',
	'TOPICS_PER_USER_OTHER'	=> 'Onderwerpen per gebruiker: <strong>%d</strong>',
	'TOPICS_PER_USER_ZERO'	=> 'Onderwerpen per gebruiker: <strong>0</strong>',
	'POSTS_PER_USER_OTHER'	=> 'Berichten per gebruiker: <strong>%d</strong>',
	'POSTS_PER_USER_ZERO'	=> 'Berichten per gebruiker: <strong>0</strong>',
	'POSTS_PER_TOPIC_OTHER'	=> 'Berichten per onderwerp: <strong>%d</strong>',
	'POSTS_PER_TOPIC_ZERO'	=> 'Berichten per onderwerp: <strong>0</strong>',
));
