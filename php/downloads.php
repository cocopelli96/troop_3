<?php

$page_name = "Downloads";

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Downloads</title>
<script type='text/javascript' src='../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%; float: left;'>Downloads</h1>";

if ($perm_level > 2)
{
	echo "
	<a id='add_file' href='./add/add_file.php'>Add File</a>";
}

echo "
<table id='downloads' class='table'>
</tbody>";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "filesdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql = "SELECT fid, path, fname, file_type FROM Files, FileType WHERE Files.type_id = FileType.type_id";
	$result = $conn->query($sql);

	$filled = false;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["file_type"] == "File")
			{
				$filled = true;
				echo "
				<tr>
					<td>
						".$row["fname"]."
					</td>
					<td class='open_td'>
						<a href='".$row["path"]."' class='open_file'>Download</a>
					</td>";
		
				if ($perm_level > 2)
				{
					echo "
					<td class='delete_td'>
						<form name='delete_file_form' action='./delete/delete_file.php' method='post' onsubmit='return confirmDelete(\"file\");'>
							<input type='text' name='fileToDelete' id='fileToDelete' value='" . $row["path"] ."' style='display:none;'>
							<button type='submit' class='delete_article'>Delete</button>
						</form>
					</td>";
				}
	
				echo "</tr>";
			}
		}
	
		if ($filled == false)
		{
			echo "<tr><td>There are no files at this time.</td><tr>";
		}
	} else {
		echo "<tr><td>There are no files at this time.</td><tr>";
	}
}
$conn->close();

echo "</tbody>
</table>
</div>";

//include footer and closing content
include("../include/footer_2.inc");


?>
