<?php

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Events</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%; float:left;'>Events</h1>";
		
	if ($perm_level == 4 || $perm_level == 2)
	{
		echo "<a class='edit_button' href='./add/add_event.php'>Add Event</a>";
	}

if (isset($_POST["year"]) and !empty($_POST["year"]))
{
	$year = intval($_POST["year"]);
}
else
{
	$year = intval(date_format(date_create(), "Y"));
}
if (isset($_POST["month"]) and !empty($_POST["month"]))
{
	$month = intval($_POST["month"]);
}
else
{
	$month = intval(date_format(date_create(), "m"));
}
$current_month = intval(date_format(date_create(), "m"));
$current_day = intval(date_format(date_create(), "d"));
$current_day--;
$current_year = intval(date_format(date_create(), "Y"));
$month_next = $month + 1;
$year_next = $year;
$month_previous = $month - 1;
$year_previous = $year;
if ($month_next > 12)
{
	$month_next = 1;
	$year_next++;
}
if ($month_previous < 1)
{
	$month_previous = 12;
	$year_previous--;
}
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

echo "
	<table id='date_table' class='table'>
		<thead>
			<tr>
				<td class='small_td'>
					<form action='events.php' onsubmit='' method='post' name='date_selection'>
						<input id='month' name='month' style='display:none;' type='textbox' value='".$month_previous."' />
						<input id='year' name='year' style='display:none;' type='textbox' value='".$year_previous."' />
						<button type='submit' id='date_left'>Previous</button>
					</form>
				</td>
				<td>".$months[$month - 1]." ".$year."</td>
				<td class='small_td'>
					<form action='events.php' onsubmit='' method='post' name='date_selection'>
						<input id='month' name='month' style='display:none;' type='textbox' value='".$month_next."' />
						<input id='year' name='year' style='display:none;' type='textbox' value='".$year_next."' />
						<button type='submit' id='date_right'>Next</button>
					</form>
				</td>
			</tr>
		</thead>
	</table>
