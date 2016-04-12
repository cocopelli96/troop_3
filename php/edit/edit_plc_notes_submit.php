<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit PLC Notes</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit PLC Notes</h1>";

if (isset($_POST["notes"]) and !empty($_POST["notes"]))
{
	$notes = fopen("../../files/plc_notes.txt", "w") or die("Unable to open file!");

	fwrite($notes, $_POST["notes"]);
	echo "PLC Notes have been edited.";

	fclose($notes);
}
else
{
	echo "Nothing to upload.";
}

echo "
</div>
<a id='return' href='../plc_notes.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>