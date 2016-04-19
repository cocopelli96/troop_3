<?php

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Account Manager</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<h1 style='width:50%; float:left;'>Account Manager</h1>
<a class='edit_button' href='./add/add_user.php'>Add User</a>
<div id='table_holder'>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	//begin table structure
	echo "
			<table border='2' class='table'>
				<thead>
					<tr>
						<td>User Name</td>
						<td>User Password</td>
						<td>User Permissions</td>
						<td>User Phone Number</td>
						<td>User Email Address</td>
						<td>Scout</td>
						<td style='min-width:auto;'>Edit</td>
						<td style='min-width:auto;'>Delete</td>
					</tr>
				</thead>
				<tbody>";
				
	//search database for user accounts
	$sql0 = "SELECT * FROM UserAccount, Permission where UserAccount.perm_id = Permission.perm_id ORDER BY uid;";
	$result0 = $conn->query($sql0);
	
	//fill table with results of query
	$filled = false;		
	if ($result0->num_rows > 0) {
		// output data of each row
		while($row0 = $result0->fetch_assoc()) {
			$filled = true;

			//fill table with user information
			echo "
			<tr>
				<td>".$row0["uname"]."</td>
				<td>*************</td>
				<td>".$row0["perm_title"]."</td>
				<td>";
		
			//retrieve user phone number
			$sql2 = "SELECT * FROM AccountContact WHERE AccountContact.uid = ".$row0["uid"]." and AccountContact.contact_id = 22";
			$result2 = $conn->query($sql2);

			if ($result2->num_rows > 0) {
				// output data of each row
				while($row2 = $result2->fetch_assoc()) {
					if ($row0["uid"] == $row2["uid"])
					{
						echo $row2["acct_contact"];
					}
				}
			}
			else
			{
				echo "No phone numbers for this user.";
			}
	
			echo "</td><td>";
		
			//retrieve user email address
			$sql2 = "SELECT * FROM AccountContact WHERE AccountContact.uid = ".$row0["uid"]." and AccountContact.contact_id = 11";
			$result2 = $conn->query($sql2);

			if ($result2->num_rows > 0) {
				// output data of each row
				while($row2 = $result2->fetch_assoc()) {
					if ($row0["uid"] == $row2["uid"])
					{
						echo $row2["acct_contact"];
					}
				}
			}
			else
			{
				echo "No emails for this user.";
			}
		
			echo "</td><td>";
		
			//retrieve scout connected to user account
			$sql2 = "SELECT * FROM UserScout WHERE UserScout.uid = ".$row0["uid"];
			$result2 = $conn->query($sql2);

			if ($result2->num_rows > 0) {
				// output data of each row
				while($row2 = $result2->fetch_assoc()) {
					if ($row0["uid"] == $row2["uid"])
					{
						$conn2 = new mysqli("localhost", "root", "root", "rosterdb");
					
						if ($conn2->connect_error) {
							echo "Failed connection to rosterdb.";
						} 
						else
						{
					
							$sql3 = "SELECT * FROM Scout";
							$result3 = $conn2->query($sql3);

							if ($result3->num_rows > 0) {
								// output data of each row
								while($row3 = $result3->fetch_assoc()) {
									if ($row3["sid"] == $row2["sid"])
									{
										echo $row3["sfn"]." ".$row3["sln"];
									}
								}
							}
						}
						$conn2->close();
					}
				}
			}
			else
			{
				echo "User is not connected to a scout.";
			}
	
			//populate with buttons to edit and delete records
			echo "</td>
				<td style='min-width:auto;'>
					<form name='edit_user_form' action='./edit/edit_user_full.php' method='post'>
						<input type='text' name='uidEdit' id='uidEdit' value='" . $row0["uid"] ."' style='display:none;'>
						<button type='submit' class='table_button'>Edit</button>
					</form>
				</td>
				<td style='min-width:auto;'>
					<form name='delete_user_form' action='./delete/delete_user.php' method='post' onsubmit='return confirmDelete(\"user\");'>
						<input type='text' name='uidDelete' id='uidDelete' value='" . $row0["uid"] ."' style='display:none;'>
						<button type='submit' class='table_button'>Delete</button>
					</form>
				</td>
			</tr>";

		}
	
		//if there was no data to fill the table alert the user
		if ($filled == false)
		{
			echo "<tr><td colspan='8'>There are no users at this time.</td><tr>";
		}
	} else {
		echo "<tr><td colspan='8'>There are no users at this time.</td><tr>";
	}

	//end table structure
	echo "
	</tbody>
	</table>";
}
$conn->close();

echo "</div>
</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>
