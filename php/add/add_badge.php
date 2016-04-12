<?php

$page_name = "Merit Badges";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Badge</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content
echo "
<div id='main'>
<div id='add_form' class='layer'>
<h1>Add Merit Badge</h1>
<form name='upload_badge' onsubmit='return badgeForm();' action='../upload/upload_badge.php' method='post' enctype='multipart/form-data'>
	Badge Title:
    <input type='text' name='badgeTitle' id='badgeTitle'>
    <br />
    <input type='submit' value='Add Badge' name='submit'>
</form>
</div>
<a id='return' href='../badges.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");

?>