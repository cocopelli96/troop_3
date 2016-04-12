<?php

$page_name = "Photos";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Photo</title>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

echo "<div id='main'>
<div id='add_content' class='layer'>";

//begin upload code
//bored upload code setup from w3school.com
$target_dir = "../../images/gallery/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$database_file = "../images/gallery/". basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br />";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br />";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br />";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.<br />";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br />";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br />";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                
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

			$count = 1;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row["fid"] != $count)
					{
						break;
					}
					$count++;
				}
			}
		
			$sql = "INSERT INTO files VALUES(".$count.",'". $database_file ."','Main', 303)";
			$result = $conn->query($sql);
		}
		$conn->close();
		
       //  //record file path in gallery.txt
//         $gallery = fopen("../files/gallery.txt", "r") or die("Unable to open file!");
//         $first_line = fgets($gallery);
//         fclose($gallery);
//         if ($first_line == "" || $first_line == " " || $first_line == "\n")
//         {
//         	$gallery = fopen("../files/gallery.txt", "w") or die("Unable to open file!");
//         	fwrite($gallery, $target_dir . basename( $_FILES["fileToUpload"]["name"]));
//         	fclose($gallery);
//         }
//         else
//         {
//         	$gallery = fopen("../files/gallery.txt", "a") or die("Unable to open file!");
//         	fwrite($gallery, "\n" . $target_dir . basename( $_FILES["fileToUpload"]["name"]));
//         	fclose($gallery);
//         }
    } else {
        echo "Sorry, there was an error uploading your file.";
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