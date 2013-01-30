<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Floating Bar              #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


require_once("../../class2.php");
if (!getperms("P"))
{
    header("location:" . e_HTTP . "index.php");
    exit;
} 
require_once(e_ADMIN . "auth.php");
require_once(e_HANDLER . "userclass_class.php");
include_lan(e_PLUGIN."aacgc_floating_bar/languages/".e_LANGUAGE.".php");

//-------------------------# BB Code Support #----------------------------------------------

include(e_HANDLER."ren_help.php");

//------------------------------------------------------------------------------------------

if (isset($_POST['update']))
{ 
    $pref['floatingbar_text'] = $tp->toDB($_POST['floatingbar_text']);
    $pref['floatingbar_width'] = $_POST['floatingbar_width'];
    $pref['floatingbar_border'] = $_POST['floatingbar_border'];
    $pref['floatingbar_bordercolor'] = $_POST['floatingbar_bordercolor'];
    $pref['floatingbar_bgcolor'] = $_POST['floatingbar_bgcolor'];

    $pref['floatingbar_locx'] = $_POST['floatingbar_locx'];
    $pref['floatingbar_locy'] = $_POST['floatingbar_locy'];


if (isset($_POST['floatingbar_alttables'])) 
{$pref['floatingbar_alttables'] = 1;}
else
{$pref['floatingbar_alttables'] = 0;}

if (isset($_POST['floatingbar_login'])) 
{$pref['floatingbar_login'] = 1;}
else
{$pref['floatingbar_login'] = 0;}

if (isset($_POST['floatingbar_extended'])) 
{$pref['floatingbar_extended'] = 1;}
else
{$pref['floatingbar_extended'] = 0;}

if (isset($_POST['floatingbar_lastseen'])) 
{$pref['floatingbar_lastseen'] = 1;}
else
{$pref['floatingbar_lastseen'] = 0;}

if (isset($_POST['floatingbar_enable_goldorbs'])) 
{$pref['floatingbar_enable_goldorbs'] = 1;}
else
{$pref['floatingbar_enable_goldorbs'] = 0;}

if (isset($_POST['floatingbar_pms'])) 
{$pref['floatingbar_pms'] = 1;}
else
{$pref['floatingbar_pms'] = 0;}

if (isset($_POST['floatingbar_stats'])) 
{$pref['floatingbar_stats'] = 1;}
else
{$pref['floatingbar_stats'] = 0;}

    save_prefs();

$float_text .= "Settings Saved";
}


//--------------------------------------------------------------------


$float_text .= "<form method='post' action='".e_SELF."' id='floatform'>
<table class='fborder' width='100%'><tr>";



//-------------------------------# Floating Bar #-----------------------------------
$float_text .= "
<tr>
<td style='width:30%' class='forumheader3' colspan=2><b>".AFBAR_01."</b></td>
</tr>";


$float_text .= "
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_02.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_alttables'] == 1 ? "<input type='checkbox' name='floatingbar_alttables' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_alttables' value='0' />")." (".AFBAR_03.")</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_04.":</td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='5' name='floatingbar_locx' value='" . $pref['floatingbar_locx'] . "' />px</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_05.":</td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='5' name='floatingbar_locy' value='" . $pref['floatingbar_locy'] . "' />px</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_06.":</td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='10' name='floatingbar_width' value='" . $pref['floatingbar_width'] . "' />px</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_07.":</td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='5' name='floatingbar_border' value='" . $pref['floatingbar_border'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_08.":</td>
<td style='width:70%' class='forumheader3'>#<input class='tbox' type='text'  size='15' name='floatingbar_bordercolor' value='" . $pref['floatingbar_bordercolor'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_09.":</td>
<td style='width:70%' class='forumheader3'>#<input class='tbox' type='text'  size='15' name='floatingbar_bgcolor' value='" . $pref['floatingbar_bgcolor'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_10.":</td>
<td style='width:70%' class='forumheader3'><textarea class='tbox' name='floatingbar_text' rows='15' cols='75' style='width:95%' onselect='storeCaret(this);' onclick='storeCaret(this);' onkeyup='storeCaret(this);'>".$pref['floatingbar_text']."</textarea><br>";

$float_text .= display_help('helpb', 'forum');

$float_text .= "</td></tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_14.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_login'] == 1 ? "<input type='checkbox' name='floatingbar_login' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_login' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_15.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_extended'] == 1 ? "<input type='checkbox' name='floatingbar_extended' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_extended' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_16.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_lastseen'] == 1 ? "<input type='checkbox' name='floatingbar_lastseen' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_lastseen' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_18.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_pms'] == 1 ? "<input type='checkbox' name='floatingbar_pms' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_pms' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_19.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_stats'] == 1 ? "<input type='checkbox' name='floatingbar_stats' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_stats' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_17.":</td>
<td colspan=2 class='forumheader3'>".($pref['floatingbar_enable_goldorbs'] == 1 ? "<input type='checkbox' name='floatingbar_enable_goldorbs' value='1' checked='checked' />" : "<input type='checkbox' name='floatingbar_enable_goldorbs' value='0' />")."</td>
</tr>";



//------------------------------------------------------------------------------------
$float_text .= "
<tr>
<td colspan='2' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='".AFBAR_11."' class='button' />\n
</td>
</tr></table></form>";





$ns->tablerender("AACGC Floating Bar(".AFBAR_01.")", $float_text);

require_once(e_ADMIN . "footer.php");
