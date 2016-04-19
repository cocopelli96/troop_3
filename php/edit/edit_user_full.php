<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit User</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit User</h1>
<form name='edit_user_full' action='../edit/edit_user_full_submit.php' method='post' onsubmit='return userForm();' enctype='multipart/form-data'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	//find selected scout
	$sql = "SELECT * FROM UserAccount, Permission WHERE Permission.perm_id = UserAccount.perm_id;";
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
					<label for='uname'>User Name:</label>
				</td>
				<td>
					<input type='textbox' name='uname' id='uname' value='".$row["uname"]."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='pass'>Password:</label>
				</td>
				<td>
					<input type='password' name='pass' id='pass' value='".$row["pass"]."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='pass_check'>Confirm Password:</label>
				</td>
				<td>
					<input type='password' name='pass_check' id='pass_check' value='".$row["pass"]."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='phone'>User Phone Number:</label>
				</td>
				<td>
					<input type='textbox' name='phone' id='phone' ";
	
		//find user's contact
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
					<label for='email'>User Email address:</label>
				</td>
				<td>
					<input type='textbox' name='email' id='email' ";
	
		//find user's contact
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
				<td>
					<label for='permission'>User Permissions:</label>
				</td>
				<td>
					<select name='permission' id='permission'>
						<option value='none'>Select a Permission Level</option>";
	
		//find user's permission level
		$sql1 = "SELECT * FROM Permission";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "<option value='".$row1["perm_id"]."'";
			
				if ($row1["perm_id"] == $row["perm_id"])
				{
					echo " selected='selected'";
				}
			
				echo ">".$row1["perm_title"]."</option>";
			}
		}

	echo "</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for='scout'>Scout:</label>
				</td>";
	
		$conn2 = new mysqli("localhost", "root", "root", "rosterdb");
		if ($conn2->connect_error)
		{
			echo "<td>Failed connect with rosterdb.</td>";
		}
		else
		{
			echo"<td>
					<select name='scout' id='scout'>
						<option value='none'>Select a Scout</option>";
	
			//find scout connected to user
			$sql1 = "SELECT * FROM UserScout";
			$result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
				// output data of each row
				while($row1 = $result1->fetch_assoc()) {
					if ($row["uid"] == $row1["uid"])
					{
						$sid = $row1["sid"];
					}
				}
			}
			else
			{
				$sid = 0;
			}
	
			$sql3 = "SELECT * FROM Scout";
			$result3 = $conn2->query($sql3);

			if ($result3->num_rows > 0) {
				// output data of each row
				while($row3 = $result3->fetch_assoc()) {
					echo "<option value='".$row3["sid"]."'";
			
					if ($row3["sid"] == $sid)
					{
						echo " selected='selected'";
					}
			
					echo ">".$row3["sfn"]." ".$row3["sln"]."</option>";
				}
			}
		
			echo "</select>
				</td>";
		}
		$conn2->close();

	echo "</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' value='Edit User' name='submit'>
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
<a id='return' href='../account_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>
