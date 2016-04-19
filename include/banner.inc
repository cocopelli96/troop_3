<!--//banner for the home page-->
<div id='banner'>
	<img id="compass" src="./images/compass.jpeg" alt="compass image" />
	<h1>Troop 3 Burlington</h1>
	<div id="login">
		<?php
			$username = "username";
			if(!isset($_COOKIE[$username]))
			{
				echo "<a href='./php/login.php'>login</a>";
			}
			else
			{
				echo "<a href='./php/account.php'>" . $_COOKIE[$username] . "</a> / 
				<a href='./php/logout.php'>logout</a>";
			}
		?>
	</div>
</div>