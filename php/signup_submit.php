<?php

$page_name = "Events";

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Sign Up</title>
<script type='text/javascript' src='../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<div id='edit_content' class='layer'>
<h1>Sign Up</h1>";

if (isset($_POST["register"]) and !empty($_POST["register"]))
{
	if ($_POST["register"] == "yes")
	{
		// Create connection to database
		// code setup borrowed from w3school.com
		$conn = new mysqli("localhost", "root", "root", "eventsdb");
		// Check connection
		if ($conn->connect_error) {
			echo "Error connecting to database.";
		} 
		else
		{
			$sql = "SELECT * FROM attendant";
			$result = $conn->query($sql);

			$found = false;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row["sid"] == $_POST["scout"] && $row["event_id"] == $_POST["event_id"])
					{
						$found = true;
						break;
					}
				}
			}
			
			if ($found == false)
			{
				$sql1 = "INSERT INTO attendant VALUES(".$_POST["scout"].",".$_POST["event_id"].");";
				$result1 = $conn->query($sql1);
				echo "You have been registered to attend this event.";
			}
			else
			{
				echo "Failed to register, you are already registered for this event.";
			}
		}
		$conn->close();
	}
	else
	{
		// Create connection to database
		// code setup borrowed from w3school.com
		$conn = new mysqli("localhost", "root", "root", "eventsdb");
		// Check connection
		if ($conn->connect_error) {
			echo "Error connecting to database.";
		} 
		else
		{
			$sql = "SELECT * FROM attendant";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row["sid"] == $_POST["scout"] && $row["event_id"] == $_POST["event_id"])
					{
						$sql1 = "DELETE FROM attendant WHERE sid = ".$row["sid"]." and event_id = ".$row["event_id"].";";
						$result1 = $conn->query($sql1);
						echo "You have been unregistered to attend this event.";
						break;
					}
				}
			}
		}
		$conn->close();
	}
}
else
{
	echo "Error in event status change.";
}

echo "
</div>
<a id='return' href='events.php'>Return</a>
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>