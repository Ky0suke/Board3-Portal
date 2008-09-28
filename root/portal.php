<?php

/**
*
* @package - Board3portal
* @version $Id$
* @copyright (c) kevin / saint ( www.board3.de/ ), (c) Ice, (c) nickvergessen ( www.flying-bits.org/ ), (c) redbull254 ( www.digitalfotografie-foren.de ), (c) Christian_N ( www.phpbb-projekt.de )
* @based on: phpBB3 Portal by Sevdin Filiz, www.phpbb3portal.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/


define('IN_PHPBB', true);
define('IN_PORTAL', true);

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';

$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'portal/includes/functions.'.$phpEx);

$portal_config = obtain_portal_config();

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/lang_portal');

// output page
page_header($user->lang['PORTAL']);

$template->set_filenames(array(
	'body' => '/portal/portal_body.html'
));


make_jumpbox(append_sid("{$phpbb_root_path}viewforum.$phpEx"));

$load_center = true;

if ( is_dir( $phpbb_root_path . 'install_portal/' ) === TRUE )
{
	if ( is_file( $phpbb_root_path . 'install_portal/install.'.$phpEx ) === TRUE )
	{
		include $phpbb_root_path . 'install_portal/install.'.$phpEx;

		if ( version_compare( $current_version, $portal_config['portal_version'], '<=' ) === TRUE )
		{
			$template->assign_vars(array(
				'GEN_TITLE'				=> $user->lang['PORTAL_ERROR'],
				'GEN_MESSAGE'			=> sprintf( $user->lang['PORTAL_DELETE_DIR'], $phpbb_root_path . 'install_portal' )
			));
		}
		else
		{
			$template->assign_vars(array(
				'GEN_TITLE'				=> $user->lang['PORTAL_UPDATE'],
				'GEN_MESSAGE'			=> sprintf( $user->lang['PORTAL_UPDATE_TEXT'], $phpbb_root_path . 'install_portal/install.'.$phpEx, $current_version )
			));
		}
		
		if (!isset($template->filename['general_block']))
		{
			$template->set_filenames(array(
				'general_block'	=> 'portal/block/general_block.html')
			);
		}
		
		$block_temp = $template->assign_display('general_block');
		
		$template->assign_block_vars('portal_column_center', array(
			'BLOCK_DATA'	=> $block_temp)
		);

		$load_center = false;
	}
}

if ($load_center == TRUE && $user->data['user_perm_from'] && $auth->acl_get('a_switchperm'))
{
		if (!isset($template->filename['general_block']))
		{
			$template->set_filenames(array(
				'general_block'	=> 'portal/block/general_block.html')
			);
		}
		
		$block_temp = $template->assign_display('general_block');
		
		$template->assign_block_vars('portal_column_center', array(
			'BLOCK_DATA'	=> $block_temp)
		);
}


if ( $load_center != TRUE )
{
	$where = ' AND block_type <> 1';
} else {
	$where = '';
}

$block_sql = 'SELECT * FROM phpbb_portal_blocks WHERE block_enabled = 1'.$where.' ORDER BY block_position ASC , block_order ASC';
$block_result = $db->sql_query($block_sql);

while ($block_row = $db->sql_fetchrow($block_result))
{
	switch( $block_row['block_position'] )
	{
		case 0:
			$block_pos = 'left';
			$block_type = 'side';
		break;
		case 1:
			$block_pos = 'center';
			$block_type = '';
		break;
		case 2:
			$block_pos = 'right';
			$block_type = 'side';
		break;
	}
	include($phpbb_root_path . 'portal/block/'.$block_row['block_name'].'.'.$phpEx);
}

if ( $load_center === TRUE )
{

	if ($portal_config['portal_forum_index']) 
	{ 
		display_forums('');

		$template->assign_vars(array(
		'FORUM_IMG'				=> $user->img('forum_read', 'NO_NEW_POSTS'),
		'FORUM_NEW_IMG'			=> $user->img('forum_unread', 'NEW_POSTS'),
		'FORUM_LOCKED_IMG'		=> $user->img('forum_read_locked', 'NO_NEW_POSTS_LOCKED'),
		'FORUM_NEW_LOCKED_IMG'	=> $user->img('forum_unread_locked', 'NO_NEW_POSTS_LOCKED'),
		'S_DISPLAY_PORTAL_FORUM_INDEX' => true,

		'U_MARK_FORUMS'		=> ($user->data['is_registered'] || $config['load_anon_lastread']) ? append_sid("{$phpbb_root_path}index.$phpEx", 'mark=forums') : '',
		'U_MCP'				=> ($auth->acl_get('m_') || $auth->acl_getf_global('m_')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=main&amp;mode=front', true, $user->session_id) : '')
		);
	}

}

$template->assign_vars(array(
	'PORTAL_LEFT_COLUMN' 	=> $portal_config['portal_left_column_width'],
	'PORTAL_RIGHT_COLUMN' 	=> $portal_config['portal_right_column_width'],
));

page_footer();

?>