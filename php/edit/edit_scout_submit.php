<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Edit Scout</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "<div id='main'>
<div id='edit_content' class='layer'>
<h1>Edit Scout</h1>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	//edit scout
	$sql = "SELECT Scout.sid, sfn, sln, aid, street, city, state, zip, lead_id, rank_id, patrol_id FROM Scout, Address WHERE Scout.sid = Address.sid;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["sid"] == $_POST["sid"])
			{
				if (isset($_POST["sfn"]) and !empty($_POST["sfn"]))
				{
					if ($_POST["sfn"] != $row["sfn"])
					{
						$sql0 = "UPDATE Scout SET sfn = '".$_POST["sfn"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout first name.";
					}
				}
				if (isset($_POST["sln"]) and !empty($_POST["sln"]))
				{
					if ($_POST["sln"] != $row["sln"])
					{
						$sql0 = "UPDATE Scout SET sln = '".$_POST["sln"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout last name.";
					}
				}
				if (isset($_POST["patrols"]) and !empty($_POST["patrols"]))
				{
					if ($_POST["patrols"] != $row["patrol_id"])
					{
						$sql0 = "UPDATE Scout SET patrol_id = '".$_POST["patrols"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout patrol.";
					}
				}
				if (isset($_POST["rank"]) and !empty($_POST["rank"]))
				{
					if ($_POST["rank"] != $row["rank_id"])
					{
						$sql0 = "UPDATE Scout SET rank_id = '".$_POST["rank"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout rank.";
					}
				}
				if (isset($_POST["leadership"]) and !empty($_POST["leadership"]))
				{
					if ($_POST["leadership"] != $row["lead_id"])
					{
						$sql0 = "UPDATE Scout SET lead_id = '".$_POST["leadership"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout leadership position.";
					}
				}
				if (isset($_POST["street"]) and !empty($_POST["street"]))
				{
					if ($_POST["street"] != $row["street"])
					{
						$sql0 = "UPDATE Address SET street = '".$_POST["street"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout street address.";
					}
				}
				if (isset($_POST["city"]) and !empty($_POST["city"]))
				{
					if ($_POST["city"] != $row["city"])
					{
						$sql0 = "UPDATE Address SET city = '".$_POST["city"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout city address.";
					}
				}
				if (isset($_POST["state"]) and !empty($_POST["state"]))
				{
					if ($_POST["state"] != $row["state"])
					{
						$sql0 = "UPDATE Address SET state = '".$_POST["state"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout state address.";
					}
				}
				if (isset($_POST["zip"]) and !empty($_POST["zip"]))
				{
					if ($_POST["zip"] != $row["zip"])
					{
						$sql0 = "UPDATE Address SET zip = '".$_POST["zip"]."' WHERE sid = ".$_POST["sid"];
						$result0 = $conn->query($sql0);
						echo "Edit scout zip address.";
					}
				}
			
				//edit scout contact
				$sql1 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE sid = ".$_POST["sid"]." and cid = 111";
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["phone1"]) and !empty($_POST["phone1"]))
						{
							if ($_POST["phone1"] != $row1["contact_val"])
							{
								$sql0 = "UPDATE scoutcontact SET contact_val = '".$_POST["phone1"]."' WHERE sid = ".$_POST["sid"];
								$result0 = $conn->query($sql0);
								echo "Edit scout home phone.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM scoutcontact WHERE sid = ".$_POST["sid"]." and cid = 111";
							$result0 = $conn->query($sql0);
							echo "Delete scout home phone.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO scoutcontact VALUES(".$_POST["sid"].",111,'" .$_POST["phone1"]."')";
					$result0 = $conn->query($sql0);
					echo "Create scout home phone.";
				}
			
				//edit scout contact
				$sql1 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE sid = ".$_POST["sid"]." and cid = 222";
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["phone2"]) and !empty($_POST["phone2"]))
						{
							if ($_POST["phone2"] != $row1["contact_val"])
							{
								$sql0 = "UPDATE scoutcontact SET contact_val = '".$_POST["phone2"]."' WHERE sid = ".$_POST["sid"];
								$result0 = $conn->query($sql0);
								echo "Edit scout cell phone.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM scoutcontact WHERE sid = ".$_POST["sid"]." and cid = 222";
							$result0 = $conn->query($sql0);
							echo "Delete scout cell phone.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO scoutcontact VALUES(".$_POST["sid"].",222,'" .$_POST["phone2"]."')";
					$result0 = $conn->query($sql0);
					echo "Create scout cell phone.";
				}
			
				//edit scout contact
				$sql1 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE sid = ".$_POST["sid"]." and cid = 333";
				$result1 = $conn->query($sql1);

				if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						if (isset($_POST["email"]) and !empty($_POST["email"]))
						{
							if ($_POST["email"] != $row1["contact_val"])
							{
								$sql0 = "UPDATE scoutcontact SET contact_val = '".$_POST["email"]."' WHERE sid = ".$_POST["sid"];
								$result0 = $conn->query($sql0);
								echo "Edit scout email.";
							}
						}
						else
						{
							$sql0 = "DELETE FROM scoutcontact WHERE sid = ".$_POST["sid"]." and cid = 333";
							$result0 = $conn->query($sql0);
							echo "Delete scout email.";
						}
					}
				}
				else
				{
					$sql0 = "INSERT INTO scoutcontact VALUES(".$_POST["sid"].",333,'" .$_POST["email"]."')";
					$result0 = $conn->query($sql0);
					echo "Create scout email.";
				}
			}
		}
	}
	else
	{
		echo "No scout exists to edit.";
	}
}
$conn->close();


echo "
</div>
<a id='return' href='../roster_manage.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");
?>
