<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit PLC Notes</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='plc_edit_content' class='layer'>
<h1>Edit PLC Notes</h1>
<form name='edit_plc_notes' action='../edit/edit_plc_notes_submit.php' method='post' onsubmit='return notesForm();' enctype='multipart/form-data'>";

//retrieve data form PLC Notes file
$string = "";
$notes = fopen("../../files/plc_notes.txt", "r") or die("Unable to open file!");

while (!feof($notes))
{
	$string = $string . fgets($notes);
}

fclose($notes);

echo "<textarea name='notes' id='notes' rows='50' cols='110'>".$string."</textarea>
	<input type='submit' value='Edit PLC Notes' name='submit'>
</form>
</div>
<a id='article_return' href='../plc_notes.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>