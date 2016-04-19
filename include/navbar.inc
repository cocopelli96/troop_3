<!--//navigation for the home page-->
<?php

echo "
<div id='navbar'>
	<a href='index.php'>Home</a>
	<a href='./php/about.php'>About Us</a>";

if (!isset($_COOKIE["username"]))
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
		<a href='./php/photos.php'>Photos</a>
		<a href='./php/articles.php'>Articles</a>
	</div>
	<a href='./php/calendar.php'>Calendar</a>
	<a class='dropdown' href='#' onclick='toggleMenu(\"roster\");'>Roster</a>
	<div id='roster'>
		<a href='./php/roster.php'>Troop Roster</a>
		<a href='./php/roster_adult.php'>Adult Roster</a>
		<a href='./php/badges.php'>Merit Badges</a>
	</div>
	<a class='dropdown' href='#' onclick='toggleMenu(\"events\");'>Events</a>
	<div id='events'>
		<a href='./php/events.php'>Events List</a>
		<a href='./php/plc_notes.php'>PLC Notes</a>
	</div>";
}

echo "
	<a href='./php/downloads.php'>Downloads</a>
	<a href='./php/links.php'>Links</a>
	<a id='tail_link' href='./php/contact.php'>Contact Us</a>
</div>
";

?>