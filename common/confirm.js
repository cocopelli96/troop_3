//this file has javascript code for use in confirming data in forms

//confirm user wants to delete data
function confirmDelete(name) {
	return confirm("Do you really want to delete this " + name + "?");
}

//confirm data input of the contact us page form
function form_val() {
	//get values from form
	var fn = document.contact_form.fn.value;
	var ln = document.contact_form.ln.value;
	var em = document.contact_form.em.value;
	var comments = document.contact_form.comments.value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpText = /^[A-Z a-z]+$/;
	var RegExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	
	//check the input
	if (!RegExpText.test(fn))
		{
			alert("Please enter your first name");
			document.contact_form.fn.focus();
			document.contact_form.fn.select();
			document.contact_form.fn.style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpText.test(ln))
		{
			alert("Please enter your last name");
			document.contact_form.ln.focus();
			document.contact_form.ln.select();
			document.contact_form.ln.style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpEmail.test(em))
		{
			alert("Please enter your e-mail address");
			document.contact_form.em.focus();
			document.contact_form.em.select();
			document.contact_form.em.style.backgroundColor = "#ffffcc";
			return false;
		}
 	if (comments == "")
 		{
 			alert("Please enter a comment");
 			document.contact_form.comments.focus();
 			document.contact_form.comments.select();
			document.contact_form.comments.style.backgroundColor = "#ffffcc";
 			return false;
 		}
 	return true;
}

