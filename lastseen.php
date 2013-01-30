<?php
if(USER){
$floatingbar_text .= "
<br/>
".$rs -> form_button("button", '', "".FBAR_14."", "onclick=\"expandit('fbarlastseen')\"")."
<div id='fbarlastseen' style='width:100%; height:150px; overflow:auto; display:none'>
<b><u>".FBAR_12."</u>:</b>";

$sql -> db_Select("user", "user_id, user_name, user_currentvisit", "ORDER BY user_currentvisit DESC LIMIT 0,10", "nowhere");
$userArray = $sql -> db_getList();

$gen = new convert;
$floatingbar_text .= "<ul style='margin-left:15px; margin-top:0px; padding-left:0px;'>";
foreach($userArray as $user)
{
//	extract($user);

	if ($pref['floatingbar_enable_goldorbs'] == "1")
	{$gold_obj = new gold();
	$username = $gold_obj->show_orb($user['user_id']);}
	else
	{$username = $user['user_name'];}

	$seen_ago = $gen -> computeLapse($user['user_currentvisit'], false, false, true, 'short');
	$lastseen = ($seen_ago ? $seen_ago : "1 ".LANDT_09)." ".LANDT_AGO; 
$floatingbar_text .= "<li style='list-style-type: square;'><a href='".e_BASE."user.php?id.".$user['user_id']."'>".$username."</a><br/><small>[ ".$lastseen." ]</small></li>";
}
$floatingbar_text .= "</ul>";
$floatingbar_text .= "</div>";
}
?>