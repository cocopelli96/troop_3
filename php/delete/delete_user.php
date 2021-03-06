<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete User</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='add_content' class='layer'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error deleting the user.";
} 
else
{
	$sql = "SELECT * FROM UserAccount;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["uid"] == $_POST["uidDelete"])
			{
				$sql = "DELETE FROM AccountContact WHERE uid = ".$row["uid"];
				$result = $conn->query($sql);
				break;
			}
		}
		echo "Contacts deleted.";
		
		$sql = "SELECT * FROM UserScout;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["uid"] == $_POST["uidDelete"])
				{
					$sql = "DELETE FROM UserScout WHERE uid = ".$row["uid"];
					$result = $conn->query($sql);
					break;
				}
			}
		
			echo "Scout connections deleted.";
				
			$sql = "SELECT * FROM UserAccount;";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row["uid"] == $_POST["uidDelete"])
					{
						$sql = "DELETE FROM UserAccount WHERE uid = ".$row["uid"];
						$result = $conn->query($sql);
						break;
					}
				}
		
				echo "User deleted.";
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
<a id='return' href='../account_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>
