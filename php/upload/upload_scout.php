<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Scout</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='add_content' class='layer'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error uploading the scout.";
} 
else
{
	$sql = "SELECT * FROM Scout ORDER BY sid;";
	$result = $conn->query($sql);

	$sid = 1;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["sid"] != $sid)
			{
				break;
			}
			$sid++;
		}
	}

	$sql = "INSERT INTO Scout VALUES(".$sid.",'".$_POST["sfn"]."','".$_POST["sln"]."',".$_POST["patrols"].",".$_POST["leadership"].",".$_POST["rank"].")";
	$result = $conn->query($sql);
	
	echo "The scout ".$_POST["sfn"]." ".$_POST["sln"]." ".$_POST["patrols"]."," .$_POST["rank"].",".$_POST["leadership"]."has been uploaded.";
	
	$sql = "SELECT * FROM Address ORDER BY aid;";
	$result = $conn->query($sql);

	$count = 1;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["aid"] != $count)
			{
				break;
			}
			$count++;
		}
	}

	$sql = "INSERT INTO Address VALUES(".$count.",'".$_POST["street"]."','".$_POST["city"]."','".$_POST["state"]."','" .$_POST["zip"]."',".$sid.")";
	$result = $conn->query($sql);
	
	echo "The address ".$_POST["street"]." ".$_POST["city"].", ".$_POST["state"]." " .$_POST["zip"]." has been uploaded.";
	
	if (isset($_POST["phone1"]) and !empty($_POST["phone1"]))
	{
		$sql = "INSERT INTO scoutcontact VALUES(".$sid.",111,'".$_POST["phone1"]."')";
		$result = $conn->query($sql);
	
		echo "The home phone number ".$_POST["phone1"]." has been uploaded.";
	}
	
	if (isset($_POST["phone2"]) and !empty($_POST["phone2"]))
	{
		$sql = "INSERT INTO scoutcontact VALUES(".$sid.",222,'".$_POST["phone2"]."')";
		$result = $conn->query($sql);
	
		echo "The cell phone number ".$_POST["phone2"]." has been uploaded.";
	}
	
	$sql = "INSERT INTO scoutcontact VALUES(".$sid.",333,'".$_POST["email"]."')";
	$result = $conn->query($sql);
	
	echo "The email ".$_POST["email"]." has been uploaded.";
}
$conn->close();

//end page setup
echo "
</div>
<a id='return' href='../roster_manage.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>
