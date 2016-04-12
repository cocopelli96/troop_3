<?php

$page_name = "Merit Badges";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete Badge</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='add_content' class='layer'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error deleting the badge.";
} 
else
{
	$sql = "SELECT badge_id, sid FROM counselor;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["badge_id"] == $_POST["badgeDelete"])
			{
				$sql = "DELETE FROM counselor WHERE badge_id = ".$row["badge_id"];
				$result = $conn->query($sql);
				break;
			}
		}
		echo "Counselors deleted.";
		
		$sql = "SELECT badge_id FROM badges;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["badge_id"] == $_POST["badgeDelete"])
				{
					$sql = "DELETE FROM badges WHERE badge_id = ".$row["badge_id"];
					$result = $conn->query($sql);
					break;
				}
			}
		
			echo "Badge deleted.";
		} else {
			echo "Failed to delete.";
		}
	} else {
		echo "Failed to delete.";
	}
}
$conn->close();

//end page setup
echo "
</div>
<a id='return' href='../badges.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>