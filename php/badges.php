<?php

$page_name = "Merit Badges";

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Merit Badges</title>
<script type='text/javascript' src='../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%; float:left;'>Merit Badges</h1>";

if ($perm_level == 4)
{
	echo "<a class='edit_button' href='./add/add_counselor.php'>Add Counselor</a>
	<a class='edit_button' href='./add/add_badge.php'>Add Badge</a>";
}

echo "<div id='table_holder'>";
		
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql0 = "SELECT counselor.badge_id, badge_name FROM counselor, Badges WHERE counselor.badge_id = Badges.badge_id GROUP BY badge_id ORDER BY badge_id;";
	$result0 = $conn->query($sql0);

	if ($result0->num_rows > 0) {
		// output data of each row
		while($row0 = $result0->fetch_assoc()) {

			echo "<h2 class='table_head'>".$row0["badge_name"]."</h2>";
		
			if ($perm_level == 4)
			{
				echo "<form name='delete_full_badge_form' action='./delete/delete_badge.php' method='post' onsubmit='return confirmDelete(\"badge\");'>
						<input type='text' name='badgeDelete' id='badgeDelete' value='" . $row0["badge_id"] ."' style='display:none;'>
						<button type='submit' class='delete_full_badge'>Delete</button>
					</form>";
			}

			echo"
			<table border='2' class='table'>
				<thead>
					<tr>
						<td>Name</td>
						<td>Address</td>
						<td>Phone Number</td>
						<td>E-mail</td>";
			if ($perm_level == 4)
			{
				echo "<td>Delete</td>";
			}
		
			echo "			
					</tr>
				</thead>
				<tbody>";

			$sql = "SELECT badge_id, Scout.sid, concat(sfn, ' ', sln) as name, concat(street, ' ', city, ', ', state, ' ', zip) as address FROM Scout, Address, counselor WHERE Scout.sid = Address.sid and Scout.sid = counselor.sid ORDER BY badge_id;";
			$result = $conn->query($sql);

			$filled = false;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row0["badge_id"] == $row["badge_id"]){
						$filled = true;
		
						echo "
						<tr>
							<td>".$row["name"]."</td>
							<td>".$row["address"]."</td>
							<td>";
			
						$sql2 = "SELECT sid, contact.cid, contact_val, con_descript FROM scoutcontact, contact WHERE contact.cid = scoutcontact.cid and (scoutcontact.cid = 111 or scoutcontact.cid = 222);";
						$result2 = $conn->query($sql2);

						if ($result2->num_rows > 0) {
							// output data of each row
							while($row2 = $result2->fetch_assoc()) {
								if ($row["sid"] == $row2["sid"])
								{
									echo $row2["con_descript"].": ".$row2["contact_val"]."<br />";
								}
							}
						}
						else
						{
							echo "No phone numbers for this counselor.";
						}
		
						echo "</td><td>";
			
						$sql2 = "SELECT sid, cid, contact_val FROM scoutcontact WHERE scoutcontact.cid = 333;";
						$result2 = $conn->query($sql2);

						if ($result2->num_rows > 0) {
							// output data of each row
							while($row2 = $result2->fetch_assoc()) {
								if ($row2["sid"] == $row["sid"])
								{
									echo $row2["contact_val"]."<br />";
								}
							}
						}
						else
						{
							echo "No e-mails for this counselor.";
						}
		
						echo "</td>";
		
						if ($perm_level == 4)
						{
							echo "
							<td class='delete_td'>
								<form name='delete_badge_form' action='./delete/delete_counselor.php' method='post' onsubmit='return confirmDelete(\"counselor\");'>
									<input type='text' name='sidDelete' id='sidDelete' value='" . $row["sid"] ."' style='display:none;'>
									<input type='text' name='badgeDelete' id='badgeDelete' value='" . $row["badge_id"] ."' style='display:none;'>
									<button type='submit' class='delete_badge'>Delete</button>
								</form>
							</td>";
						}
	
						echo "</tr>";
					}
				}
	
				if ($filled == false)
				{
					echo "<tr><td colspan='4'>There are no merit badge counselors at this time.</td><tr>";
				}
			} else {
				echo "<tr><td colspan='4'>There are no merit badge counselors at this time.</td><tr>";
			}
		
			echo "
			</tbody>
			</table>";
		}
	}
}
$conn->close();

echo "</div>
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>
