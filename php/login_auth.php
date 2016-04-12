<?php

$page_name = "Login";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	$text = "Error connecting to database.";
} 
else
{
	$sql = "SELECT uid, uname, pass FROM useraccount";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["uname"] == $_POST["user"] && $row["pass"] == $_POST["pass"])
			{
				setcookie("username", $_POST["user"], time() + (86400 * 30), "/");
				$text = "You have successfully logged in.";
				break;
			}
			else
			{
				$text = "You have failed to login.";
			}
		}
	} else {
		$text = "You have failed to login.";
	}
}
$conn->close();

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Login</title>
<meta http-equiv='refresh' content='3;../index.php'>
";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<div id='login_content' class='layer'>
<h1 id='head'>Login</h1>
" . $text . "
</div>
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>