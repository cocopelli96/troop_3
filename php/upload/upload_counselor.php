<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Counselor</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='add_content' class='layer'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error uploading the counselor.";
} 
else
{
	//upload new counselor
	$sql = "INSERT INTO counselor VALUES(".$_POST["adults"].",".$_POST["badges"].")";
	$result = $conn->query($sql);
	
	echo "The counselor has been uploaded.";
}
$conn->close();

//end page setup
echo "
</div>
<a id='return' href='../badges.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>