<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Patrol</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "
<div id='main'>
<div id='add_form' class='layer'>
<h1>Add Patrol</h1>
<form name='upload_patrol' onsubmit='return patrolForm();' action='../upload/upload_patrol.php' method='post' enctype='multipart/form-data'>
	<label for='pname'>Patrol Name:</label>
	<input type='textbox' name='pname' id='pname' maxlength='45' />
	<input type='submit' value='Add Patrol' name='submit' />
</form>
</div>
<a id='return' href='../roster_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");

?>