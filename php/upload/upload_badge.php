<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Badge</title>";

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
	echo "There was an error uploading the badge.";
} 
else
{
	$sql = "SELECT * FROM Badges ORDER BY badge_id;";
	$result = $conn->query($sql);

	$count = 1;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["badge_id"] != $count)
			{
				break;
			}
			$count++;
		}
	}

	//upload new merit badge
	$sql = "INSERT INTO Badges VALUES(".$count.",'".$_POST["badgeTitle"]."')";
	$result = $conn->query($sql);
	
	echo "The badge ".$_POST["badgeTitle"]." has been uploaded.";
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
