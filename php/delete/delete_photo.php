<?php

$page_name = "Photos";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete Photo</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='add_content' class='layer'>";

//begin upload code
//bored upload code setup from w3school.com
$target_file = $_POST["fileToDelete"];
$full_path = "../".$target_file;
$uploadOk = 1;
// Check if file already exists
if (!file_exists($full_path)) {
    echo "Sorry, file doesn't exist.<br />";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not deleted.<br />";
// if everything is ok, try to upload file
} else {
    if (unlink($full_path)) {
        echo "The file ". $_POST["fileToDelete"] . " has been deleted.";
           
		// Create connection to database
		// code setup borrowed from w3school.com
		$conn = new mysqli("localhost", "root", "root", "filesdb");
		// Check connection
		if ($conn->connect_error) {
			echo "Error connecting to database.";
		} 
		else
		{
			$sql = "SELECT * FROM files";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row["path"] == $_POST["fileToDelete"])
					{
						$sql = "DELETE FROM files WHERE fid = ". $row["fid"];
						$result = $conn->query($sql);
						break;
					}
				}
			} else {
				echo "Failed to delete.";
			}
		}
		$conn->close();
		
//         //delete file path in gallery.txt
//         $gallery = fopen("../files/gallery.txt", "r") or die("Unable to open file!");
//         while (!feof($gallery))
//         {
// 			$line = fgets($gallery);
// 			if ($line != $target_file."\n" && $line != $target_file)
// 			{
// 				$text_holder = $text_holder . $line;
// 			}
// 		}
// 		if (substr($text_holder, strlen($text_holder)-1, strlen($text_holder)) == "\n")
// 		{
// 			$text_holder = substr($text_holder, 0, strlen($text_holder) - 1);
// 		}
//         fclose($gallery);
//         $gallery = fopen("../files/gallery.txt", "w") or die("Unable to open file!");
//         fwrite($gallery, $text_holder);
//         fclose($gallery);
    } else {
        echo "Sorry, there was an error deleting your file.";
    }
}

//end page setup
echo "
</div>
<a id='return' href='../photos.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>