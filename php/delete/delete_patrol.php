<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete Patrol</title>";

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
	echo "There was an error deleting the counselor.";
} 
else
{
	$sql = "SELECT * FROM Scout WHERE patrol_id = ".$_POST["patrolDelete"].";";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$sql = "SELECT * FROM Patrol;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["patrol_id"] == $_POST["patrolDelete"])
				{
					$sql = "DELETE FROM Patrol WHERE patrol_id = ".$row["patrol_id"];
					$result = $conn->query($sql);
					break;
				}
			}
		
			echo "Patrol deleted.";
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
<a id='return' href='../roster_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>
