<?php
if(USER){
	
//-------# Members #-----+
	
global $tp, $e107cache, $e_event, $e107, $pref, $footer_js, $PLUGINS_DIRECTORY, $gold_obj;

$floatingbar_text .= "<br/>
<b><u>".FBAR_04."</u>:</b>
<br/>
<div style='width:100%; height:150px; overflow:auto;'>".FBAR_05.": ".MEMBERS_ONLINE."
<br>";

$script="SELECT ".MPREFIX."user.*,".MPREFIX."online.*  FROM ".MPREFIX."online LEFT JOIN ".MPREFIX."user ON ".MPREFIX."online.online_user_id= CONCAT(".MPREFIX."user.user_id,'.',".MPREFIX."user.user_name) WHERE ".MPREFIX."online.online_user_id!='0' GROUP BY ".MPREFIX."user.user_id ORDER BY ".MPREFIX."user.user_name ASC";
$sql->db_Select_gen($script);
while ($row = $sql->db_Fetch()){

$isadmin = $row['user_admin'];
$userid = $row['user_id'];
$username = $row['user_name'];
$userimage = $row['user_image'];
$userpage = $row['online_location'];

if ($pref['floatingbar_enable_goldorbs'] == "1")
{$username = $gold_obj->show_orb($userid);}

if ($userimage == ""){
$useravatar = "<img width='20px' src='".e_PLUGIN."aacgc_floating_bar/images/default.png' alt='' />";}
else
{$userimage = str_replace(" ", "%20", $userimage);
include_once(e_HANDLER."avatar_handler.php");  
$userimage = avatar($userimage);
$useravatar = "<img width='20px' src='".$userimage."'></img>";}
              
//--------------------------# Members #---------------------------------+

$page = eregi_replace(".php", "", substr(strrchr($userpage, "/"), 1));

//--------------------------# Core Pages #-------+
if ($online_page == "log" || $online_location_page == "error")
{$userpage = "news.php";
$page = "News";}
if ($page == "index")
{$page = "Index";}
if ($page == "news")
{$page = "News";}
if ($page == "user")
{$page = "User";}
if ($page == "upload")
{$page = "Upload";}
if ($page == "download")
{$page = "Downloads";}
if ($page == "request")
{$page = "Download";}
if ($page == "page")
{$page = "Page";}

//--------------------------# Core Plugin Pages #-------------+
$userpage = eregi_replace("forum_viewtopic.php.", "forum_viewtopic.php?", $userpage);
$userpage = eregi_replace("forum_viewforum.php.", "forum_viewforum.php?", $userpage);
$page = eregi_replace("forum_viewforum.", "Forum Thread ", $page);
$page = eregi_replace("forum_viewtopic.", "Forum Post ", $page);
if ($page == "forum")
{$page = "Forums";}
if ($page == "chatbox2_control")
{$userpage = "news.php";
$page = "News";}
if ($page == "rss")
{$page = "RSS Feeds";}
if ($page == "links")
{$page = "Links";}
if ($page == "pm")
{$page = "PMs";}
if ($page == "chat")
{$page = "Chat Page";}

//--------------------------# AACGC Plugin Pages #-------+
if ($page == "AdvRoster")
{$page = "Roster";}
if ($page == "WZone_Main")
{$page = "WarZone";}
if ($page == "WZone_Match")
{$page = "WarZone Match";}
if ($page == "WZone_Game")
{$page = "WarZone Game";}
if ($page == "WZone_Team")
{$page = "WarZone Team";}
if ($page == "WZone_Challenge")
{$page = "Challenge";}
if ($page == "WZone_Member")
{$page = "WarZone Profile";}
if ($page == "WZone_Roster")
{$page = "WarZone Roster";}
if ($page == "WZone_History")
{$page = "Match History";}
if ($page == "advmedsys_view")
{$page = "Ribbons & Medals";}
if ($page == "DL_Tracker_Details")
{$page = "Download Tracker";}
if ($page == "DL_Tracker_List")
{$page = "Download Tracker";}
if ($page == "Xfire_List")
{$page = "Xfire List";}
if ($page == "Xfire_History")
{$page = "Xfire History";}
if ($page == "MIA_List")
{$page = "MIA List";}
if ($page == "HOS")
{$page = "Hall of Shame";}
if ($page == "HOS_Details")
{$page = "Hall of Shame";}
if ($page == "Wish_List")
{$page = "Wish Lists";}
if ($page == "Wish_List_Details")
{$page = "Wish Lists";}
if ($page == "PS3API_List")
{$page = "PS3 List";}
if ($page == "PS3API_Details")
{$page = "PS3 List";}
if ($page == "Clan_Categories")
{$page = "Clan List";}
if ($page == "Clan_Details")
{$page = "Clan Details";}
if ($page == "MOTM_List")
{$page = "MOTM List";}
if ($page == "Game_Categories")
{$page = "Game List";}
if ($page == "Game_List")
{$page = "Game List";}
if ($page == "Game_Details")
{$page = "Game Details";}
if ($page == "Steam_Stats")
{$page = "Steam List";}
if ($page == "Member_Stats")
{$page = "Member Stats";}
if ($page == "Member_Details")
{$page = "Member Details";}
if ($page == "Server_Categories")
{$page = "Server List";}
if ($page == "Server_Details")
{$page = "Server Details";}
if ($page == "Event_Details")
{$page = "Event Details";}
if ($page == "Donation_List")
{$page = "Donation List";}
if ($page == "Member_Status_List")
{$page = "Members Status";}
if ($page == "News_Categories")
{$page = "News Categories";}
if ($page == "News_Details")
{$page = "News Details";}
if ($page == "Item_Categories")
{$page = "Item Categories";}
if ($page == "Item_List")
{$page = "Item List";}
if ($page == "Item_SubCategories")
{$page = "Item Categories";}
if ($page == "Xbox_List")
{$page = "Xbox Stats";}
if ($page == "PayTrack")
{$page = "Payments";}
if ($page == "CMMS_Main")
{$page = "CMMS Main";}
if ($page == "CMMS_Clan_List")
{$page = "CMMS Clans";}
if ($page == "CMMS_Clan_Standings")
{$page = "CMMS Standings";}
if ($page == "CMMS_Match_History")
{$page = "CMMS History";}
if ($page == "Clan_Submit_Form")
{$page = "Submit Clan";}
if ($page == "About_CMMS")
{$page = "CMMS FAQs";}
if ($page == "CMMS_Game")
{$page = "CMMS Game";}
if ($page == "CMMS_Clan_Stats")
{$page = "CMMS Clan Page";}
if ($page == "Challenge_Clan")
{$page = "CMMS Challenge";}
if ($page == "Clan_Application")
{$page = "CMMS Application";}
if ($page == "GSC_List")
{$page = "GSC List";}
if ($page == "PlayerGT_List")
{$page = "GT List";}
if ($page == "ribbondet")
{$page = "Ribbon";}
if ($page == "meddetail")
{$page = "Medal";}
if ($page == "requestmedal")
{$page = "Medal Request";}
if ($page == "requestribbon")
{$page = "Ribbon Request";}
if ($page == "Bracket_List")
{$page = "Bracket Tracker";}
if ($page == "Bracket_Details")
{$page = "Bracket Details";}

//-----------------------------# Other Plugin Pages #-------+
if ($page == "knp")
{$page = "R.P.S.";}
if ($page == "faq")
{$page = "FAQs";}
if ($page == "bugs")
{$page = "Bug Tracker";}
if ($page == "e_version")
{$page = "Plugin Updates";}
if ($page == "deleteme")
{$page = "Delete Me";}

//---# Admins Hide Page #-------+
if ($isadmin){
$userpage = "news.php" ;
$page = " <img src='".e_PLUGIN."aacgc_floating_bar/images/admin.png'></img>";}

		    
$floatingbar_text .= "<a href='".e_BASE."user.php?id.".$userid."'>".$useravatar."".$username."</a> - <a href='".$userpage."'>".$page."</a><br>";}

//-------# Guests #-----+

$floatingbar_text .= "<br>".FBAR_09.": ".GUESTS_ONLINE."<br>";

$sql->db_Select("online", "*", "online_user_id='0' ORDER BY online_user_id ASC ");
while ($row = $sql->db_Fetch()){
extract($row);
$guestpage = $online_location;

if (ADMIN)
{$guestip = $online_ip;
$host = $e107->get_host_name($guestip);
$getbot= explode(".",$host);

	if ($getbot[1]=="inktomisearch"){$webbot="Inktomi/Yahoo";$boticon="robot_yahoo.png";}
	if ($getbot[2]=="Yahoo"){$webbot="Yahoo";$boticon="robot_yahoo.png";}
	if ($getbot[1]=="msn"){$webbot="MSN";$boticon="robot_msn.png";}
	if ($getbot[1]=="gigablast"){$webbot="Gigablast";$boticon="robot_gigablast.png";}
	if ($getbot[1]=="googlebot"){$webbot="Google";$boticon="robot_google.png";}
	if ($getbot[1]=="lycos"){$webbot="Lycos";$boticon="robot_lycos.png";}
	if ($getbot[2]=="lycos"){$webbot="Lycos";$boticon="robot_lycos.png";}
	if ($getbot[1]=="t-online"){$webbot="Infoseek";$boticon="robot_infoseek.png";}
	if ($getbot[1]=="askj"){$webbot="Teoma/Ask";$boticon="robot_askjeeves.png";}
	if ($getbot[1]=="ask"){$webbot="Teoma/Ask";$boticon="robot_askjeeves.png";}
	if ($getbot[2]=="ask"){$webbot="Teoma/Ask";$boticon="robot_askjeeves.png";}
	if ($getbot[1]=="looksmart"){$webbot="Looksmart";$boticon="robot_looksmart.png";}
	if ($getbot[1]=="cosmixcorp"){$webbot="Kosmix";$boticon="robot_kosmix.png";}
	if ($getbot[1]=="goo"){$webbot="Goo";$boticon="robot_goo.png";}
	if ($getbot[1]=="exabot"){$webbot="Exalead";$boticon="robot_exalead.png";}
	if ($getbot[4]=="become"){$webbot="Become";$boticon="robot_become.png";}
	if ($getbot[1]=="search" && $getbot[2]=="live"){$webbot="Windows Live";$boticon="robot_windows_live_search.png";}
	if ($getbot[1]=="browster"){$webbot="Browster";$boticon="robot_browster.png";}
	if ($getbot[1]=="attentio.com"){$webbot="Attentio";$boticon="robot_attentio.png";}
	if ($getbot[2]=="yahoo"){$webbot="Yahoo";$boticon="robot_yahoo.png";}
	if(ip2long($oname)>=ip2long("65.214.36.0") && ip2long($oname)<=ip2long("65.214.39.255")){$webbot="Teoma/Ask";$boticon="robot_askjeeves.png";}
	if(ip2long($oname)>=ip2long("220.181.0.0") && ip2long($oname)<=ip2long("220.181.255.255")){$webbot="SoGou";$boticon="robot_sogou.png";}
	if(ip2long($oname)>=ip2long("66.151.181.0") && ip2long($oname)<=ip2long("66.151.181.255")){$webbot="Fast Search";$boticon="robot_fastsearch.png";}
	if(ip2long($oname)>=ip2long("70.42.51.0") && ip2long($oname)<=ip2long("70.42.51.0")){$webbot="Fast Search";$boticon="robot_fastsearch.png";}
	if(ip2long($oname)>=ip2long("69.25.71.0") && ip2long($oname)<=ip2long("69.25.71.255")){$webbot="Fast Search";$boticon="robot_fastsearch.png";}
	if(ip2long($oname)>=ip2long("209.59.128.0") && ip2long($oname)<=ip2long("209.59.191.255")){$webbot="AbiLogic";$boticon="robot_abilogic.png";}
	if(ip2long($oname)>=ip2long("69.25.71.0") && ip2long($oname)<=ip2long("69.25.71.255")){$webbot="Accoona";$boticon="robot_accoona.png";}
	if(ip2long($oname)>=ip2long("81.205.0.0") && ip2long($oname)<=ip2long("81.205.255.255")){$webbot="Walhello";$boticon="robot_walhello.png";}
	if(ip2long($oname)>=ip2long("202.106.0.0") && ip2long($oname)<=ip2long("202.106.255.255")){$webbot="Baidu";$boticon="robot_baidu.png";}
	if(ip2long($oname)>=ip2long("202.108.0.0") && ip2long($oname)<=ip2long("202.108.255.255")){$webbot="Baidu";$boticon="robot_baidu.png";}
	if(ip2long($oname)>=ip2long("216.148.252.96") && ip2long($oname)<=ip2long("216.148.252.111")){$webbot="Bloglines";$boticon="robot_bloglines.png";}
	if(ip2long($oname)>=ip2long("64.152.0.0") && ip2long($oname)<=ip2long("64.159.255.255")){$webbot="BlogPulse";$boticon="robot_blogpulse.png";}
	if(ip2long($oname)>=ip2long("84.136.0.0") && ip2long($oname)<=ip2long("84.191.25.255")){$webbot="BtBot";$boticon="robot_robot.png";}
	if(ip2long($oname)>=ip2long("88.104.0.0") && ip2long($oname)<=ip2long("88.107.255.255")){$webbot="Burf";$boticon="robot_burf.png";}
	if(ip2long($oname)>=ip2long("70.84.0.0") && ip2long($oname)<=ip2long("70.87.127.255")){$webbot="CamCrawler";$boticon="robot_camcrawler.png";}
	if(ip2long($oname)>=ip2long("212.27.33.0") && ip2long($oname)<=ip2long("212.27.33.255")){$webbot="Pompos";$boticon="robot_pompos.png";}
	if(ip2long($oname)>=ip2long("133.9.0.0") && ip2long($oname)<=ip2long("133.9.255.255")){$webbot="e-Society";$boticon="robot_robot.png";}
	if(ip2long($oname)>=ip2long("64.29.176.0") && ip2long($oname)<=ip2long("64.29.191.255")){$webbot="Filangy";$boticon="robot_filangy.png";}
	if(ip2long($oname)>=ip2long("80.239.38.0") && ip2long($oname)<=ip2long("80.239.38.255")){$webbot="Findexa";$boticon="robot_findexa.png";}
	if(ip2long($oname)>=ip2long("64.210.192.0") && ip2long($oname)<=ip2long("64.210.255.255")){$webbot="Girafa";$boticon="robot_girafa.png";}
	if(ip2long($oname)>=ip2long("209.237.237.0") && ip2long($oname)<=ip2long("209.237.238.255")){$webbot="Alexa";$boticon="robot_alexa.png";}
	if(ip2long($oname)>=ip2long("87.218.0.0") && ip2long($oname)<=ip2long("87.218.255.254")){$webbot="Ipselon";$boticon="robot_ipselon.png";}
	if(ip2long($oname)>=ip2long("128.194.0.0") && ip2long($oname)<=ip2long("128.194.255.255")){$webbot="IRL crawler";$boticon="robot_robot.png";}
	if(ip2long($oname)>=ip2long("64.71.128.0") && ip2long($oname)<=ip2long("64.71.191.255")){$webbot="IRL crawler";$boticon="robot_krugle.png";}
	if(ip2long($oname)>=ip2long("82.131.195.0") && ip2long($oname)<=ip2long("82.131.195.255")){$webbot="Lapozz";$boticon="robot_lapozz.png";}
	if(ip2long($oname)>=ip2long("216.52.252.192") && ip2long($oname)<=ip2long("216.52.252.255")){$webbot="Local";$boticon="robot_local.png";}
	if(ip2long($oname)>=ip2long("64.242.88.0") && ip2long($oname)<=ip2long("64.242.88.255")){$webbot="Look Smart";$boticon="robot_looksmart.png";}
	if(ip2long($oname)>=ip2long("217.154.244.0") && ip2long($oname)<=ip2long("217.154.245.255")){$webbot="LOOP Improvements";$boticon="robot_mirago.png";}
	if(ip2long($oname)>=ip2long("213.251.136.0") && ip2long($oname)<=ip2long("213.251.143.255")){$webbot="Misterbot";$boticon="robot_misterbot.png";}
	if(ip2long($oname)>=ip2long("217.155.192.0") && ip2long($oname)<=ip2long("217.155.207.255")){$webbot="Mojeek";$boticon="robot_mojeek.png";}
	if(ip2long($oname)>=ip2long("220.72.0.0") && ip2long($oname)<=ip2long("220.87.255.255")){$webbot="Naver";$boticon="robot_naver.png";}
	if(ip2long($oname)>=ip2long("222.96.0.0") && ip2long($oname)<=ip2long("222.122.255.255")){$webbot="Naver";$boticon="robot_naver.png";}
	if(ip2long($oname)>=ip2long("67.104.0.0") && ip2long($oname)<=ip2long("67.111.255.255")){$webbot="Zoominfo";$boticon="robot_zoominfo.png";}
	if(ip2long($oname)>=ip2long("72.5.115.0") && ip2long($oname)<=ip2long("72.5.115.127")){$webbot="NimbleCrawler";$boticon="robot_nimblecrawler.png";}
	if(ip2long($oname)>=ip2long("194.224.199.0") && ip2long($oname)<=ip2long("194.224.199.25")){$webbot="noXtrum";$boticon="robot_noxtrum.png";}
	if(ip2long($oname)>=ip2long("84.9.136.0") && ip2long($oname)<=ip2long("84.9.139.255")){$webbot="Nusearch";$boticon="robot_nusearch.png";}
	if(ip2long($oname)>=ip2long("64.127.124.0") && ip2long($oname)<=ip2long("64.127.124.255")){$webbot="Omni-Explorer";$boticon="robot_robot.png";}
	if(ip2long($oname)>=ip2long("213.180.128.0") && ip2long($oname)<=ip2long("213.180.131.255")){$webbot="OnetSzukaj";$boticon="robot_onetszukaj.png";}
	if(ip2long($oname)>=ip2long("217.208.0.0") && ip2long($oname)<=ip2long("217.215.255.255")){$webbot="Picsearch";$boticon="robot_picsearch.png";}
	if(ip2long($oname)>=ip2long("81.19.64.0") && ip2long($oname)<=ip2long("81.19.66.255")){$webbot="StackRambler";$boticon="robot_stackrambler.png";}
	if(ip2long($oname)>=ip2long("66.151.181.0") && ip2long($oname)<=ip2long("66.151.181.255")){$webbot="Scirus";$boticon="robot_scirus.png";}
	if(ip2long($oname)>=ip2long("195.27.215.64") && ip2long($oname)<=ip2long("195.27.215.95")){$webbot="Seekport";$boticon="robot_robot.png";}
	if(ip2long($oname)>=ip2long("70.42.51.0") && ip2long($oname)<=ip2long("70.42.51.127")){$webbot="Sensis";$boticon="robot_sensis.png";}
	if(ip2long($oname)>=ip2long("38.0.0.0") && ip2long($oname)<=ip2long("38.255.255.255")){$webbot="Snap";$boticon="robot_snap.png";}
	if(ip2long($oname)>=ip2long("66.234.128.0") && ip2long($oname)<=ip2long("66.234.159.255")){$webbot="Snap";$boticon="robot_snap.png";}
	if(ip2long($oname)>=ip2long("81.208.26.0") && ip2long($oname)<=ip2long("81.208.26.63")){$webbot="Sygo";$boticon="robot_sygo.png";}
	if(ip2long($oname)>=ip2long("217.113.244.112") && ip2long($oname)<=ip2long("217.113.244.127")){$webbot="Ulysseek";$boticon="robot_ulysseek.png";}
	if(ip2long($oname)>=ip2long("193.252.148.0") && ip2long($oname)<=ip2long("193.252.148.255")){$webbot="Voila";$boticon="robot_voila.png";}
	if(ip2long($oname)>=ip2long("202.51.8.0") && ip2long($oname)<=ip2long("202.51.15.255")){$webbot="Wadaino";$boticon="robot_wadaino.png";}
	if(ip2long($oname)>=ip2long("64.13.128.0") && ip2long($oname)<=ip2long("64.13.191.255")){$webbot="Wink";$boticon="robot_wink.png";}
    if(ip2long($oname)>=ip2long("66.231.188.186") && ip2long($oname)<=ip2long("66.231.188.186")){$webbot="Gigablast";$boticon="robot_gigablast.png";}
    if(ip2long($oname)>=ip2long("62.113.137.5") && ip2long($oname)<=ip2long("62.113.137.5")){$webbot="Fast Search";$boticon="robot_fastsearch.png";}
    if(ip2long($oname)>=ip2long("65.214.44.29") && ip2long($oname)<=ip2long("65.214.44.29")){$webbot="Bloglines";$boticon="robot_bloglines.png";}
    if(ip2long($oname)>=ip2long("195.113.214.201") && ip2long($oname)<=ip2long("195.113.214.201")){$webbot="CESNET";$boticon="robot_robot.png";}

$bot = "<img src='".e_PLUGIN."aacgc_floating_bar/images/robots/".$boticon."' alt='".$host."' />".$webbot."";

if($webbot == ""){
$guest = "<img width='20px' height='10px' src='http://api.hostip.info/flag.php?ip=".$guestip."' alt='".$host."' /><a href='http://ip-address-lookup-v4.com/ip/".$guestip."'>".$guestip."</a>";}
else
{$guest = $bot;}
}
else
{
$guest = "<img width='20px' height='10px' src='http://api.hostip.info/flag.php?ip=".$host."' alt='".$host."' />".$host."";
if($webbot == ""){
$guestip = $online_ip;
$tmp = explode(".", $guestip);
$guestip = $tmp[0].".".$tmp[1].".xx.xx";
$guest = "<img width='20px' height='10px' src='http://api.hostip.info/flag.php?ip=".$online_ip."' alt='".$guestip."' />".$guestip."";}
else
{$guest = $guest;}
}

//--------------------------# Members #---------------------------------+

$gpage = eregi_replace(".php", "", substr(strrchr($guestpage, "/"), 1));

//--------------------------# Core Pages #-------+
if ($online_page == "log" || $online_location_page == "error")
{$gpage = "news.php";
$gpage = "News";}
if ($gpage == "index")
{$gpage = "Index";}
if ($gpage == "news")
{$gpage = "News";}
if ($gpage == "user")
{$gpage = "User";}
if ($gpage == "upload")
{$gpage = "Upload";}
if ($gpage == "download")
{$gpage = "Downloads";}
if ($gpage == "request")
{$gpage = "Download";}
if ($gpage == "page")
{$gpage = "Page";}

//--------------------------# Core Plugin Pages #-------------+
$forumlocation = explode(".",$online_location_page);
$guestpage = eregi_replace("forum_viewtopic.php.", "forum_viewtopic.php?", $guestpage);
$guestpage = eregi_replace("forum_viewforum.php.", "forum_viewforum.php?", $guestpage);
$gpage = eregi_replace("forum_viewforum.", "Forum Thread ", $gpage);
$gpage = eregi_replace("forum_viewtopic.", "Forum Post ", $gpage);
if ($gpage == "forum")
{$gpage = "Forums";}
if ($gpage == "chatbox2_control")
{$guestpage = "news.php";
$gpage = "News";}
if ($gpage == "rss")
{$gpage = "RSS Feeds";}
if ($gpage == "links")
{$gpage = "Links";}
if ($gpage == "pm")
{$gpage = "PMs";}
if ($gpage == "chat")
{$gpage = "Chat Page";}

//--------------------------# AACGC Plugin Pages #-------+
if ($gpage == "AdvRoster")
{$gpage = "Roster";}
if ($gpage == "WZone_Main")
{$gpage = "WarZone";}
if ($gpage == "WZone_Match")
{$gpage = "WarZone Match";}
if ($gpage == "WZone_Game")
{$gpage = "WarZone Game";}
if ($gpage == "WZone_Team")
{$gpage = "WarZone Team";}
if ($gpage == "WZone_Challenge")
{$gpage = "Challenge";}
if ($gpage == "WZone_Member")
{$gpage = "WarZone Profile";}
if ($gpage == "WZone_Roster")
{$gpage = "WarZone Roster";}
if ($gpage == "WZone_History")
{$gpage = "Match History";}
if ($gpage == "advmedsys_view")
{$gpage = "Ribbons & Medals";}
if ($gpage == "DL_Tracker_Details")
{$gpage = "Download Tracker";}
if ($gpage == "DL_Tracker_List")
{$gpage = "Download Tracker";}
if ($gpage == "Xfire_List")
{$gpage = "Xfire List";}
if ($gpage == "Xfire_History")
{$gpage = "Xfire History";}
if ($gpage == "MIA_List")
{$gpage = "MIA List";}
if ($gpage == "HOS")
{$gpage = "Hall of Shame";}
if ($gpage == "HOS_Details")
{$gpage = "Hall of Shame";}
if ($gpage == "Wish_List")
{$gpage = "Wish Lists";}
if ($gpage == "Wish_List_Details")
{$gpage = "Wish Lists";}
if ($gpage == "PS3API_List")
{$gpage = "PS3 List";}
if ($gpage == "PS3API_Details")
{$gpage = "PS3 List";}
if ($gpage == "Clan_Categories")
{$gpage = "Clan List";}
if ($gpage == "Clan_Details")
{$gpage = "Clan Details";}
if ($gpage == "MOTM_List")
{$gpage = "MOTM List";}
if ($gpage == "Game_Categories")
{$gpage = "Game List";}
if ($gpage == "Game_List")
{$gpage = "Game List";}
if ($gpage == "Game_Details")
{$gpage = "Game Details";}
if ($gpage == "Steam_Stats")
{$gpage = "Steam List";}
if ($gpage == "Member_Stats")
{$gpage = "Member Stats";}
if ($gpage == "Member_Details")
{$gpage = "Member Details";}
if ($gpage == "Server_Categories")
{$gpage = "Server List";}
if ($gpage == "Server_Details")
{$gpage = "Server Details";}
if ($gpage == "Event_Details")
{$gpage = "Event Details";}
if ($gpage == "Donation_List")
{$gpage = "Donation List";}
if ($gpage == "Member_Status_List")
{$gpage = "Members Status";}
if ($gpage == "News_Categories")
{$gpage = "News Categories";}
if ($gpage == "News_Details")
{$gpage = "News Details";}
if ($gpage == "Item_Categories")
{$gpage = "Item Categories";}
if ($gpage == "Item_List")
{$gpage = "Item List";}
if ($gpage == "Item_SubCategories")
{$gpage = "Item Categories";}
if ($gpage == "Xbox_List")
{$gpage = "Xbox Stats";}
if ($gpage == "PayTrack")
{$gpage = "Payments";}
if ($gpage == "CMMS_Main")
{$gpage = "CMMS Main";}
if ($gpage == "CMMS_Clan_List")
{$gpage = "CMMS Clans";}
if ($gpage == "CMMS_Clan_Standings")
{$gpage = "CMMS Standings";}
if ($gpage == "CMMS_Match_History")
{$gpage = "CMMS History";}
if ($gpage == "Clan_Submit_Form")
{$gpage = "Submit Clan";}
if ($gpage == "About_CMMS")
{$gpage = "CMMS FAQs";}
if ($gpage == "CMMS_Game")
{$gpage = "CMMS Game";}
if ($gpage == "CMMS_Clan_Stats")
{$gpage = "CMMS Clan Page";}
if ($gpage == "Challenge_Clan")
{$gpage = "CMMS Challenge";}
if ($gpage == "Clan_Application")
{$gpage = "CMMS Application";}
if ($gpage == "GSC_List")
{$gpage = "GSC List";}
if ($gpage == "PlayerGT_List")
{$gpage = "GT List";}
if ($gpage == "ribbondet")
{$gpage = "Ribbon";}
if ($gpage == "meddetail")
{$gpage = "Medal";}
if ($gpage == "requestmedal")
{$gpage = "Medal Request";}
if ($gpage == "requestribbon")
{$gpage = "Ribbon Request";}
if ($gpage == "Bracket_List")
{$gpage = "Bracket Tracker";}
if ($gpage == "Bracket_Details")
{$gpage = "Bracket Details";}

//-----------------------------# Other Plugin Pages #-------+
if ($gpage == "knp")
{$gpage = "R.P.S.";}
if ($gpage == "faq")
{$gpage = "FAQs";}
if ($gpage == "bugs")
{$gpage = "Bug Tracker";}
if ($gpage == "e_version")
{$gpage = "Plugin Updates";}
if ($gpage == "deleteme")
{$gpage = "Delete Me";}

$floatingbar_text .= "".$guest." - <a href='".$guestpage."'>".$gpage."</a><br>";}

//-------------------------------+

$floatingbar_text .= "</div>";
}
?>