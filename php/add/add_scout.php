<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Scout</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content
echo "
<div id='main'>
<div id='edit_content' class='layer'>
<h1>Add Scout</h1>
<form name='upload_scout' action='../upload/upload_scout.php' method='post' onsubmit='return scoutForm();' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>
				<label for='sfn'>Scout First Name:</label>
			</td>
			<td>
				<input type='textbox' name='sfn' id='sfn' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='sln'>Scout Last Name:</label>
			</td>
			<td>
				<input type='textbox' name='sln' id='sln' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='street'>Street:</label>
			</td>
			<td>
				<input type='textbox' name='street' id='street' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='city'>City:</label>
			</td>
			<td>
				<input type='textbox' name='city' id='city' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='state'>State:</label>
			</td>
			<td>
				<input type='textbox' name='state' id='state' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='zip'>Zip Code:</label>
			</td>
			<td>
				<input type='textbox' name='zip' id='zip' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='phone1'>Home Phone Number:</label>
			</td>
			<td>
				<input type='textbox' name='phone1' id='phone1' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='phone2'>Cell Phone Number:</label>
			</td>
			<td>
				<input type='textbox' name='phone2' id='phone2' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='email'>Email address:</label>
			</td>
			<td>
				<input type='textbox' name='email' id='email' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='rank'>Rank:</label>
			</td>
			<td>
				<select name='rank' id='rank'>
					<option value='none'>Select a Rank</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT * FROM Rank";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["rank_id"].">".$row["rank_title"]."</option>";
		}
	}
}
$conn->close();

echo "</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for='leadership'>Leadership Position:</label>
			</td>
			<td>
				<select name='leadership' id='leadership'>
					<option value='none'>Select a Leadership Position</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT * FROM LeadershipPosition";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["lead_id"].">".$row["lead_title"]."</option>";
		}
	}
}
$conn->close();

echo "</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for='patrols'>Patrol:</label>
			</td>
			<td>
				<select name='patrols' id='patrols'>
					<option value='none'>Select a Patrol</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT * FROM Patrol";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["patrol_id"].">".$row["pname"]."</option>";
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
   				<input type='submit' value='Add Scout' name='submit'>
   			</td>
   		</tr>
    </table>
</form>
</div>
<a id='return' href='../roster_manage.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");

?>