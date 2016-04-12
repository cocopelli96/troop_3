var today = new Date();
var hold = new Date();
var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function createCalendar() {
	var calendar = document.getElementById('calendar');
	var weekdays = document.createElement('THEAD');
	var month = document.createElement('TBODY');
	
	hold.setDate(1);
	
	weekdays.appendChild(createWeek(-1));
	for (j = 0; j < 5; j++)
	{
		month.appendChild(createWeek(0));
	}
	
	calendar.appendChild(weekdays);
	calendar.appendChild(month);
	
	document.getElementById('month').innerHTML = months[hold.getMonth()] + " " + hold.getFullYear();
	
}

function createCalendar(month_val, year_val) {
	var calendar = document.getElementById('calendar');
	var weekdays = document.createElement('THEAD');
	var month = document.createElement('TBODY');
	
	hold.setDate(1);
	hold.setMonth(month_val);
	hold.setFullYear(year_val);
	
	weekdays.appendChild(createWeek(-1));
	for (j = 0; j < 5; j++)
	{
		month.appendChild(createWeek(0));
	}
	
	calendar.appendChild(weekdays);
	calendar.appendChild(month);
	
	document.getElementById('month').innerHTML = months[hold.getMonth()] + " " + hold.getFullYear();
	
}

function createWeek(num) {
	var week = document.createElement('TR');
	var display = hold.getMonth();
	var year = hold.getFullYear();
	
	if (num != -1)
	{
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
		for (i = 0; i < 7; i++)
		{
			week.appendChild(createDay(days[i]));
		}
	}
	
	if (hold.getMonth() != display)
	{
		hold.setMonth(display);
		hold.setFullYear(year);
	}
	
	return week;
}

function createDay(insert) {
	var day = document.createElement('TD');
	if (insert == hold.getDate())
	{
		day.id = hold.getMonth() + "-" + hold.getDate() + "-" + hold.getFullYear();
	}
	var text = document.createTextNode(insert);
	
	day.appendChild(text);
	if (today.getDate() == insert && today.getMonth() == hold.getMonth() && today.getFullYear() == hold.getFullYear())
	{
		day.className = 'current_day';
	}
	
	return day;
}

function previousMonth() {
	var calendar = document.getElementById('calendar');
	
	while (calendar.hasChildNodes())
	{
		calendar.removeChild(calendar.childNodes[0]);
	}
	
	hold.setDate(1);
	hold.setMonth(hold.getMonth() - 1);
	createCalendar();
}

function nextMonth() {
	var calendar = document.getElementById('calendar');

	while (calendar.hasChildNodes())
	{
		calendar.removeChild(calendar.childNodes[0]);
	}
	
	hold.setDate(1);
	hold.setMonth(hold.getMonth() + 1);
	createCalendar();
}

function scoutMeetings() {
	var rows = document.getElementById('calendar').childNodes[1].childNodes;
	for (i = 0; i < rows.length; i++)
	{
		var td = rows[i].childNodes[0];
		if (td.id != '')
		{
			td.innerHTML += '<span style=\"display:block;font-size: 80%;\">&bull; Scout Meeting</span>';
		}
	}
}