<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit Event</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit Event</h1>
<form name='edit_event' action='../edit/edit_event_submit.php' method='post' onsubmit='return eventForm();' enctype='multipart/form-data'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "eventsdb");
// Check connection
if ($conn->connect_error) {
    echo "There was an error connecting to the database.";
} 
else
{
	//find the event selected by the user
	$sql = "SELECT * FROM Event;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["event_id"] == $_POST["event_id"])
			{

	echo "
		<input type='text' name='event_id' id='event_id' value='".$row["event_id"]."' style='display:none;'>
		<table>
			<tr>
				<td>
					<label for='event_name'>Event Name:</label>
				</td>
				<td>
					<input type='textbox' name='event_name' id='event_name' value='".$row["event_name"]."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='location'>Event Location:</label>
				</td>
				<td>
					<input type='textbox' name='location' id='location' value='".$row["location"]."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='description'>Event Description:</label>
				</td>
				<td>
					<textarea name='description' id='description' rows='5' cols='30'>".$row["description"]."</textarea>
				</td>
			</tr>
			<tr>
				<td colspan='2'>Please set up dates in the following format:<br />month-day-year 24 hour time with seconds<br />ex: 01-05-2000 15:00:00 is January 5, 2000 at 3:00pm</td>
			</tr>
			<tr>
				<td>
					<label for='start'>Start Date:</label>
				</td>
				<td>
					<input type='textbox' name='start' id='start' value='".date_format(date_create($row["start_date"]), "m-d-Y H:i:s")."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='end'>End Date:</label>
				</td>
				<td>
					<input type='textbox-local' name='end' id='end' value='".date_format(date_create($row["end_date"]), "m-d-Y H:i:s")."' />
				</td>
			</tr>
			<tr>
				<td>
					<label for='deadling'>Sign Up Deadline:</label>
				</td>
				<td>
					<input type='textbox' name='deadline' id='deadline' ";
		
		//find data related to event signup deadline
		$sql1 = "SELECT * FROM SignUp WHERE event_id = ".$row["event_id"];
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "value='".date_format(date_create($row1["end_signup"]), "m-d-Y H:i:s")."'";
			}
		}

	echo "  />
				</td>
			</tr>
			<tr>
				<td>
					<label for='cost'>Cost:</label>
				</td>
				<td>
					<input type='textbox' name='cost' id='cost' ";
	
		//find data related to event signup deadline
		$sql1 = "SELECT * FROM SignUp WHERE event_id = ".$row["event_id"];
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
				echo "value='".$row1["cost"]."'";
			}
		}

	echo " />
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' value='Edit Event' name='submit'>
				</td>
			</tr>
		</table>";
	
			}
		}
	}
	else
	{
		echo "No event exists to edit.";
	}
}
$conn->close();
    
echo "
</form>
</div>
<a id='return' href='../events.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>
