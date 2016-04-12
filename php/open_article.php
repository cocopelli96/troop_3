<?php

$page_name = "Articles";

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Article</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

echo "<div id='main'>
<h1>" . $_POST["articleTitle"] . "</h1>
<div id='open_article' class='layer'>";

//begin upload code
//bored upload code setup from w3school.com
$target_file = $_POST["fileToOpen"];
$uploadOk = 1;
// Check if file already exists
if (!file_exists($target_file)) {
    echo "Sorry, file doesn't exist.<br />";
    $uploadOk = 0;
} else {
	//open file 
	$article = fopen($target_file, "r") or die("Unable to open file!");
	while (!feof($article))
	{
		echo fgets($article) . "<br />";
	}
	fclose($article);
}

//end page setup
echo "
</div>
<a id='article_return' href='articles.php'>Return</a>
</div>";

//include footer and closing content
include("../include/footer_2.inc");
?>