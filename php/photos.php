<?php

// Include database permissions
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Photos</title>
<script type='text/javascript' src='../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<h1 style='width:50%; float: left;'>Photo Gallery</h1>";

//if user has permission level of webmaster or adultadmin allow them to add photos
if ($perm_level > 2)
{
	echo "<a id='add_file' href='./add/add_photo.php'>Add Photo</a>";
}

echo "
<table id='images' class='table' border='1'>
	<tbody>
";

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "filesdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	//find photos to display
	$sql = "SELECT fid, path, fname, file_type FROM Files, FileType WHERE Files.type_id = FileType.type_id";
	$result = $conn->query($sql);

	$count = 0;
	$filled = false;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["file_type"] == "Photo")
			{
				$filled = true;
				if ($count == 0)
				{
					echo "<tr>";
				}
	
				echo "<td>";
	
				//if user has permission level of webmaster or adultadmin allow them to delete photos
				if ($perm_level > 2)
				{
					echo "
					<form name='delete_photo_form' action='./delete/delete_photo.php' method='post' onsubmit='return confirmDelete(\"photo\");'>
						<input type='text' name='fileToDelete' id='fileToDelete' value='" . $row["path"] ."' style='display:none;'>
						<button type='submit' class='delete_photo'>Delete</button>
					</form>";
				}
		
				echo "
					<img class='image' src='" . $row["path"] . "' alt='gallery image' />
					</td>";
				$count++;
		
				if ($count == 3)
				{
					echo "</tr>";
					$count = 0;
				}
			}
		}
	
		//if no photos were found alert the user
		if ($filled == false)
		{
			echo "<tr><td>There are no files at this time.</td><tr>";
		}
	} else {
		echo "<tr><td>There are no images at this time.</td><tr>";
	}
}
$conn->close();

echo "</tbody>
</table>
</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>
