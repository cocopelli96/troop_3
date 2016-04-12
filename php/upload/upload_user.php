<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add User</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='add_content' class='layer'>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "There was an error uploading the user.";
} 
else
{
	$sql = "SELECT * FROM UserAccount ORDER BY uid;";
	$result = $conn->query($sql);

	$uid = 1;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["uid"] != $uid)
			{
				break;
			}
			$uid++;
		}
	}

	$sql = "INSERT INTO UserAccount VALUES(".$uid.",'".$_POST["uname"]."','".$_POST["pass"]."',".$_POST["permission"].")";
	$result = $conn->query($sql);
	
	echo "The user ".$_POST["uname"]." ".$_POST["permission"]." has been uploaded.";
	
	if (isset($_POST["phone"]) and !empty($_POST["phone"]))
	{
		$sql = "INSERT INTO AccountContact VALUES(".$uid.",22,'".$_POST["phone"]."')";
		$result = $conn->query($sql);
	
		echo "The home phone number ".$_POST["phone"]." has been uploaded.";
	}
	
	if (isset($_POST["email"]) and !empty($_POST["email"]))
	{
		$sql = "INSERT INTO AccountContact VALUES(".$uid.",11,'".$_POST["email"]."')";
		$result = $conn->query($sql);
	
		echo "The email ".$_POST["email"]." has been uploaded.";
	}
	
	if (isset($_POST["scout"]) and !empty($_POST["scout"]) and $_POST["scout"] != "none")
	{
		$sql = "INSERT INTO UserScout VALUES(".$uid.",".$_POST["scout"].")";
		$result = $conn->query($sql);
	
		echo "The connection to ".$_POST["scout"]." has been made.";
	}
}
$conn->close();

//end page setup
echo "
</div>
<a id='return' href='../account_manage.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>
