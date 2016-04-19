<?php

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Site Map</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<div id='content' class='layer'>
<h1>Site Map</h1>

<ul class='no_dots'>
	<li>
		<a href='../index.php'>Home</a>
	</li>
	<li>
		<a href='about.php'>About Us</a>
	</li>";

if (!isset($_COOKIE['username']))
{
	echo "
	<li>
		<div class='not_link'>Gallery</div>
	</li>
	<li>
		<div class='not_link'>Calendar</div>
	</li>
	<li>
		<div class='not_link'>Roster</div>
	</li>
	<li>
		<div class='not_link'>Events</div>
	</li>
	";
}
else
{
	echo "
	<li>
		<a href='photos.php'>Photos</a>
	</li>
	<li>
		<a href='articles.php'>Articles</a>
	</li>
	<li>
		<a href='calendar.php'>Calendar</a>
	</li>
	<li>
		<a href='roster.php'>Troop Roster</a>
	</li>
	<li>
		<a href='roster_adult.php'>Adult Roster</a>
	</li>
	<li>
		<a href='badges.php'>Merit Badges</a>
	</li>
	<li>
		<a href='events.php'>Events List</a>
	</li>
	<li>
		<a href='plc_notes.php'>PLC Notes</a>
	</li>";
}

echo "
	<li>
		<a href='downloads.php'>Downloads</a>
	</li>
	<li>
		<a href='links.php'>Links</a>
	</li>
	<li>
		<a href='contact.php'>Contact Us</a>
	</li>
	<li>
		<a href='terms.php'>Terms of Use</a>
	</li>
	<li>
		<a href='privacy.php'>Privacy Policy</a>
	</li>
	<li>
		<a href='site_map.php'>Site Map</a>
	</li>

</div>
</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>