<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete Event</title>";

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
	$sql = "SELECT * FROM Event;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["event_id"] == $_POST["event_id"])
			{
				$sql1 = "SELECT * FROM Attendant;";
				$result1 = $conn->query($sql1);

				$attendants = 0;
				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if ($row1["event_id"] == $row["event_id"])
						{
							$attendants++;
						}
					}		
				}
				
				if ($attendants > 0)
				{
					echo "Cannot delete event there are scouts attending it.";
				}
				else
				{
					$sql1 = "SELECT * FROM SignUp;";
					$result1 = $conn->query($sql1);

					if ($result1->num_rows > 0) {
						// output data of each row
						while($row1 = $result1->fetch_assoc()) {
							if ($row1["event_id"] == $row["event_id"])
							{
								$sql2 = "DELETE FROM SignUp WHERE event_id = ".$row["event_id"];
								$result2 = $conn->query($sql2);
								echo "Signup deleted.";
								break;
							}
						}		
					}
				
					$sql1 = "DELETE FROM Event WHERE event_id = ".$row["event_id"];
					$result1 = $conn->query($sql1);
					echo "Event deleted.";
					break;
				}
			}
		}
		
	}
	else
	{
		echo "There is no event to delete.";
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
