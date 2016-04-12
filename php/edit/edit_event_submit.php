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

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit Event</h1>
<form name='edit_event' action='../edit/edit_event_submit.php' method='post' onsubmit='' enctype='multipart/form-data'>";


// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "eventsdb");
// Check connection
if ($conn->connect_error) {
    echo "There was an error connecting to the database.";
} 
else
{
	$sql = "SELECT * FROM Event;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["event_id"] == $_POST["event_id"])
			{
				if (isset($_POST["event_name"]) and !empty($_POST["event_name"]))
				{
					if ($_POST["event_name"] != $row["event_name"])
					{
						$sql0 = "UPDATE Event SET event_name = '".$_POST["event_name"]."' WHERE event_id = ".$_POST["event_id"];
						$result0 = $conn->query($sql0);
						echo "Edit event name.";
					}
				}
				if (isset($_POST["location"]) and !empty($_POST["location"]))
				{
					if ($_POST["location"] != $row["location"])
					{
						$sql0 = "UPDATE Event SET location = '".$_POST["location"]."' WHERE event_id = ".$_POST["event_id"];
						$result0 = $conn->query($sql0);
						echo "Edit event location.";
					}
				}
				if (isset($_POST["description"]) and !empty($_POST["description"]))
				{
					if ($_POST["description"] != $row["description"])
					{
						$sql0 = "UPDATE Event SET description = '".$_POST["description"]."' WHERE event_id = ".$_POST["event_id"];
						$result0 = $conn->query($sql0);
						echo "Edit event description.";
					}
				}
				if (isset($_POST["start"]) and !empty($_POST["start"]))
				{
					if ($_POST["start"] != date_format(date_create($row["start_date"]), "m-d-Y H:i:s"))
					{
						$sql0 = "UPDATE Event SET start_date = '".substr($_POST["start"],6,4)."-".substr($_POST["start"],0,2)."-".substr($_POST["start"],3,2)." ".substr($_POST["start"],11,8)."' WHERE event_id = ".$_POST["event_id"];
						$result0 = $conn->query($sql0);
						echo "Edit event start date.";
					}
				}
				if (isset($_POST["end"]) and !empty($_POST["end"]))
				{
					if ($_POST["end"] != date_format(date_create($row["end_date"]), "m-d-Y H:i:s"))
					{
						$sql0 = "UPDATE Event SET end_date = '".substr($_POST["end"],6,4)."-".substr($_POST["end"],0,2)."-".substr($_POST["end"],3,2)." ".substr($_POST["end"],11,8)."' WHERE event_id = ".$_POST["event_id"];
						$result0 = $conn->query($sql0);
						echo "Edit event end date.";
					}
				}
				
				$sql1 = "SELECT * FROM SignUp WHERE event_id = ".$row["event_id"];
				$result1 = $conn->query($sql1);
				
				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["deadline"]) and !empty($_POST["deadline"]) and isset($_POST["cost"]) and !empty($_POST["cost"]))
						{
							if ($_POST["deadline"] != date_format(date_create($row1["end_signup"]), "m-d-Y H:i:s"))
							{
								$sql0 = "UPDATE SignUp SET end_signup = '".substr($_POST["deadline"],6,4)."-".substr($_POST["deadline"],0,2)."-".substr($_POST["deadline"],3,2)." ".substr($_POST["deadline"],11,8)."' WHERE event_id = ".$_POST["event_id"];
								$result0 = $conn->query($sql0);
								echo "Edit event signup date.";
							}
							if ($_POST["cost"] != $row1["cost"])
							{
								$sql0 = "UPDATE SignUp SET cost = ".$_POST["cost"]." WHERE event_id = ".$_POST["event_id"];
								$result0 = $conn->query($sql0);
								echo "Edit event signup cost.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM SignUp WHERE event_id = ".$_POST["event_id"];
							$result0 = $conn->query($sql0);
							echo "Edit delete signup.";
						}
					}
				}
				else
				{
					if (isset($_POST["deadline"]) and !empty($_POST["deadline"]) and isset($_POST["cost"]) and !empty($_POST["cost"]))
					{
						$sql2 = "SELECT * FROM SignUp";
						$result2 = $conn->query($sql2);

						$count = 1;
						if ($result2->num_rows > 0) {
							// output data of each row
							while($row2 = $result2->fetch_assoc()) {
								if ($count != $row2["signup_id"])
								{
									break;
								}
								$count++;
							}
						}
						
						$sql0 = "INSERT INTO SignUp VALUES(".$count.",'".substr($_POST["deadline"],6,4)."-".substr($_POST["deadline"],0,2)."-".substr($_POST["deadline"],3,2)." ".substr($_POST["deadline"],11,8). "',".$_POST["cost"].",".$_POST["event_id"].");";
						$result0 = $conn->query($sql0);
						echo "Edit create signup.";
					}
				}
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

//include footer and closing content
include("../../include/footer_3.inc");
?>
