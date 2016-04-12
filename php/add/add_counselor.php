<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Counselor</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content
echo "
<div id='main'>
<div id='add_form' class='layer'>
<h1>Add Merit Badge Counselor</h1>
<form name='upload_counselor' onsubmit='return counselorForm();' action='../upload/upload_counselor.php' method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>
				<label for='badges'>Merit Badge:</label>
			</td>
			<td>
				<select name='badges' id='badges'>
					<option value='none'>Select a Badge</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT * FROM badges ORDER BY badge_id";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["badge_id"].">".$row["badge_name"]."</option>";
		}
	}
}
$conn->close();

echo "</select>
			</td>
			<td>
				<a id='new_badge' href='add_badge.php'>New Badge</a>
			</td>
		</tr>
		<tr>
			<td>
				<label for='adults'>Counselor:</label>
			</td>
			<td>
				<select name='adults' id='adults'>
					<option value='none'>Select a Counselor</option>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT sid, concat(sfn, ' ', sln) as name, pname, rank_title FROM scout, rank, patrol WHERE patrol.patrol_id = scout.patrol_id and rank.rank_id = scout.rank_id ORDER BY sid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["pname"] == "Adult" and $row["rank_title"] == "Adult")
			{
				echo "<option value=".$row["sid"].">".$row["name"]."</option>";
			}
		}
	}
}
$conn->close();

echo "
				</select>
    		</td>
    		<td>
    		</td>
    	</tr>
    	<tr>
    		<td colspan='3'>
   				<input type='submit' value='Add Counselor' name='submit'>
   			</td>
   		</tr>
    </table>
</form>
</div>
<a id='return' href='../badges.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");

?>