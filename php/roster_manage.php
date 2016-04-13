<?php

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Roster Manager</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%; float:left;'>Roster Manager</h1>
<a class='edit_button' href='./add/add_scout.php'>Add Scout</a>
<a class='edit_button' href='./add/add_patrol.php'>Add Patrol</a>
<div id='table_holder'>";
	
// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "rosterdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql0 = "SELECT * FROM Patrol ORDER BY patrol_id;";
	$result0 = $conn->query($sql0);

	if ($result0->num_rows > 0) {
		// output data of each row
		while($row0 = $result0->fetch_assoc()) {
			echo "<h2 class='table_head'>".$row0["pname"]."</h2>
					<form name='delete_patrol_form' action='./delete/delete_patrol.php' method='post' onsubmit='return confirmDelete(\"patrol\");'>
						<input type='text' name='patrolDelete' id='patrolDelete' value='" . $row0["patrol_id"] ."' style='display:none;'>
						<button type='submit' class='delete_full_badge'>Delete</button>
					</form>
			<table border='2' class='table'>
				<thead>
					<tr>
						<td>Name</td>
						<td>Rank</td>
						<td>Leadership Positions</td>
						<td>Address</td>
						<td>Phone Number</td>
						<td>E-mail</td>
						<td style='min-width:auto;'>Edit</td>
						<td style='min-width:auto;'>Delete</td>
					</tr>
				</thead>
				<tbody>";

			$sql = "SELECT Patrol.patrol_id, Scout.sid, concat(sfn, ' ', sln) as name, concat(street, ' ', city, ', ', state, ' ', zip) as address, rank_title, lead_title FROM Scout, Address, LeadershipPosition, Rank, Patrol WHERE Scout.sid = Address.sid and Scout.patrol_id = Patrol.patrol_id and Scout.rank_id = Rank.rank_id and Scout.lead_id = LeadershipPosition.lead_id ORDER BY patrol_id;";
			$result = $conn->query($sql);

			$filled = false;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row0["patrol_id"] == $row["patrol_id"]){
						$filled = true;
	
						echo "
						<tr>
							<td>".$row["name"]."</td>
							<td>".$row["rank_title"]."</td>
							<td>".$row["lead_title"]."</td>
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
							echo "No phone numbers for this scout.";
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
							echo "No e-mails for this scout.";
						}
	
						echo "</td>
							<td style='min-width:auto;'>
								<form name='edit_scout_form' action='./edit/edit_scout.php' method='post'>
									<input type='text' name='sidEdit' id='sidEdit' value='" . $row["sid"] ."' style='display:none;'>
									<button type='submit' class='table_button'>Edit</button>
								</form>
							</td>
							<td style='min-width:auto;'>
								<form name='delete_scout_form' action='./delete/delete_scout.php' method='post' onsubmit='return confirmDelete(\"scout\");'>
									<input type='text' name='sidDelete' id='sidDelete' value='" . $row["sid"] ."' style='display:none;'>
									<button type='submit' class='table_button'>Delete</button>
								</form>
							</td>
						</tr>";
					}
				}

				if ($filled == false)
				{
					echo "<tr><td colspan='8'>There are no scouts at this time.</td><tr>";
				}
			} else {
				echo "<tr><td colspan='8'>There are no scouts at this time.</td><tr>";
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
