<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Floating Bar              #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

$eplug_name = "AACGC Floating Bar";
$eplug_version = "1.6";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Shows Floating Bar on your website, can adjust distand from top/left and supports BBcode.  Floating Bar Code sorce from Dynamic Drive";
$eplug_compatible = "e107 v7+";
$eplug_readme = "";
$eplug_compliant = true;
$eplug_status = false;
$eplug_latest = false;

$eplug_folder = "aacgc_floating_bar";

$eplug_menu_name = "AACGC Floating Bar";

$eplug_conffile = "admin_main.php";

$eplug_icon = $eplug_folder . "/images/icon_32.png";
$eplug_icon_small = $eplug_folder . "/images/icon_16.png";
$eplug_icon_custom = e_PLUGIN. "aacgc_floating_bar/images/icon_64.png";

$eplug_caption = "AACGC Floating Bar";

$eplug_prefs = array(
"floatingbar_text" => "",
"floatingbar_width" => "200",
"floatingbar_border" => "0",
"floatingbar_bordercolor" => "",
"floatingbar_bgcolor" => "",
"floatingbar_locx" => "0",
"floatingbar_locy" => "0",
"floatingbar_alttables" => "1",
"floatingbar_login" => "0",
"floatingbar_extended" => "0",
"floatingbar_lastseen" => "0",
"floatingbar_enable_goldorbs" => "0",
);

$eplug_table_names = "";
$eplug_tables = "";

$eplug_link = false;
$eplug_link_name = "";
$eplug_link_url = "";

$eplug_done = "The plugin is now installed.  Go to menus and activate floating bar menu.  No menu is actually displayed.";

$upgrade_add_prefs = "";
$upgrade_remove_prefs = "";
$upgrade_alter_tables = "";
$eplug_upgrade_done = "Upgrade Complete";

?>	

