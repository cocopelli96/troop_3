<?php

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Adult Roster</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<h1 style='width:50%; float:left;'>Adult Roster</h1>";
	
	//if user has adultadmin permissions allow them access to roster management page
	if ($perm_level == 4)
	{
		echo "<a class='edit_button' href='roster_manage.php'>Manage Roster</a>";
	} 	
		
echo "
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
	//find scouts designated as adult leaders
	$sql0 = "SELECT Patrol.patrol_id, pname FROM Patrol, Scout WHERE Patrol.patrol_id = Scout.patrol_id GROUP BY patrol_id ORDER BY patrol_id;";
	$result0 = $conn->query($sql0);

	if ($result0->num_rows > 0) {
		// output data of each row
		while($row0 = $result0->fetch_assoc()) {
			if ($row0["patrol_id"] == 2)
			{
				echo "
				<table border='2' class='table'>
					<thead>
						<tr>
							<td>Name</td>
							<td>Leadership Positions</td>
							<td>Address</td>
							<td>Phone Number</td>
							<td>E-mail</td>
						</tr>
					</thead>
					<tbody>";

				$sql = "SELECT Patrol.patrol_id, Scout.sid, concat(sfn, ' ', sln) as name, concat(street, ' ', city, ', ', state, ' ', zip) as address, lead_title FROM Scout, Address, LeadershipPosition, Patrol WHERE Scout.sid = Address.sid and Scout.patrol_id = Patrol.patrol_id and Scout.lead_id = LeadershipPosition.lead_id ORDER BY patrol_id;";
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
							</tr>";
						}
					}
	
					//if no adult leaders were found alert user
					if ($filled == false)
					{
						echo "<tr><td colspan='6'>There are no scouts at this time.</td><tr>";
					}
				} else {
					echo "<tr><td colspan='6'>There are no scouts at this time.</td><tr>";
				}
		
				echo "
				</tbody>
				</table>";
			}
		}
	}
}
$conn->close();

echo "</div>
</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>
