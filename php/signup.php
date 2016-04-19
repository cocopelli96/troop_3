<?php

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

//main content start
echo "
<div id='main'>
<div id='edit_content' class='layer'>
<h1>Sign Up</h1>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	$scout = -1;
    echo "Error connecting to database.";
} 
else
{
	//detemrine if the current user's account is connected to a scout
	if(isset($_COOKIE["username"]))
	{
		$sql = "SELECT uid, uname, pass, perm_id FROM UserAccount";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["uname"] == $_COOKIE["username"])
				{
					$uid = $row["uid"];
					break;
				}
			}
		}
	
		$sql = "SELECT * FROM UserScout";
		$result = $conn->query($sql);

		$scout = 0;
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["uid"] == $uid)
				{
					$scout = $row["sid"];
					break;
				}
			}
		}
	}
}
$conn->close();

//if user account is connected to a scout allow them to register or unregister for event
//else tell them they are not conencted to a scout
if ($scout > 0)
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
		$sql = "SELECT * FROM Attendant";
		$result = $conn->query($sql);

		$registered = false;
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["sid"] == $scout && $row["event_id"] == $_POST["event_id"])
				{
					$registered = true;
					echo "<div class='signup_div'>You are already registered for this event.</div>
					<form name='signup_form' action='signup_submit.php' method='post' style='display:inline;'>
						<input type='text' name='event_id' id='event_id' value='" . $_POST["event_id"] ."' style='display:none;'>
						<input type='text' name='scout' id='scout' value='" . $scout ."' style='display:none;'>
					<input type='text' name='register' id='register' value='no' style='display:none;'>
						<button type='submit' class='signup_button'>Unregister</button>
					</form>";
					break;
				}
			}
		}
	}
	$conn->close();
	
	if (!$registered)
	{
		echo "<div class='signup_div'>You are not yet registed to attend this event.</div>
			<form name='signup_form' action='signup_submit.php' method='post' style='display:inline;'>
				<input type='text' name='event_id' id='event_id' value='" . $_POST["event_id"] ."' style='display:none;'>
				<input type='text' name='scout' id='scout' value='" . $scout ."' style='display:none;'>
				<input type='text' name='register' id='register' value='yes' style='display:none;'>
				<button type='submit' class='signup_button'>Register</button>
			</form>";
	}
}
else if ($scout == 0)
{
	echo "Your user is not connected to a scout, you cannot sign up to attend an event.";
}

echo "
</div>
<a id='return' href='events.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>