//confirm data input of forms for adding and editing scouts
function scoutForm() {
	//get values from form
	var sfn = document.getElementById('sfn').value;
	var sln = document.getElementById('sln').value;
	var street = document.getElementById('street').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var zip = document.getElementById('zip').value;
	var email = document.getElementById('email').value;
	var home_phone = document.getElementById('phone1').value;
	var cell_phone = document.getElementById('phone2').value;
	var rank = document.getElementById('rank').value;
	var leadership = document.getElementById('leadership').value;
	var patrol = document.getElementById('patrols').value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpText = /^[A-Z a-z]+$/;
	var RegExpStreet = /^[A-Z a-z 0-9]+$/;
	var RegExpZip = /^[0-9]{5}$/;
	var RegExpSt = /^[A-Z]{2}$/;
	var RegExpPhone = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\.\s]{0,1}[0-9]{3}[-\.\s]{0,1}[0-9]{4}$/;
	///^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	var RegExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var RegExpIds = /^[0-9]+$/;
	
	//check the input
	if (!RegExpText.test(sfn))
		{
			alert("Please enter scout's first name");
			document.getElementById('sfn').focus();
			document.getElementById('sfn').select();
			document.getElementById('sfn').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpText.test(sln))
		{
			alert("Please enter scout's last name");
			document.getElementById('sln').focus();
			document.getElementById('sln').select();
			document.getElementById('sln').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpStreet.test(street))
		{
			alert("Please enter scout's street address");
			document.getElementById('street').focus();
			document.getElementById('street').select();
			document.getElementById('street').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpText.test(city))
		{
			alert("Please enter scout's city address");
			document.getElementById('city').focus();
			document.getElementById('city').select();
			document.getElementById('city').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpSt.test(state))
		{
			alert("Please enter scout's state address");
			document.getElementById('state').focus();
			document.getElementById('state').select();
			document.getElementById('state').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpZip.test(zip))
		{
			alert("Please enter a valid zip code");
			document.getElementById('zip').focus();
			document.getElementById('zip').select();
			document.getElementById('zip').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!(RegExpPhone.test(home_phone) && home_phone != "") && !(RegExpPhone.test(cell_phone) && cell_phone != ""))
		{
			alert("Please enter scout's phone number");
			document.getElementById('phone1').focus();
			document.getElementById('phone1').select();
			document.getElementById('phone1').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpEmail.test(email))
		{
			alert("Please enter scout's e-mail address");
			document.getElementById('email').focus();
			document.getElementById('email').select();
			document.getElementById('email').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpIds.test(rank))
		{
			alert("Please select scout's rank");
			document.getElementById('rank').focus();
			document.getElementById('rank').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpIds.test(leadership))
		{
			alert("Please select scout's leadership position");
			document.getElementById('leadership').focus();
			document.getElementById('leadership').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpIds.test(patrol))
		{
			alert("Please select scout's patrol");
			document.getElementById('patrols').focus();
			document.getElementById('patrols').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data input for user contact update form
function userContact() {
	//get values from form
	var email = document.getElementById('email').value;
	var phone = document.getElementById('phone').value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpPhone = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\.\s]{0,1}[0-9]{3}[-\.\s]{0,1}[0-9]{4}$/;
	///^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	var RegExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	//check the input
	if (!(RegExpPhone.test(phone) && phone != "") && !(RegExpEmail.test(email) && email != ""))
		{
			alert("Please enter user's contact");
			document.getElementById('phone').focus();
			document.getElementById('phone').select();
			document.getElementById('phone').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data input for user password update form
function userPassword() {
	//get values from form
	var pass = document.getElementById('pass').value;
	var pass2 = document.getElementById('pass_check').value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpPassword = /^[\S]+$/;

	//check the input
	if (!RegExpPassword.test(pass))
		{
			alert("Please enter user's password");
			document.getElementById('pass').focus();
			document.getElementById('pass').select();
			document.getElementById('pass').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpPassword.test(pass2))
		{
			alert("Please confirm user's password");
			document.getElementById('pass_check').focus();
			document.getElementById('pass_check').select();
			document.getElementById('pass_check').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (pass != pass2)
		{
			alert("User's password must be the same");
			document.getElementById('pass_check').focus();
			document.getElementById('pass_check').select();
			document.getElementById('pass_check').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data input for user add and edit forms
function userForm() {
	//get values from form
	var uname = document.getElementById('uname').value;
	var permission = document.getElementById('permission').value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpText = /^[\S]+$/;
	var RegExpIds = /^[0-9]+$/;
	
	//check the input
	if (!RegExpText.test(uname))
		{
			alert("Please enter user name");
			document.getElementById('uname').focus();
			document.getElementById('uname').select();
			document.getElementById('uname').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!userPassword())
	{
		return false;
	}
	if (!userContact())
	{
		return false;
	}
	if (!RegExpIds.test(permission))
		{
			alert("Please select user's permission");
			document.getElementById('permission').focus();
			document.getElementById('permission').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data input for event add and edit forms
function eventForm() {
	//get values from form
	var event_name = document.getElementById('event_name').value;
	var location = document.getElementById('location').value;
	var description = document.getElementById('description').value;
	var start_date = document.getElementById('start').value;
	var end_date = document.getElementById('end').value;
	var signup_date = document.getElementById('deadline').value;
	var cost = document.getElementById('cost').value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpText = /^[\S\s]+$/;
	var RegExpCost = /^[0-9]+$/;
	var RegExpDate = /^[0-1]{1}[0-9]{1}[-]{1}[0-3]{1}[0-9]{1}[-]{1}[0-9]{4}[\s]{1}[0-2]{1}[0-9]{1}[:]{1}[0-5]{1}[0-9]{1}[:]{1}[0-5]{1}[0-9]{1}$/;
	
	//check the input
	if (!RegExpText.test(event_name))
		{
			alert("Please enter event name");
			document.getElementById('event_name').focus();
			document.getElementById('event_name').select();
			document.getElementById('event_name').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpText.test(location))
		{
			alert("Please enter event location");
			document.getElementById('location').focus();
			document.getElementById('location').select();
			document.getElementById('location').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpText.test(description))
		{
			alert("Please enter event description");
			document.getElementById('description').focus();
			document.getElementById('description').select();
			document.getElementById('description').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpDate.test(start_date))
		{
			alert("Please enter start date of event in format: 01-15-2016 18:00:00");
			document.getElementById('start').focus();
			document.getElementById('start').select();
			document.getElementById('start').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpDate.test(end_date) || end_date < start_date)
		{
			alert("Please enter end date of event in format: 01-15-2016 18:00:00");
			document.getElementById('end').focus();
			document.getElementById('end').select();
			document.getElementById('end').style.backgroundColor = "#ffffcc";
			return false;
		}
	if ((signup_date != '' || cost != '') && !RegExpDate.test(signup_date))
		{
			alert("Please enter signup deadline date of event in format: 01-15-2016 18:00:00");
			document.getElementById('deadline').focus();
			document.getElementById('deadline').select();
			document.getElementById('deadline').style.backgroundColor = "#ffffcc";
			return false;
		}
	if ((signup_date != '' || cost != '') && !RegExpCost.test(cost))
		{
			alert("Please enter event's cost");
			document.getElementById('cost').focus();
			document.getElementById('cost').select();
			document.getElementById('cost').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data for the login page form
function loginForm() {
	//get values from form
	var pass = document.getElementById('pass').value;
	var uname = document.getElementById('user').value;

// expressions
// / = start regexpression, ^ = start, [..] = valid input, + = repeat indefinitely, $ = to end of field, / = finish, \.- = literal period or hyphen, ? = can happen once, w = alphanumeric, * = zero or more, w{2,4} = limited space for characters
	var RegExpPassword = /^[\S]+$/;

	//check the input
	if (!RegExpPassword.test(uname))
		{
			alert("Please enter user name");
			document.getElementById('user').focus();
			document.getElementById('user').select();
			document.getElementById('user').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!RegExpPassword.test(pass))
		{
			alert("Please enter password");
			document.getElementById('pass').focus();
			document.getElementById('pass').select();
			document.getElementById('pass').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data for the photo uploading form
function fileForm() {
	//get values from form
	var file = document.getElementById('fileToUpload').value;

	//necessary regular expressions
	var RegExpBlank = /^[\s]+$/;

	//check the input
	if (RegExpBlank.test(file) || file == "")
		{
			alert("Please select a file");
			document.getElementById('fileToUpload').focus();
			document.getElementById('fileToUpload').select();
			document.getElementById('fileToUpload').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data for the article uploading form
function articleForm() {
	//get values from form
	var name = document.getElementById('articleTitle').value;

	//necessary regular expressions
	var RegExpBlank = /^[\s]+$/;

	//check the input
	if (RegExpBlank.test(name) || name == "")
		{
			alert("Please enter a name for the article");
			document.getElementById('articleTitle').focus();
			document.getElementById('articleTitle').select();
			document.getElementById('articleTitle').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!fileForm())
	{
		return false;
	}
 	return true;
}

//confirm data for the file uploading form
function downloadForm() {
	//get values from form
	var name = document.getElementById('fileName').value;

	//necessary regular expressions
	var RegExpBlank = /^[\s]+$/;

	//check the input
	if (RegExpBlank.test(name) || name == "")
		{
			alert("Please enter a name for the file");
			document.getElementById('fileName').focus();
			document.getElementById('fileName').select();
			document.getElementById('fileName').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (!fileForm())
	{
		return false;
	}
 	return true;
}

//confirm data input for the badge add form
function badgeForm() {
	//get values from form
	var name = document.getElementById('badgeTitle').value;

	//necessary regular expressions
	var RegExpBlank = /^[\s]+$/;

	//check the input
	if (RegExpBlank.test(name) || name == "")
		{
			alert("Please enter a name for the badge");
			document.getElementById('badgeTitle').focus();
			document.getElementById('badgeTitle').select();
			document.getElementById('badgeTitle').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data input for the patrol add form
function patrolForm() {
	//get values from form
	var name = document.getElementById('pname').value;

	//necessary regular expressions
	var RegExpBlank = /^[\s]+$/;

	//check the input
	if (RegExpBlank.test(name) || name == "")
		{
			alert("Please enter a name for the patrol");
			document.getElementById('pname').focus();
			document.getElementById('pname').select();
			document.getElementById('pname').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data input for the PLC Notes update form
function notesForm() {
	//get values from form
	var notes = document.getElementById('notes').value;
	
	//necessary regular expressions
	var RegExpBlank = /^[\s]+$/;

	//check the input
	if (RegExpBlank.test(notes) || notes == "")
		{
			alert("Please enter the PLC Notes");
			document.getElementById('notes').focus();
			document.getElementById('notes').select();
			document.getElementById('notes').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}

//confirm data for the counselor add form
function counselorForm() {
	//get values from form
	var badge = document.getElementById('badges').value;
	var counselor = document.getElementById('adults').value;

	//check the input
	if (badge == "none")
		{
			alert("Please select a badge");
			document.getElementById('badges').focus();
			document.getElementById('badges').style.backgroundColor = "#ffffcc";
			return false;
		}
	if (counselor == "none")
		{
			alert("Please select a counselor");
			document.getElementById('adults').focus();
			document.getElementById('adults').style.backgroundColor = "#ffffcc";
			return false;
		}
 	return true;
}