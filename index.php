<?php

//Start Inclusion of basic HTML5 content
include("./include/header_1.inc");

//title of webpage
echo "
<title>Troop 3: Home</title>";

//include header (style and script linkage), banner, navigation
include("./include/header_2.inc");
include("./include/banner.inc");
include("./include/navbar.inc");

//main content start
echo "
<div id='main'>
<h1>Welcome to Troop 3</h1>

<div id='content' class='layer'>
	<table>
		<tr>
			<td class='sides'>
				<img id='scout' src='./images/scout.jpeg' alt='Boy Scout'/>
				<img id='prepared' src='./images/prepared.jpeg' alt='Prepared for Life'/>
			</td>
			<td id='intro'>
				<p>As a local Boy Scout Troop it is our goal to make leaders of todays youth while teaching them valuable skills and helping the community. We value teamwork, citizenship, hard workers, and reverence. Think you have what it takes to be a scout, join today.</p>
				<p>By visiting this site you can stay up to date with all things related to Troop 3 Burlington.</p>
				<p>Meetings: Our troop meets every Sunday at 6:00pm</p>
			</td>
			<td class='sides'>
				<img id='badges' src='./images/badges.jpeg' alt='Rank Badges'/>
			</td>
		</tr>
	</table>
</div>
</div>";
//main content end

//include footer and closing content
include("./include/footer_1.inc");

?>