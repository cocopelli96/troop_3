<?php

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Calendar</title>
<script type='text/javascript' src='../common/calendar.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<h1>Calendar</h1>";

//get the month and year to display in the calendar and the current month and year
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

//create month and year indication and control table and create calendar
echo "
	<table id='date_table' class='table'>
		<thead>
			<tr>
				<td class='small_td'>
					<form action='calendar.php' onsubmit='' method='post' name='date_selection'>
						<input id='month' name='month' style='display:none;' type='textbox' value='".$month_previous."' />
						<input id='year' name='year' style='display:none;' type='textbox' value='".$year_previous."' />
						<button type='submit' id='date_left'>Previous</button>
					</form>
				</td>
				<td>".$months[$month - 1]." ".$year."</td>
				<td class='small_td'>
					<form action='calendar.php' onsubmit='' method='post' name='date_selection'>
						<input id='month' name='month' style='display:none;' type='textbox' value='".$month_next."' />
						<input id='year' name='year' style='display:none;' type='textbox' value='".$year_next."' />
						<button type='submit' id='date_right'>Next</button>
					</form>
				</td>
			</tr>
		</thead>
	</table>
	<table id='calendar' border='1' class='table'></table>
	
	<script type='text/javascript'>
		createCalendar(".($month - 1).",".$year.");
		scoutMeetings();
	</script>
	<div>
";

$conn = new mysqli("localhost", "root", "root", "eventsdb");
if ($conn->connect_error)
{
	echo "There was an error connecting to the database.";
}
else
{
	//get events to insert into calendar
	$sql = "SELECT * FROM Event";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ((intval(substr($row["start_date"],0,4)) == $year and (intval(substr($row["start_date"],5,2)) == $month)) or (intval(substr($row["end_date"],5,2)) == $month and intval(substr($row["end_date"],0,4)) == $year))
			{
				$start = intval(substr($row["start_date"],8,2));
				$end = intval(substr($row["end_date"],8,2));
				if (intval(substr($row["start_date"],5,2)) != $month and $start >= $end)
				{
					$start = 1;
				}
				if (intval(substr($row["end_date"],5,2)) != $month and $start >= $end)
				{
					if ($month == 2)
					{
						if ($year % 4)
						{
							$end = 29;
						}
						else
						{
							$end = 28;
						}
					}
					else if (($month % 2 == 0 and $month < 7) || ($month % 2 != 0 and $month > 7) )
					{
						$end = 30;
					}
					else
					{
						$end = 31;
					}
				}
				while ($start <= $end)
				{
					echo "<script type='text/javascript'>
						document.getElementById('".($month - 1)."-".$start."-".$year."').innerHTML += '<span style=\"display:block;font-size: 80%;\">&bull; ".$row["event_name"]."</span>';
					</script>";
					$start++;
				}
			}
		}
	}
}

echo "</div></div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>