";

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
	$sql = "SELECT * FROM Event ORDER BY event_id;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ((intval(substr($row["start_date"],0,4)) == $year and (intval(substr($row["start_date"],5,2)) == $month)) or (intval(substr($row["end_date"],5,2)) == $month and intval(substr($row["end_date"],0,4)) == $year))
			{
				echo "<table class='table signup_table"; 
				
				if ($current_day > intval(substr($row["end_date"],8,2)) and $current_month == intval(substr($row["end_date"],5,2)) and $current_year == intval(substr($row["end_date"],0,4)))
				{
					echo " old_event";
				}
				else if ($current_month > intval(substr($row["end_date"],5,2)) and $current_year == intval(substr($row["end_date"],0,4)))
				{
					echo " old_event";
				}
				else if ($current_year > intval(substr($row["end_date"],0,4)))
				{
					echo " old_event";
				}
				
				echo "'>
					<thead>
						<tr>";
			
				if ($perm_level == 2)
				{
					echo"<td colspan='2'>".$row["event_name"]."</td>
						<td>
							<form name='edit_event_form' action='./edit/edit_event.php' method='post'>
								<input type='text' name='event_id' id='event_id' value='" . $row["event_id"] ."' style='display:none;'>
								<button type='submit' class='event_button'>Edit</button>
							</form>
						</td>";
				}
				else if ($perm_level == 4)
				{
					echo"<td colspan='2'>".$row["event_name"]."</td>
						<td>
							<form name='delete_event_form' action='./delete/delete_event.php' method='post' onsubmit='return confirmDelete(\"event\");'>
								<input type='text' name='event_id' id='event_id' value='" . $row["event_id"] ."' style='display:none;'>
								<button type='submit' class='event_button'>Delete</button>
							</form>
							<form name='edit_event_form' action='./edit/edit_event.php' method='post'>
								<input type='text' name='event_id' id='event_id' value='" . $row["event_id"] ."' style='display:none;'>
								<button type='submit' class='event_button'>Edit</button>
							</form>
						</td>";
				}
				else
				{
					echo"<td colspan='3'>".$row["event_name"]."</td>";
				}
						
				echo "
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Location:</td>";
				
				$sql1 = "SELECT * FROM SignUp ORDER BY event_id;";
				$result1 = $conn->query($sql1);

				$filled = false;
				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if ($row["event_id"] == $row1["event_id"])
						{
							$filled = true;
							echo "
							<td>".$row["location"]."</td>
							<td class='event_cost'>Cost: $".$row1["cost"]."</td>";
						}
					}
				
					if ($filled == false)
					{
						echo "<td>".$row["location"]."</td>
								<td class='event_cost'>Cost: None</td>";
					}
				}
				else
				{
					echo "<td>".$row["location"]."</td>
							<td class='event_cost'>Cost: None</td>";
				}
			
				echo "
						</tr>
						<tr>
							<td>Dates:</td>
							<td colspan='2'>".date_format(date_create($row["start_date"]), "F d, Y h:i A")." - ".date_format(date_create($row["end_date"]), "F d, Y h:i A")."</td>
						</tr>
						<tr>
							<td>Description:</td>
							<td colspan='2'>".$row["description"]."</td>
						</tr>";
						
				$sql1 = "SELECT * FROM SignUp ORDER BY event_id;";
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if ($row["event_id"] == $row1["event_id"])
						{
							if ($current_day > intval(substr($row["end_date"],8,2)) and $current_month == intval(substr($row["end_date"],5,2)) and $current_year == intval(substr($row["end_date"],0,4)))
							{
								echo "
								<tr>
									<td>Sign Up Deadline:</td>
									<td";
							
								if ($perm_level != 4)
								{
									echo " colspan='2'";
								}
							
								echo ">
										<div style='float:left; width: 75%; line-height: 2em;'>" .date_format(date_create($row1["end_signup"]), "F d, Y h:i A")."</div>
										<button class='closed_button'>Closed</button>
									</td>
								</tr>";
							}
							else if ($current_month > intval(substr($row["end_date"],5,2)) and $current_year == intval(substr($row["end_date"],0,4)))
							{
								echo "
								<tr>
									<td>Sign Up Deadline:</td>
									<td";
							
								if ($perm_level != 4)
								{
									echo " colspan='2'";
								}
							
								echo ">
										<div style='float:left; width: 75%; line-height: 2em;'>" .date_format(date_create($row1["end_signup"]), "F d, Y h:i A")."</div>
										<button class='closed_button'>Closed</button>
									</td>";
									
								if ($perm_level == 4)
								{
									echo "<td>
											<form name='attendant_form' action='attendants.php' method='post'>
											<input type='text' name='event_id' id='event_id' value='" . $row1["event_id"] ."' style='display:none;'>
											<button type='submit' class='closed_button'>Attendants</button>
										</form>
									</td>";
								}
								
								echo "
								</tr>";
							}
							else if ($current_year > intval(substr($row["end_date"],0,4)))
							{
								echo "
								<tr>
									<td>Sign Up Deadline:</td>
									<td";
							
								if ($perm_level != 4)
								{
									echo " colspan='2'";
								}
							
								echo ">
										<div style='float:left; width: 75%; line-height: 2em;'>" .date_format(date_create($row1["end_signup"]), "F d, Y h:i A")."</div>
										<button class='closed_button'>Closed</button>
									</td>";
									
								if ($perm_level == 4)
								{
									echo "<td>
											<form name='attendant_form' action='attendants.php' method='post'>
											<input type='text' name='event_id' id='event_id' value='" . $row1["event_id"] ."' style='display:none;'>
											<button type='submit' class='closed_button'>Attendants</button>
										</form>
									</td>";
								}
								
								echo "
								</tr>";
							}
							else
							{
								echo "
								<tr>
									<td>Sign Up Deadline:</td>
									<td";
							
								if ($perm_level != 4)
								{
									echo " colspan='2'";
								}
							
								echo ">
										<div style='float:left; width: 75%; line-height: 2em;'>" .date_format(date_create($row1["end_signup"]), "F d, Y h:i A")."</div>
										<form name='signup_form' action='signup.php' method='post'>
											<input type='text' name='event_id' id='event_id' value='" . $row1["event_id"] ."' style='display:none;'>
											<button type='submit' class='signup_button'>Sign Up</button>
										</form>
									</td>";
									
								if ($perm_level == 4)
								{
									echo "<td>
											<form name='attendant_form' action='attendants.php' method='post'>
											<input type='text' name='event_id' id='event_id' value='" . $row1["event_id"] ."' style='display:none;'>
											<button type='submit' class='signup_button'>Attendants</button>
										</form>
									</td>";
								}
								
								echo "
								</tr>";
							}
						}
					}
				}
					
				echo "
					</tbody>
				</table>";
			}
		}
	}
}

echo "
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>
