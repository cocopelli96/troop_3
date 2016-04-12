<?php

$page_name = "Downloads";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add File</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content
echo "
<div id='main'>
<div id='add_form' class='layer'>
<h1>Add File</h1>
<form name='upload_file' onsubmit='return downloadForm();' action='../upload/upload_file.php' method='post' enctype='multipart/form-data'>
	File Name:
    <input type='text' name='fileName' id='fileName'>
    <br />
    Select file to upload:
    <input type='file' name='fileToUpload' id='fileToUpload'>
    <input type='submit' value='Upload File' name='submit'>
</form>
</div>
<a id='return' href='../downloads.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");

?>