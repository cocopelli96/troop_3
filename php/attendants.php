<?php

$page_name = "Events";

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Event Attendants</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%; float:left;'>Event Attendants</h1>";

$conn = new mysqli("localhost", "root", "root", "eventsdb");
if ($conn->connect_error)
{
	echo "<table class='table'>
			<tbody>
				<tr>
					<td>Error connecting to the database.</td>
				</tr>
			</tbody>
		</table>";
}
else
{
	$sql = "SELECT * FROM event ORDER BY event_id;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["event_id"] == $_POST["event_id"])
			{
				echo "<table class='table signup_table'>
					<thead>
						<tr>
							<td>".$row["event_name"]."</td>
						</tr>
					</thead>
					<tbody>";
				
				$sql1 = "SELECT * FROM attendant WHERE event_id = ".$row["event_id"];
				$result1 = $conn->query($sql1);

				$filled = false;
				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if ($row["event_id"] == $row1["event_id"])
						{
							$filled = true;
							echo "<tr>
							<td>"; 
							
							$conn2 = new mysqli("localhost", "root", "root", "rosterdb");
							if ($conn2->connect_error)
							{
								echo "There was an error connecting to the database.";
							}
							else
							{
								$sql2 = "SELECT * FROM scout WHERE sid = ".$row1["sid"];
								$result2 = $conn2->query($sql2);

								$filled2 = false;
								if ($result2->num_rows > 0) {
									// output data of each row
									while($row2 = $result2->fetch_assoc()) {
										if ($row2["sid"] == $row1["sid"])
										{
											$filled2 = true;
											echo $row2["sfn"]." ".$row2["sln"];
										}
									}
									
									if ($filled2 == false)
									{
										echo "There is no scout.";
									}
								}
								else
								{
									echo "There is no scout.";
								}
							}
							echo "</td>
							</tr>";
						}
					}
					
					if ($filled == false)
					{
						echo "<tr><td>There are no scouts attending this event.</td></tr>";
					}
				}
				else
				{
					echo "<tr><td>There are no scouts attending this event.</td></tr>";
				}
					
				echo "
					</tbody>
				</table>";
			}
		}
	}
}

echo "
<a id='return' href='events.php'>Return</a>
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>