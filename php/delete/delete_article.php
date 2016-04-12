<?php

$page_name = "Articles";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Delete Article</title>";

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
 
//         //delete file path in articles.txt
//         $count = 0;
//         $file_row = 0;
//         $articles = fopen("../files/articles.txt", "r") or die("Unable to open file!");
//         while (!feof($articles))
//         {
// 			$line = fgets($articles);
// 			$count++;
// 			if ($line != $target_file."\n" && $line != $target_file && !($line == "" || $line == " " || $line == "\n"))
// 			{
// 				$text_holder = $text_holder . $line;
// 			}
// 			else if (!($line == "" || $line == " " || $line == "\n"))
// 			{
// 				$file_row = $count;
// 			}
// 		}
// 		if (substr($text_holder, strlen($text_holder)-1, strlen($text_holder)) == "\n")
// 		{
// 			$text_holder = substr($text_holder, 0, strlen($text_holder) - 1);
// 		}
//         fclose($articles);
//         $articles = fopen("../files/articles.txt", "w") or die("Unable to open file!");
//         fwrite($articles, $text_holder);
//         fclose($articles);
//         
//         //delete article title in titles.txt
//         $count = 0;
//         $text_holder= "";
//         $titles = fopen("../files/titles.txt", "r") or die("Unable to open file!");
//         while (!feof($titles))
//         {
// 			$line = fgets($titles);
// 			$count++;
// 			if ($count != $file_row && !($line == "" || $line == " " || $line == "\n"))
// 			{
// 				$text_holder = $text_holder . $line;
// 			}
// 		}
// 		if (substr($text_holder, strlen($text_holder)-1, strlen($text_holder)) == "\n")
// 		{
// 			$text_holder = substr($text_holder, 0, strlen($text_holder) - 1);
// 		}
//         fclose($titles);
//         $titles = fopen("../files/titles.txt", "w") or die("Unable to open file!");
//         fwrite($titles, $text_holder);
//         fclose($titles);
    } else {
        echo "Sorry, there was an error deleting your file.";
    }
}

//end page setup
echo "
</div>
<a id='return' href='../articles.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");
?>