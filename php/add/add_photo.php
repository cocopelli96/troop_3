<?php

$page_name = "Photos";

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Photo</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content
echo "
<div id='main'>
<div id='add_form' class='layer'>
<h1>Add Photo</h1>
<form name='upload_photo' onsubmit='return fileForm();' action='../upload/upload_photo.php' method='post' enctype='multipart/form-data'>
    Select image to upload:
    <input type='file' name='fileToUpload' id='fileToUpload'>
    <input type='submit' value='Upload Image' name='submit'>
</form>
</div>
<a id='return' href='../photos.php'>Return</a>
</div>";

//include footer and closing content
include("../../include/footer_3.inc");

?>