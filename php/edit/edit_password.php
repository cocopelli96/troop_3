<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit Password</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit Password</h1>
<form name='edit_password' action='../edit/edit_password_submit.php' method='post' onsubmit='return userPassword();' enctype='multipart/form-data'>";

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
				<input type='text' name='uid' id='uid' value='".$_POST["uidEdit"]."' style='display:none;'>
				<table>
					<tr>
						<td>
							<label for='pass'>Password:</label>
						</td>
						<td>
							<input type='password' name='pass' id='pass' />
						</td>
					</tr>
					<tr>
						<td>
							<label for='pass_check'>Confirm Password:</label>
						</td>
						<td>
							<input type='password' name='pass_check' id='pass_check' />
						</td>
					</tr>
					<tr>
						<td colspan='2'>
							<input type='submit' value='Change Password' name='submit' />
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
