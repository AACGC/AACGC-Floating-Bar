<?php
global $sysprefs, $pref, $pm_prefs;

include_lan(e_PLUGIN.'pm/languages/'.e_LANGUAGE.'.php');
if(!isset($pm_prefs['perpage']))
{$pm_prefs = $sysprefs->getArray('pm_prefs');}
require_once(e_PLUGIN.'pm/pm_func.php');
pm_getInfo('clear');

define("PM_INBOX_ICON", "<img src='".e_PLUGIN_ABS."pm/images/mail_get.png' style='width:16px; border:0px;' />");
define("PM_OUTBOX_ICON", "<img src='".e_PLUGIN_ABS."pm/images/mail_send.png' style='width:16px; border:0px;' />");
define("PM_SEND_LINK", LAN_PM_35);
define("NEWPM_ANIMATION", "<img src='".e_PLUGIN_ABS."pm/images/newpm.gif' alt='' style='border:0' />");




if(!isset($pm_menu_template))
{
	$pm_menu_template = "<br/><br/>
	".$rs -> form_button("button", '', "".FBAR_16."", "onclick=\"expandit('fbarpms')\"")." {NEWPM_ANIMATE}
	<div id='fbarpms' style='width:100%; display:none'>
		<table style='width:90%' class='' align='left'>
		<tr>
		<td style='' class='' colspan='2'>".FBAR_15.":</td>
		</tr>		
		<tr>
		<td style='text-align:left' class=''><a href='".e_PLUGIN_ABS."pm/pm.php?inbox'>".PM_INBOX_ICON." ".LAN_PM_25."</a></td>
		<td style='text-align:right' class=''>[{INBOX_FILLED}%]</td>
		</tr>
		<tr>
		<td style='' class='' colspan='2'>{INBOX_TOTAL} ".LAN_PM_36.", {INBOX_UNREAD} ".LAN_PM_37."</td>
		</tr>
		<tr>
		<td style='text-align:left' class=''><a href='".e_PLUGIN_ABS."pm/pm.php?outbox'>".PM_OUTBOX_ICON." ".LAN_PM_26."</a></td>
		<td style='text-align:right' class=''>[{OUTBOX_FILLED}%]</td>
		</tr>
		<tr>
		<td style='' class='' colspan='2'>{OUTBOX_TOTAL} ".LAN_PM_36.", {OUTBOX_UNREAD} ".LAN_PM_37."</td>
		</tr>
		<tr>
		<td style='' class='' colspan='2'>[ {SEND_PM_LINK} ]</td>
		</tr>		
		</table>
	</div><br/>	
	";
}


if(check_class($pm_prefs['pm_class'])){

	global $tp, $pm_inbox;
	$pm_inbox = pm_getInfo('inbox');
	require_once(e_PLUGIN."pm/pm_shortcodes.php");
	$userpms = $tp->parseTemplate($pm_menu_template, TRUE, $pm_shortcodes);

$floatingbar_text .= $userpms;

}

?>