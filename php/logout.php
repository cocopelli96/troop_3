<?php

//kill the login authentication cookie
setcookie("username", "", time() - 3300, "/");

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Login</title>
<meta http-equiv='refresh' content='3;../index.php'>
";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<div id='login_content' class='layer'>
<h1 id='head'>Logout</h1>
You have successfully logged out.
</div>
</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>