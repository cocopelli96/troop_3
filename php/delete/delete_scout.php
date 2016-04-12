<?php

$page_name = "Roster";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete Scout</title>";

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
	echo "There was an error deleting the scout.";
} 
else
{
	$sql = "SELECT * FROM scoutcontact;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["sid"] == $_POST["sidDelete"])
			{
				$sql = "DELETE FROM scoutcontact WHERE sid = ".$row["sid"];
				$result = $conn->query($sql);
				break;
			}
		}
		echo "Contacts deleted.";
		
		$sql = "SELECT * FROM address;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["sid"] == $_POST["sidDelete"])
				{
					$sql = "DELETE FROM address WHERE sid = ".$row["sid"];
					$result = $conn->query($sql);
					break;
				}
			}
		
			echo "Address deleted.";
				
			$sql = "SELECT * FROM scout;";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row["sid"] == $_POST["sidDelete"])
					{
						$sql = "DELETE FROM scout WHERE sid = ".$row["sid"];
						$result = $conn->query($sql);
						break;
					}
				}
		
				echo "Scout deleted.";
			} else {
				echo "Failed to delete.";
			}
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

//include footer and closing content
include("../../include/footer_3.inc");
?>