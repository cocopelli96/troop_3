<?php

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: About Us</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1>About Us</h1>

<div id='content' class='layer'>
	<p>Boy Scouts is an amazing program that can help to grow youthes into leaders which will help to make a better world. Scouting provides many oppurtunities to learn skills from knot tying and first aid to survival and leadership. Many fun activities and campouts occur throughout the year the  giving scouts chances to try new things and a way to hangout with their friends.</p>
	<p>Troop 3 Burlington is a dedicated group of indivuals. The scouts run the program here while the adult leaders ensure that everyone is safe. It is a safe learning environment where the scout can have as many expierences as they seek to have. This program is often only limited by what you bring to the table.</p>
	<p>Any boy of the age of 11 having passed 5th grade can join the Troop 3 Burlington. Any person wanting to see a meeting can stop by during our troop meetings to see what we do and what scouting offers. Parents are encouraged to get involved but there is no obligation. Just one hour of scouting a week, can make a world of difference.</p>
</div>
</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>