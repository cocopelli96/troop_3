<?php

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "userdb");
// Check connection
if ($conn->connect_error) {
    $perm_level = 0;
} 
else
{
	if(isset($_COOKIE["username"]))
	{
		$sql = "SELECT uid, uname, pass, perm_id FROM useraccount";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["uname"] == $_COOKIE["username"])
				{
					$perm_id = $row["perm_id"];
					break;
				}
			}
		}
	
		$sql = "SELECT perm_id, perm_title, perm_level FROM permission";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["perm_id"] == $perm_id)
				{
					$perm_level = $row["perm_level"];
					break;
				}
			}
		}
	}
}
$conn->close();

?>