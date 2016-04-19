<!--//banner for pages found in the php folder-->
<div id='banner'>
	<img id="compass" src="../images/compass.jpeg" alt="compass image" />
	<h1>Troop 3 Burlington</h1>
	<div id="login">
		<?php
			$username = "username";
        	if(!isset($_COOKIE[$username]))
			{
				echo "<a href='login.php'>login</a>";
			}
			else
			{
				echo "<a href='account.php'>" . $_COOKIE[$username] . "</a> / 
				<a href='logout.php'>logout</a>";
			}
		?>
	</div>
</div>