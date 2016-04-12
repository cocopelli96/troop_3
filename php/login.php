<?php

$page_name = "Login";

//Start Inclusion of basic HTML5 content
include("../include/header_3.inc");

//title of webpage
echo "
<title>Troop 3: Login</title>";

//include header (style and script linkage), banner, navigation
include("../include/header_2.inc");
include("../include/banner_2.inc");
include("../include/navbar_2.inc");

//main content
echo "
<div id='main'>
<div id='login_content' class='layer'>
<h1 id='head'>Login</h1>

<form name='login_form' id='login_form' action='login_auth.php' onsubmit='return loginForm();' method='post'>
	<table>
		<tbody>
		<tr>
			<td>
				<label for='user'>User Name:</label>
			</td>
			<td>
				<input name='user' id='user' type='textbox' />
			</td>
		</tr>
		<tr>
			<td>
				<label for='pass'>Password:</label>
			</td>
			<td>
				<input name='pass' id='pass' type='password' />
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<button type='submit'>Login</button>
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