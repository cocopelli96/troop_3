//this javascript file is used to create the calendar on the calendar.php page

//create global variables and retrieve the current date
var today = new Date();
var hold = new Date();
var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

//create the calendar for current month
function createCalendar() {
	//create elements for the calendar
	var calendar = document.getElementById('calendar');
	var weekdays = document.createElement('THEAD');
	var month = document.createElement('TBODY');
	
	//reset the calendar hold date to the start of the month
	hold.setDate(1);
	
	//populate the calendar with data
	weekdays.appendChild(createWeek(-1));
	for (j = 0; j < 5; j++)
	{
		month.appendChild(createWeek(0));
	}
	
	calendar.appendChild(weekdays);
	calendar.appendChild(month);
	
	//add calendar to the website
	document.getElementById('month').innerHTML = months[hold.getMonth()] + " " + hold.getFullYear();
	
}

//create the calendar for a specified month and year
function createCalendar(month_val, year_val) {
	//create elements for the calendar
	var calendar = document.getElementById('calendar');
	var weekdays = document.createElement('THEAD');
	var month = document.createElement('TBODY');
	
	//reset the calendar hold date to the start of the month
	hold.setDate(1);
	hold.setMonth(month_val);
	hold.setFullYear(year_val);
	
	//populate the calendar with data
	weekdays.appendChild(createWeek(-1));
	for (j = 0; j < 5; j++)
	{
		month.appendChild(createWeek(0));
	}
	
	calendar.appendChild(weekdays);
	calendar.appendChild(month);
	
	//add calendar to the website
	document.getElementById('month').innerHTML = months[hold.getMonth()] + " " + hold.getFullYear();
	
}

//create the week data for the calendar
function createWeek(num) {
	//create elements for the week
	var week = document.createElement('TR');
	var display = hold.getMonth();
	var year = hold.getFullYear();
	
	if (num != -1)
	{
		//create a week for the calendar with the dates in the elements
		for (i = 0; i < 7; i++)
		{
			if (hold.getDay() == i && hold.getMonth() == display)
			{
				week.appendChild(createDay(hold.getDate()));
				hold.setDate(hold.getDate() + 1);
			}
			else
			{
				week.appendChild(createDay(' '));
			}
		}
	}
	else
	{
		//create a week for the calendar with the days of the week in the elements
		for (i = 0; i < 7; i++)
		{
			week.appendChild(createDay(days[i]));
		}
	}
	
	//reset date to end of the month if the date has passed the month the calendar is displaying
	if (hold.getMonth() != display)
	{
		hold.setMonth(display);
		hold.setFullYear(year);
	}
	
	return week;
}

//create day to insert into the calendar week
function createDay(insert) {
	//create day element
	var day = document.createElement('TD');
	
	//create data to go in the day element
	if (insert == hold.getDate())
	{
		day.id = hold.getMonth() + "-" + hold.getDate() + "-" + hold.getFullYear();
	}
	var text = document.createTextNode(insert);
	
	//add the data to the element
	day.appendChild(text);
	
	//if the element is the current day change the styles
	if (today.getDate() == insert && today.getMonth() == hold.getMonth() && today.getFullYear() == hold.getFullYear())
	{
		day.className = 'current_day';
	}
	
	return day;
}

//reset calendar to the previous month
function previousMonth() {
	//retrieve calendar
	var calendar = document.getElementById('calendar');
	
	//empty calendar
	while (calendar.hasChildNodes())
	{
		calendar.removeChild(calendar.childNodes[0]);
	}
	
	//recreate new calendar
	hold.setDate(1);
	hold.setMonth(hold.getMonth() - 1);
	createCalendar();
}

//reset calendar to the next month
function nextMonth() {
	//retrieve calendar
	var calendar = document.getElementById('calendar');

	//empty calendar
	while (calendar.hasChildNodes())
	{
		calendar.removeChild(calendar.childNodes[0]);
	}
	
	//recreate new calendar
	hold.setDate(1);
	hold.setMonth(hold.getMonth() + 1);
	createCalendar();
}

//insert common events into the calendar
function scoutMeetings() {
	//retrieve calendar elements
	var rows = document.getElementById('calendar').childNodes[1].childNodes;
	var count = 0;
	
	//insert common events
	for (i = 0; i < rows.length; i++)
	{
		var td = rows[i].childNodes[0];
		if (td.id != '')
		{
			if (count == 0)
			{
				td.innerHTML += '<span style=\"display:block;font-size: 80%;\">&bull; PLC</span>';
				td.innerHTML += '<span style=\"display:block;font-size: 80%;\">&bull; Committee Meeting</span>';
			}
			td.innerHTML += '<span style=\"display:block;font-size: 80%;\">&bull; Scout Meeting</span>';
			count++;
		}
	}
}