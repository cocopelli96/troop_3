<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add User</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "
<div id='main'>
<div id='edit_content' class='layer'>
<h1>Add User</h1>
<form name='upload_user' action='../upload/upload_user.php' method='post' onsubmit='return userForm();' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>
				<label for='uname'>User Name:</label>
			</td>
			<td>
				<input type='textbox' name='uname' id='uname' />
			</td>
		</tr>
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
			<td>
				<label for='phone'>User Phone Number:</label>
			</td>
			<td>
				<input type='textbox' name='phone' id='phone' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='email'>User Email address:</label>
			</td>
			<td>
				<input type='textbox' name='email' id='email' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='permission'>User Permissions:</label>
			</td>
			<td>
				<select name='permission' id='permission'>
					<option value='none'>Select a Permission Level</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	//find permission levels a user may have
	$sql = "SELECT * FROM Permission";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["perm_id"].">".$row["perm_title"]."</option>";
		}
	}
}
$conn->close();

echo "</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for='scout'>Scout:</label>
			</td>
			<td>
				<select name='scout' id='scout'>
					<option value='none'>Select a Scout</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	//find scouts a user maybe connected to
	$sql = "SELECT * FROM Scout";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["sid"].">".$row["sfn"]." ".$row["sln"]."</option>";
		}
	}
}
$conn->close();

echo "
				</select>
    		</td>
    	</tr>
    	<tr>
    		<td colspan='2'>
   				<input type='submit' value='Add User' name='submit'>
   			</td>
   		</tr>
    </table>
</form>
</div>
<a id='return' href='../account_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");

?>