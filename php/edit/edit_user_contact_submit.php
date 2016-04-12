<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit User Contact</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit User Contact</h1>";

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
				$sql1 = "SELECT * FROM AccountContact WHERE uid = ".$_POST["uid"]." and contact_id = 22";
				$result1 = $conn->query($sql1);
			
				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["phone"]) and !empty($_POST["phone"]))
						{
							if ($_POST["phone"] != $row1["acct_contact"])
							{
								$sql0 = "UPDATE AccountContact SET acct_contact = '".$_POST["phone"]."' WHERE uid = ".$_POST["uid"];
								$result0 = $conn->query($sql0);
								echo "Edit user phone.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM AccountContact WHERE uid = ".$_POST["uid"]." and contact_id = 22";
							$result0 = $conn->query($sql0);
							echo "Delete user phone.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO AccountContact VALUES(".$_POST["uid"].",22,'" .$_POST["phone"]."')";
					$result0 = $conn->query($sql0);
					echo "Create user phone.";
				}
			
				$sql1 = "SELECT * FROM AccountContact WHERE uid = ".$_POST["uid"]." and contact_id = 11";
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["email"]) and !empty($_POST["email"]))
						{
							if ($_POST["email"] != $row1["acct_contact"])
							{
								$sql0 = "UPDATE AccountContact SET acct_contact = '".$_POST["email"]."' WHERE uid = ".$_POST["uid"];
								$result0 = $conn->query($sql0);
								echo "Edit user email.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM AccountContact WHERE uid = ".$_POST["uid"]." and contact_id = 11";
							$result0 = $conn->query($sql0);
							echo "Delete user email.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO AccountContact VALUES(".$_POST["uid"].",11,'" .$_POST["email"]."')";
					$result0 = $conn->query($sql0);
					echo "Create user email.";
				}
	
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
