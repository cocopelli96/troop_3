<?php

$page_name = "Account";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit Password</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit Password</h1>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql = "SELECT * FROM UserAccount;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["uid"] == $_POST["uid"])
			{
				$sql1 = "UPDATE UserAccount SET pass = '".$_POST["pass"]."' WHERE uid = ".$_POST["uid"].";";
				$result1 = $conn->query($sql1);
			
				echo "Password has been changed.";
			}
		}
	}
	else
	{
		echo "No user exists to edit.";
	}
}
$conn->close();

echo "
</div>
<a id='return' href='../account.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>
