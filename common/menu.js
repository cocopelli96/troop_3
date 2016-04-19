//this file holds the javascript for the dynamic menues

//function to toggle between menues
function toggleMenu(id) {
	var gallery = document.getElementById("gallery").style;
	var roster = document.getElementById("roster").style;
	var events = document.getElementById("events").style;
	
	if (id == "gallery")
	{
		displayMenu(id);
		roster.display = "none";
		events.display = "none";
	}
	else if (id == "roster")
	{
		displayMenu(id);
		gallery.display = "none";
		events.display = "none";
	}
	else if (id == "events")
	{
		displayMenu(id);
		roster.display = "none";
		gallery.display = "none";
	}
}

//function to toggle menu display property
function displayMenu(id) {
	var menu = document.getElementById(id).style;
	
	if (menu.display == "block")
	{
		menu.display = "none";
	}
	else
	{
		menu.display = "block";
	}
}