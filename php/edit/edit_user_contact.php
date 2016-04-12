<?php

$page_name = "Account";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit User Contact</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit User Contact</h1>
<form name='edit_user_contact' action='../edit/edit_user_contact_submit.php' method='post' onsubmit='return userContact();' enctype='multipart/form-data'>";

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
			if ($row["uid"] == $_POST["uidEdit"])
			{

				echo "
					<input type='text' name='uid' id='uid' value='".$row["uid"]."' style='display:none;'>
					<table>
						<tr>
							<td>
								<label for='phone'>Phone Number:</label>
							</td>
							<td>
								<input type='textbox' name='phone' id='phone' ";
	
					$sql1 = "SELECT * FROM AccountContact WHERE uid = ".$row["uid"]." and contact_id = 22";
					$result1 = $conn->query($sql1);

					if ($result1->num_rows > 0) {
						// output data of each row
						while($row1 = $result1->fetch_assoc()) {
							echo "value='".$row1["acct_contact"]."'";
						}
					}

				echo " />
							</td>
						</tr>
						<tr>
							<td>
								<label for='email'>Email address:</label>
							</td>
							<td>
								<input type='textbox' name='email' id='email' ";
	
					$sql1 = "SELECT * FROM AccountContact WHERE uid = ".$row["uid"]." and contact_id = 11";
					$result1 = $conn->query($sql1);

					if ($result1->num_rows > 0) {
						// output data of each row
						while($row1 = $result1->fetch_assoc()) {
							echo "value='".$row1["acct_contact"]."'";
						}
					}

				echo " />
							</td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type='submit' value='Edit User Contact' name='submit'>
							</td>
						</tr>
					</table>";
	
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
</form>
</div>
<a id='return' href='../account.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>
