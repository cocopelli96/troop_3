<?php

$page_name = "Account";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit User</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit User</h1>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql = "SELECT * FROM useraccount;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["uid"] == $_POST["uid"])
			{
				if (isset($_POST["uname"]) and !empty($_POST["uname"]))
				{
					if ($_POST["uname"] != $row["uname"])
					{
						$sql0 = "UPDATE useraccount SET uname = '".$_POST["uname"]."' WHERE uid = ".$_POST["uid"];
						$result0 = $conn->query($sql0);
						echo "Edit user name.";
					}
				}
				if (isset($_POST["pass"]) and !empty($_POST["pass"]))
				{
					if ($_POST["pass"] != $row["pass"])
					{
						$sql0 = "UPDATE useraccount SET pass = '".$_POST["pass"]."' WHERE uid = ".$_POST["uid"];
						$result0 = $conn->query($sql0);
						echo "Edit user password.";
					}
				}
				if (isset($_POST["permission"]) and !empty($_POST["permission"]))
				{
					if ($_POST["permission"] != $row["perm_id"])
					{
						$sql0 = "UPDATE useraccount SET perm_id = '".$_POST["permission"]."' WHERE uid = ".$_POST["uid"];
						$result0 = $conn->query($sql0);
						echo "Edit user permissions.";
					}
				}
			
				$sql1 = "SELECT * FROM accountcontact WHERE uid = ".$_POST["uid"]." and contact_id = 22";
				$result1 = $conn->query($sql1);
			
				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["phone"]) and !empty($_POST["phone"]))
						{
							if ($_POST["phone"] != $row1["acct_contact"])
							{
								$sql0 = "UPDATE accountcontact SET acct_contact = '".$_POST["phone"]."' WHERE uid = ".$_POST["uid"];
								$result0 = $conn->query($sql0);
								echo "Edit user phone.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM accountcontact WHERE uid = ".$_POST["uid"]." and contact_id = 22";
							$result0 = $conn->query($sql0);
							echo "Delete user phone.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO accountcontact VALUES(".$_POST["uid"].",22,'" .$_POST["phone"]."')";
					$result0 = $conn->query($sql0);
					echo "Create user phone.";
				}
			
				$sql1 = "SELECT * FROM accountcontact WHERE uid = ".$_POST["uid"]." and contact_id = 11";
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["email"]) and !empty($_POST["email"]))
						{
							if ($_POST["email"] != $row1["acct_contact"])
							{
								$sql0 = "UPDATE accountcontact SET acct_contact = '".$_POST["email"]."' WHERE uid = ".$_POST["uid"];
								$result0 = $conn->query($sql0);
								echo "Edit user email.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM accountcontact WHERE uid = ".$_POST["uid"]." and contact_id = 11";
							$result0 = $conn->query($sql0);
							echo "Delete user email.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO accountcontact VALUES(".$_POST["uid"].",11,'" .$_POST["email"]."')";
					$result0 = $conn->query($sql0);
					echo "Create user email.";
				}
	
				$sql1 = "SELECT * FROM userscout WHERE uid = ".$_POST["uid"];
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["scout"]) and !empty($_POST["scout"]) and $_POST["scout"] != "none")
						{
							if ($_POST["scout"] != $row1["sid"])
							{
								$sql0 = "UPDATE userscout SET sid = ".$_POST["scout"]." WHERE uid = ".$_POST["uid"];
								$result0 = $conn->query($sql0);
								echo "Edit user scout connection.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM userscout WHERE uid = ".$_POST["uid"];
							$result0 = $conn->query($sql0);
							echo "Delete user scout connection.";
						}
					}
				}
				else
				{
					if (isset($_POST["scout"]) && !empty($_POST["scout"]) && $_POST["scout"] != "none")
					{
						$sql0 = "INSERT INTO userscout VALUES(".$_POST["uid"].",".$_POST["scout"].")";
						$result0 = $conn->query($sql0);
						echo "Create user scout connection.";
					}
				}
			}
		}
	}
	else
	{
		echo "No user exists to edit.";
	}
}
$conn->close();

echo "
</div>
<a id='return' href='../account_manage.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>