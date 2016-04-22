<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Article</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "
<div id='main'>
<div id='add_form' class='layer'>
<h1>Add Article</h1>
<form name='upload_artilce' onsubmit='return articleForm();' action='../upload/upload_article.php' method='post' enctype='multipart/form-data'>
	Article Title:
    <input type='text' name='articleTitle' id='articleTitle' maxlength='45' />
    <br />
    Select file to upload:
    <input type='file' name='fileToUpload' id='fileToUpload' />
    <input type='submit' value='Upload File' name='submit' />
</form>
</div>
<a id='return' href='../articles.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");

?>