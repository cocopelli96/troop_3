To set up the database code for this website please go to the files found in the database folder. You will want to run the files in the following order:

1. files_db_create.sql
2. roster_db_create.sql
3. user_db_create.sql
4. events_db_create.sql
5. files_db_insert.sql
6. roster_db_insert.sql
7. user_db_insert.sql
8. event_db_insert.sql

Note: You will have to edit the password and username for your database connection in the php files. I have run my code as the root user of my MAMP server which has the password root. You must change every connection.

The following files have connections that must be changed:

include folder:
	permissions.inc

php folder:
	account_manage.php
	account.php
	articles.php
	attendants.php
	badges.php
	calendar.php
	downloads.php
	events.php
	login_auth.php
	photos.php
	roster_adult.php
	roster_manage.php
	roster.php
	signup_submit.php
	signup.php

php/add folder:
	add_counselor.php
	add_scout.php
	add_user.php
	
php/delete folder:
	delete_article.php
	delete_badge.php
	delete_counselor.php
	delete_event.php
	delete_file.php
	delete_patrol.php
	delete_photo.php
	delete_scout.php
	delete_user.php

php/edit folder:
	edit_event_submit.php
	edit_event.php
	edit_password_submit.php
	edit_password.php
	edit_scout_submit.php
	edit_scout.php
	edit_user_contact_submit.php
	edit_user_contact.php
	edit_full_user_submit.php
	edit_full_user.php

php/upload folder:
	upload_article.php
	upload_badge.php
	upload_counselor.php
	upload_event.php
	upload_file.php
	upload_patrol.php
	upload_photo.php
	upload_scout.php
	upload_user.php
