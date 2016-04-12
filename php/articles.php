<?php

$page_name = "Articles";

//include permission fetching code
include("../include/permissions.inc");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Articles</title>
<script type='text/javascript' src='../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1 style='width:50%; float: left;'>Artilces</h1>";

if ($perm_level > 2)
{
	echo "
	<a id='add_file' href='./add/add_article.php'>Add Article</a>";
}

echo "
<table id='articles' class='table'>
</tbody>";

// //pull in articles
// $articles = fopen("../files/articles.txt", "r");
// $titles = fopen("../files/titles.txt", "r");
// $count = 0;
// while (!feof($articles))
// {
// 	$file = fgets($articles);
// 	$title = fgets($titles);
// 	if (($file == "" || $file == " " || $file == "\n") && $count > 0)
// 	{
// 		echo "";
// 		break;
// 	}
// 	else if ($file == "" || $file == " " || $file == "\n")
// 	{
// 		echo "<tr><td>There are no files at this time.</td><tr>";
// 		break;
// 	}
// 	
// 	echo "
// 	<tr>
// 		<td>
// 			<form name='open_article_form' action='open_article.php' method='post' >
// 				<label for='fileToOpen'>" . $title . "</label>
// 				<input type='text' name='articleTitle' id='articleTitle' value='" . $title ."' style='display:none;'>
// 				<input type='text' name='fileToOpen' id='fileToOpen' value='" . $file ."' style='display:none;'>
// 		</td>
// 		<td class='open_td'>
// 				<button type='submit' class='open_article'>Open</button>
// 			</form>
// 		</td>";
// 		
// 	if ($perm_level > 2)
// 	{
// 		echo "
// 		<td class='delete_td'>
// 			<form name='delete_article_form' action='delete_article.php' method='post' onsubmit='return confirmDelete();'>
// 				<input type='text' name='fileToDelete' id='fileToDelete' value='" . $file ."' style='display:none;'>
// 				<button type='submit' class='delete_article'>Delete</button>
// 			</form>
// 		</td>";
// 	}
// 	
// 	echo "
// 	</tr>";
// 	
// 	$count++;
// }
// fclose($articles);
// fclose($titles);

// Create connection to database
// code setup borrowed from w3school.com
$conn = new mysqli("localhost", "root", "root", "filesdb");
// Check connection
if ($conn->connect_error) {
	echo "Error connecting to database.";
} 
else
{
	$sql = "SELECT fid, path, fname, file_type FROM files, filetype WHERE files.type_id = filetype.type_id";
	$result = $conn->query($sql);

	$filled = false;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["file_type"] == "Article")
			{
				$filled = true;
			
				echo "
				<tr>
					<td>
						<form name='open_article_form' action='open_article.php' method='post' >
							<label for='fileToOpen'>" . $row["fname"] . "</label>
							<input type='text' name='articleTitle' id='articleTitle' value='" . $row["fname"] ."' style='display:none;'>
							<input type='text' name='fileToOpen' id='fileToOpen' value='" . $row["path"] ."' style='display:none;'>
					</td>
					<td class='open_td'>
							<button type='submit' class='open_article'>Open</button>
						</form>
					</td>";
		
				if ($perm_level > 2)
				{
					echo "
					<td class='delete_td'>
						<form name='delete_article_form' action='./delete/delete_article.php' method='post' onsubmit='return confirmDelete(\"article\");'>
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