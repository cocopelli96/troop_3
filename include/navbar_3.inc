<?php

echo "
<div id='navbar'>
	<a href='#' id='mobile_head' onclick='displayMenu(\"mobile_nav\");'>$page_name</a>
	<div id='mobile_nav'>
		<a href='../../index.php'>Home</a>
		<a href='../about.php'>About Us</a>";

if (!isset($_COOKIE['username']))
{
	echo "
	<div class='not_link'>Gallery</div>
	<div class='not_link'>Calendar</div>
	<div class='not_link'>Roster</div>
	<div class='not_link'>Events</div>
	";
}
else
{
	echo "
	<a class='dropdown' href='#' onclick='toggleMenu(\"gallery\");'>Gallery</a>
	<div id='gallery'>
		<a href='../photos.php'>Photos</a>
		<a href='../articles.php'>Articles</a>
	</div>
	<a href='../calendar.php'>Calendar</a>
	<a class='dropdown' href='#' onclick='toggleMenu(\"roster\");'>Roster</a>
	<div id='roster'>
		<a href='../roster.php'>Troop Roster</a>
		<a href='../roster_adult.php'>Adult Roster</a>
		<a href='../badges.php'>Merit Badges</a>
	</div>
	<a class='dropdown' href='#' onclick='toggleMenu(\"events\");'>Events</a>
	<div id='events'>
		<a href='../events.php'>Events List</a>
		<a href='../plc_notes.php'>PLC Notes</a>
	</div>";
}

echo "
		<a href='../downloads.php'>Downloads</a>
		<a href='../links.php'>Links</a>
		<a id='tail_link' href='../contact.php'>Contact Us</a>
	</div>
</div>
";

?>