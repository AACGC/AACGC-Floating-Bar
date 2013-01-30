<?php

global $tp;
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;

if ($pref['floatingbar_enable_goldorbs'] == "1")
{$gold_obj = new gold();}

include_lan(e_PLUGIN."aacgc_floating_bar/languages/".e_LANGUAGE.".php");
require_once(e_PLUGIN."aacgc_floating_bar/script.php");

if ($pref['floatingbar_alttables'] == "1")
{$themea = "forumheader3";}
else
{$themea = "";}

//----------------------------------# Bar Start #---------------------------------------------------------------------------+
$floatingbar_text .= "
<div id='topbar' class='".$themea."'>
<a href='' onClick='closebar(); return false'><img src='".e_PLUGIN."aacgc_floating_bar/images/close.png' alt='Close This Bar' /></a>";

//----------# Login / User Buttons Section #------+
if($pref['floatingbar_login'] == "1")
{require(e_PLUGIN."aacgc_floating_bar/login.php");}

//----------# Text Section from admin area #---------------------------+
$floatingbar_text .= "".$tp->toHTML($pref['floatingbar_text'], TRUE)."";
	
//----------# Private Messages #-----------------------------+
if($pref['floatingbar_pms'] == "1")
{require(e_PLUGIN."aacgc_floating_bar/private_messages.php");}

//----------# Online Extended #--------------------+
if($pref['floatingbar_extended'] == "1")
{require(e_PLUGIN."aacgc_floating_bar/online.php");}

//----------# Last Seen # ---------------------------+ 
if($pref['floatingbar_lastseen'] == "1")
{require(e_PLUGIN."aacgc_floating_bar/lastseen.php");}

//----------# Most Online Ever # -----------------+ 
if($pref['floatingbar_stats'] == "1")
{require(e_PLUGIN."aacgc_floating_bar/stats.php");}

//----------------------------------# Bar End #---------------------------------------------------------------------------+
$floatingbar_text .= "".$rs -> form_close()."
</div>";

print $floatingbar_text;

?>


