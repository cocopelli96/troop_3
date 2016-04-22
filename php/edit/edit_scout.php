<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit Scout</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit Scout</h1>
<form name='edit_scout' action='../edit/edit_scout_submit.php' method='post' onsubmit='return scoutForm();' enctype='multipart/form-data'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	//find selected scout
	$sql = "SELECT Scout.sid, sfn, sln, aid, street, city, state, zip, lead_id, rank_id, patrol_id FROM Scout, Address WHERE Scout.sid = Address.sid;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["sid"] == $_POST["sidEdit"])
			{

	echo "
		<input type='text' name='sid' id='sid' value='".$row["sid"]."' style='display:none;'>
		<table>
			<tr>
				<td>
					<label for='sfn'>Scout First Name:</label>
				</td>
				<td>
					<input type='textbox' name='sfn' id='sfn' value='".$row["sfn"]."' maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='sln'>Scout Last Name:</label>
				</td>
				<td>
					<input type='textbox' name='sln' id='sln' value='".$row["sln"]."' maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='street'>Street:</label>
				</td>
				<td>
					<input type='textbox' name='street' id='street' value='".$row["street"]."' maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='city'>City:</label>
				</td>
				<td>
					<input type='textbox' name='city' id='city' value='".$row["city"]."' maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='state'>State:</label>
				</td>
				<td>
					<input type='textbox' name='state' id='state' value='".$row["state"]."' maxlength='2' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='zip'>Zip Code:</label>
				</td>
				<td>
					<input type='textbox' name='zip' id='zip' value='".$row["zip"]."' maxlength='5' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='phone1'>Home Phone Number:</label>
				</td>
				<td>
					<input type='textbox' name='phone1' id='phone1' ";
	
		//find scout's contact
		$sql1 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE sid = ".$row["sid"]." and cid = 111";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "value='".$row1["contact_val"]."'";
			}
		}

	echo " maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='phone2'>Cell Phone Number:</label>
				</td>
				<td>
					<input type='textbox' name='phone2' id='phone2' ";
	
		//find scout's contact
		$sql1 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE sid = ".$row["sid"]." and cid = 222";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "value='".$row1["contact_val"]."'";
			}
		}

	echo " maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='email'>Email address:</label>
				</td>
				<td>
					<input type='textbox' name='email' id='email' ";
	
		//find scout's contact
		$sql1 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE sid = ".$row["sid"]." and cid = 333";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "value='".$row1["contact_val"]."'";
			}
		}

	echo " maxlength='45' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='rank'>Rank:</label>
				</td>
				<td>
					<select name='rank' id='rank'>
						<option value='none'>Select a Rank</option>";
	
		//find all ranks scout can have
		$sql1 = "SELECT * FROM Rank";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "<option value='".$row1["rank_id"]."'";
			
				if ($row1["rank_id"] == $row["rank_id"])
				{
					echo " selected='selected'";
				}
			
				echo ">".$row1["rank_title"]."</option>";
			}
		}

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
	
		//find all leadership positions scout can have
		$sql1 = "SELECT * FROM LeadershipPosition";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "<option value='".$row1["lead_id"]."'";
			
				if ($row1["lead_id"] == $row["lead_id"])
				{
					echo " selected='selected'";
				}
			
				echo ">".$row1["lead_title"]."</option>";
			}
		}

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
	
		//find all patrols scout can be in
		$sql1 = "SELECT * FROM Patrol";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "<option value='".$row1["patrol_id"]."'";
			
				if ($row1["patrol_id"] == $row["patrol_id"])
				{
					echo " selected='selected'";
				}
			
				echo ">".$row1["pname"]."</option>";
			}
		}

	echo "
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' value='Edit Scout' name='submit' />
				</td>
			</tr>
		</table>";
	
			}
		}
	}
	else
	{
		echo "No scout exists to edit.";
	}
}
$conn->close();
    
echo "
</form>
</div>
<a id='return' href='../roster_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>
