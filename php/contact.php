<?php

$page_name = "Contact Us";

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Contact Us</title>
<script type='text/javascript' src='../common/confirm.js'></script>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<h1>Contact Us</h1>

<div id='contact_content' class='layer'>

<form name='contact_form' id='contact_form' action='mailto:adultadmin@troop3.com' onsubmit='return form_val();' method='post'>
	<table>
		<tbody>
		<tr>
			<td>
				<label for='fn'>First Name:</label>
			</td>
			<td>
				<input name='fn' id='fn' type='textbox' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='ln'>Last Name:</label>
			</td>
			<td>
				<input name='ln' id='ln' type='textbox' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='email'>Email:</label>
			</td>
			<td>
				<input name='em' id='em' type='textbox' size='35'/>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<label for='comments'>Comments:</label>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<textarea name='comments' id='comments' rows='10' cols='40'></textarea>
			</td>
		</tr>
		<tr style='text-align:center;'>
			<td colspan='2'>
				<button type='submit'>Submit</button>
				<button type='reset'>Clear</button>
			</td>
		</tr>
		</tbody>
	</table>
</form>

</div>

</div>";

//include footer and closing content
include("../include/footer_2.inc");

?>