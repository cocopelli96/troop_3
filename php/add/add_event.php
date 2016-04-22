<?php

//Start Inclusion of basic HTML5 content
include("../../include/header_4.inc");

//title of webpage
echo "
<title>Troop 3: Add Event</title>
<script type='text/javascript' src='../../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../../include/header_2.inc");
include("../../include/banner_3.inc");
include("../../include/navbar_3.inc");

//main content start
echo "
<div id='main'>
<div id='edit_content' class='layer'>
<h1>Add Event</h1>
<form name='upload_event' action='../upload/upload_event.php' method='post' onsubmit='return eventForm();' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>
				<label for='event_name'>Event Name:</label>
			</td>
			<td>
				<input type='textbox' name='event_name' id='event_name' maxlength='45' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='location'>Event Location:</label>
			</td>
			<td>
				<input type='textbox' name='location' id='location' maxlength='45' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='description'>Event Description:</label>
			</td>
			<td>
				<textarea name='description' id='description' rows='5' cols='30' maxlength='225'></textarea>
			</td>
		</tr>
		<tr>
			<td colspan='2'>Please set up dates in the following format:<br />month-day-year 24 hour time with seconds<br />ex: 01-05-2000 15:00:00 is January 5, 2000 at 3:00pm</td>
		</tr>
		<tr>
			<td>
				<label for='start'>Start Date:</label>
			</td>
			<td>
				<input type='textbox' name='start' id='start' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='end'>End Date:</label>
			</td>
			<td>
				<input type='textbox-local' name='end' id='end' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='deadling'>Sign Up Deadline:</label>
			</td>
			<td>
				<input type='textbox' name='deadline' id='deadline' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='cost'>Cost:</label>
			</td>
			<td>
				<input type='textbox' name='cost' id='cost' />
			</td>
		</tr>
    	<tr>
    		<td colspan='2'>
   				<input type='submit' value='Add Event' name='submit' />
   			</td>
   		</tr>
    </table>
</form>
</div>
<a id='return' href='../events.php'>Return</a>
</div>";
//main content end

//include footer and closing content
include("../../include/footer_3.inc");

?>