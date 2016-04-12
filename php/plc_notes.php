<?php

$page_name = "PLC Notes";

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: PLC Notes</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%;float:left;'>PLC Notes</h1>";

if ($perm_level > 2)
{
	echo "<a class='edit_button' href='./edit/edit_plc_notes.php'>Edit Notes</a>";
}

echo "<div id='notes_content' class='layer'>";

$notes = fopen("../files/plc_notes.txt", "r") or die("Unable to open file!");

while (!feof($notes))
{
	echo fgets($notes);
}

fclose($notes);
//echo readfile("../files/plc_notes.txt");
// fopen("../files/","a");
// fopen("../files/","w");
// fwrite();
// fgetc();
// fclose();

echo "
</div>
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>