<?php

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Links</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content start
echo "
<div id='main'>
<h1>Links</h1>

<div id='content' class='layer'>
<h2>Links To scouting Websites</h2>
Here are some links to some scouting sites:
<ul class='no_dots'>
	<li>
		<a href='http://www.scouting.org' target='_blank' >boy scouts</a>
	</li>
	<li>
		<a href='https://summit.scouting.org/en/Pages/default.aspx' target='_blank' >https://summit.scouting.org/en/Pages/default.aspx</a>
	</li>
	<li>
		<a href='http://meritbadge.org/wiki/index.php/Merit_Badge_Worksheets' target='_blank' >http://meritbadge.org/wiki/index.php/Merit_Badge_Worksheets</a>
	</li>
	<li>
		<a href='http://www.scoutorama.com/' target='_blank' >http://www.scoutorama.com/</a>
	</li>
	<li>
		<a href='http://philmontscoutranch.org/' target='_blank' >http://philmontscoutranch.org/</a>
	</li>
</ul>

<h2>Other Troop and Crew Websites</h2>
Here are links to other troop websites:
<ul class='no_dots'>
	<li>
		Troop 658 Winnooski: 
		<a href='http://winooski658.mytroop.us/' target='_blank' >http://winooski658.mytroop.us/</a>
	</li>
	<li>
		Troop 12 Leominster: 
		<a href='http://troop12leominster.webs.com/' target='_blank' >http://troop12leominster.webs.com/</a>
	</li>
	<li>
		Troop 4 Gardner: 
		<a href='http://www.gardnerscouting.org/troop4/' target='_blank' >http://www.gardnerscouting.org/troop4/</a>
	</li>
	<li>
		Troop 477 Leominster: 
		<a href='http://troop477.webs.com/' target='_blank' >http://troop477.webs.com/</a>
	</li>
	<li>
		Troop 1728 Lunenburg: 
		<a href='http://www.lunenburg.com/scouts/boyscouts/index.html' target='_blank' >http://www.lunenburg.com/scouts/boyscouts/index.html</a>
	</li>
</ul>
</div>

</div>";
//main content end

//include footer and closing content
include("../include/footer_2.inc");

?>