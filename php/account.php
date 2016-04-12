<?php

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Account</title>
";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 id='head' style='width:50%; float:left;'>User Account</h1>
";
		
if ($perm_level == 4)
{
	echo "<a class='edit_button' href='account_manage.php'>Manage Accounts</a>";
} 

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql = "SELECT * FROM UserAccount, Permission where UserAccount.perm_id = Permission.perm_id ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["uname"] == $_COOKIE["username"])
			{
				$uid = $row["uid"];
				echo "
				<table id='account' class='table'>
					<tbody>
						<tr>
							<td>User Name:</td>
							<td>".$row["uname"]."</td>
							<td id='edit_user_td'></td>
						</tr>
						<tr>
							<td>User Password:</td>
							<td>**************</td>
							<td id='edit_user_td'>
								<form name='edit_user_form' action='./edit/edit_password.php' method='post'>
									<input type='text' name='uidEdit' id='uidEdit' value='" . $row["uid"] ."' style='display:none;'>
									<button type='submit' class='table_button'>Edit</button>
								</form>
							</td>
						</tr>
						<tr>
							<td>User Permissions:</td>
							<td>".$row["perm_title"]."</td>
							<td id='edit_user_td'></td>
						</tr>";
				break;
			}
		}
	}

	$sql = "SELECT * FROM AccountContact where uid = ". $uid;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["contact_id"] == 11)
			{
				echo "
					<tr>
						<td>User Email:</td>
						<td>".$row["acct_contact"];
			}
			else if ($row["contact_id"] == 22)
			{
				echo "
					<tr>
						<td>User Phone Number:</td>
						<td>".$row["acct_contact"];
			}
		
			echo "</td>
					<td id='edit_user_td'>
						<form name='edit_user_contact_form' action='./edit/edit_user_contact.php' method='post'>
							<input type='text' name='uidEdit' id='uidEdit' value='" . $row["uid"] ."' style='display:none;'>
							<button type='submit' class='table_button'>Edit</button>
						</form>
					</td>
				</tr>";
		}
	}

	$sql = "SELECT * FROM UserScout where uid = ". $uid;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$conn2 = new mysqli("localhost", "root", "root", "rosterdb");
			if ($conn2->connect_error)
			{
				echo "
					<tr>
						<td>Connected Scout:</td>
						<td>This user account is not connected to a scout.</td>
						<td></td>
				</tr>";
			}
			else
			{
				$sql1 = "SELECT * FROM Scout WHERE sid = ".$row["sid"];
				$result1 = $conn2->query($sql1);
			
				if ($result1->num_rows > 0) {
					while($row1 = $result1->fetch_assoc()) {
						echo "
							<tr>
								<td>Connected Scout:</td>
								<td>".$row1["sfn"]." ".$row1["sln"]."</td>
								<td></td>
						</tr>";
					}
				}
				else
				{
					echo "
						<tr>
							<td>Connected Scout:</td>
							<td>This user account is not connected to a scout.</td>
							<td></td>
					</tr>";
				}
			}
		}
	}
	else
	{
		echo "
			<tr>
				<td>Connected Scout:</td>
				<td>This user account is not connected to a scout.</td>
				<td></td>
		</tr>";
	}

	echo "
		</tbody>
	</table>
	";
}
$conn->close();

echo "
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>
