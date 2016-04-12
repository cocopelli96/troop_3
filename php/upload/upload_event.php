<?php

$page_name = "Events";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Event</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='add_content' class='layer'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "eventsdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT * FROM Event ORDER BY event_id;";
	$result = $conn->query($sql);

	$event_id = 1;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["event_id"] != $event_id)
			{
				break;
			}
			$event_id++;
		}
	}

	$sql = "INSERT INTO Event VALUES(".$event_id.",'".$_POST["event_name"]."','".$_POST["description"]."','".$_POST["location"]."','".substr($_POST["start"],6,4)."-".substr($_POST["start"],0,2)."-".substr($_POST["start"],3,2)." ".substr($_POST["start"],11,8)."','".substr($_POST["end"],6,4). "-".substr($_POST["end"],0,2)."-".substr($_POST["end"],3,2)." " .substr($_POST["end"],11,8)."')";
	$result = $conn->query($sql);
	
	echo "The event ".$_POST["event_name"].", ".$_POST["description"].", ".$_POST["location"].",".substr($_POST["start"],6,4)."-".substr($_POST["start"],0,2)."-".substr($_POST["start"],3,2)." ".substr($_POST["start"],11,8). ",".substr($_POST["end"],6,4)."-".substr($_POST["end"],0,2)."-".substr($_POST["end"],3,2)." ".substr($_POST["end"],11,8)." has been uploaded.";
	
	if (isset($_POST["deadline"]) and !empty($_POST["deadline"]) and isset($_POST["cost"]) and !empty($_POST["cost"]))
	{
		$sql = "SELECT * FROM SignUp ORDER BY signup_id;";
		$result = $conn->query($sql);

		$count = 1;
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["signup_id"] != $count)
				{
					break;
				}
				$count++;
			}
		}

		$sql = "INSERT INTO SignUp VALUES(".$count.",'".substr($_POST["deadline"],6,4)."-".substr($_POST["deadline"],0,2)."-".substr($_POST["deadline"],3,2)." ".substr($_POST["deadline"],11,8). "',".$_POST["cost"].",".$event_id.")";
		$result = $conn->query($sql);
	
		echo "A signup has been uploaded for the event.";
	}
}
$conn->close();

//end page setup
echo "
</div>
<a id='return' href='../events.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>
