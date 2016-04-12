use userdb;

delete from AccountContact where uid > 0 and contact_id > 0;
delete from userscout where uid > 0;
delete from usercontact where contact_id > 0;
delete from useraccount where uid > 0;
delete from permission where perm_id > 0;

insert into permission values(101, 'scout', 1);
insert into permission values(202, 'adult', 2);
insert into permission values(303, 'webmaster', 3);
insert into permission values(404, 'adultadmin', 4);

insert into useraccount values(1, 'user1', 'user1', 101);
insert into useraccount values(2, 'user2', 'user2', 101);
insert into useraccount values(3, 'webmaster', 'webmaster', 303);
insert into useraccount values(4, 'adult1', 'adult1', 202);
insert into useraccount values(5, 'adult2', 'adult2', 202);
insert into useraccount values(6, 'adultadmin', 'adultadmin', 404);
insert into useraccount values(7, 'henry.frye', 'gang78hug', 202);
insert into useraccount values(8, 'mark.newton', 'kenneled', 202);
insert into useraccount values(9, 'zack.powell', '42days', 202);
insert into useraccount values(10, 'samuel.aston', 'scouts&more', 202);
insert into useraccount values(11, 'johnathon.weed', 'floors4me', 202);
insert into useraccount values(12, 'marry.kennrick', 'Down!', 202);
insert into useraccount values(13, 'frank.hammond', 'JurrasicPark', 101);
insert into useraccount values(14, 'connor.smith', 'WeBelong', 101);
insert into useraccount values(15, 'isaac.mabie', 'whodat?', 101);
insert into useraccount values(16, 'bernie.johnson', 'html', 101);
insert into useraccount values(17, 'greg.sanders', 'eagleseeker', 101);
insert into useraccount values(18, 'adam.danvers', '23ravenmen', 101);
insert into useraccount values(19, 'xander.york', 'downdownwego', 101);
insert into useraccount values(20, 'carl.pilgrim', 'yesturday', 101);
insert into useraccount values(21, 'tyler.duns', 'Password69', 101);
insert into useraccount values(22, 'rodger.wensforth', 'idonotremember', 202);
insert into useraccount values(23, 'dan.hucker', 'whatpassword', 202);
insert into useraccount values(24, 'sarah.aston', '12345', 202);
insert into useraccount values(25, 'elizabeth.weed', 'NowYouSeeMeNow123!', 202);
insert into useraccount values(26, 'bruce.mabie', 'Notsof@st', 202);
insert into useraccount values(27, 'marcus.smith', 'itisfish', 202);
insert into useraccount values(28, 'fred.weed', 'camping', 101);
insert into useraccount values(29, 'chris.hucker', 'greysquirrel', 101);
insert into useraccount values(30, 'max.mabie', 'Livn2theM@x!', 101);
insert into useraccount values(31, 'bob.kennrick', 'sheep', 101);
insert into useraccount values(32, 'george.aston', 'barnicles', 101);
insert into useraccount values(33, 'zack.aston', '122planes', 101);
insert into useraccount values(34, 'hank.frye', '2cold4you', 101);
insert into useraccount values(35, 'peter.newton', '2gravity', 101);
insert into useraccount values(36, 'talyer.powell', 'stone78', 101);
insert into useraccount values(37, 'david.newton', 'apple', 101);
insert into useraccount values(38, 'jessie.smith', 'jessiejames', 101);
insert into useraccount values(39, 'nico.banner', 'deadmaster', 101);
insert into useraccount values(40, 'oliver.parker', 'spiders', 101);
insert into useraccount values(41, 'ryan.kent', '1fish2fish', 101);
insert into useraccount values(42, 'evan.baggins', 'evilbags3', 101);
insert into useraccount values(43, 'sam.wayne', 'sam232', 101);
insert into useraccount values(44, 'ben.alan', 'bentheman', 101);
insert into useraccount values(45, 'tyler.hallaway', 'hallways', 101);

insert into usercontact values(11, 'email');
insert into usercontact values(22, 'phone');

insert into accountcontact values(1, 11, 'user1@troop3.com');
insert into accountcontact values(2, 11, 'user2@troop3.com');
insert into accountcontact values(3, 11, 'webmaster@troop3.com');
insert into accountcontact values(4, 11, 'adult1@troop3.com');
insert into accountcontact values(5, 11, 'adult2@troop3.com');
insert into accountcontact values(6, 11, 'adultadmin@troop3.com');
insert into accountcontact values(7, 11, 'frye@verizon.net');
insert into accountcontact values(8, 11, 'newton@comcast.com');
insert into accountcontact values(9, 11, 'powell@yahoo.com');
insert into accountcontact values(10, 11, 'aston@verizon.net');
insert into accountcontact values(11, 11, 'weed@gmail.com');
insert into accountcontact values(12, 11, 'kennrick@hotmail.com');
insert into accountcontact values(13, 11, 'hammond@comcast.com');
insert into accountcontact values(14, 11, 'smith@gmail.com');
insert into accountcontact values(15, 11, 'mabie@verizon.net');
insert into accountcontact values(16, 11, 'johnson@verizon.net');
insert into accountcontact values(17, 11, 'sanders@comcast.com');
insert into accountcontact values(18, 11, 'danvers@hotmail.com');
insert into accountcontact values(19, 11, 'york@yahoo.com');
insert into accountcontact values(20, 11, 'pilgrim@yahoo.com');
insert into accountcontact values(21, 11, 'duns@gmail.com');
insert into accountcontact values(22, 11, 'wensforth@verizon.net');
insert into accountcontact values(23, 11, 'hucker@gmail.com');
insert into accountcontact values(24, 11, 'aston@comcast.net');
insert into accountcontact values(25, 11, 'weed@hotmail.com');
insert into accountcontact values(26, 11, 'whereme@comcast.com');
insert into accountcontact values(27, 11, 'hunter@verizon.net');
insert into accountcontact values(28, 11, 'sleepyman45@yahoo.com');
insert into accountcontact values(29, 11, 'cornhucker@gmail.com');
insert into accountcontact values(30, 11, 'questionmark@comcast.com');
insert into accountcontact values(31, 11, 'raidBoss127@hotmal.com');
insert into accountcontact values(32, 11, 'skyflyer34@yahoo.com');
insert into accountcontact values(33, 11, 'plane.lord@yahoo.com');
insert into accountcontact values(34, 11, 'friggidMaster@gmail.com');
insert into accountcontact values(35, 11, 'apple.picker@hotmail.com');
insert into accountcontact values(36, 11, 'stoneGuard@yahoo.com');
insert into accountcontact values(37, 11, 'physicsGuy28@comcast.com');
insert into accountcontact values(38, 11, 'normaldude231@verizon.net');
insert into accountcontact values(39, 11, 'deadwalker@gmail.com');
insert into accountcontact values(40, 11, 'spiderman@comcast.com');
insert into accountcontact values(41, 11, 'superman@verizon.net');
insert into accountcontact values(42, 11, 'thehobbit@gmail.com');
insert into accountcontact values(43, 11, 'millionare@hotmail.com');
insert into accountcontact values(44, 11, 'goshmyluck@yahoo.com');
insert into accountcontact values(45, 11, 'longesthallway@yahoo.com');

insert into userscout values(7, 1);
insert into userscout values(8, 2);
insert into userscout values(9, 3);
insert into userscout values(10, 4);
insert into userscout values(11, 5);
insert into userscout values(12, 6);
insert into userscout values(13, 7);
insert into userscout values(14, 8);
insert into userscout values(15, 9);
insert into userscout values(16, 10);
insert into userscout values(17, 11);
insert into userscout values(18, 12);
insert into userscout values(19, 13);
insert into userscout values(20, 14);
insert into userscout values(21, 15);
insert into userscout values(22, 16);
insert into userscout values(23, 17);
insert into userscout values(24, 18);
insert into userscout values(25, 19);
insert into userscout values(26, 20);
insert into userscout values(27, 21);
insert into userscout values(28, 22);
insert into userscout values(29, 23);
insert into userscout values(30, 24);
insert into userscout values(31, 25);
insert into userscout values(32, 26);
insert into userscout values(33, 27);
insert into userscout values(34, 28);
insert into userscout values(35, 29);
insert into userscout values(36, 30);
insert into userscout values(37, 31);
insert into userscout values(38, 32);
insert into userscout values(39, 33);
insert into userscout values(40, 34);
insert into userscout values(41, 35);
insert into userscout values(42, 36);
insert into userscout values(43, 37);
insert into userscout values(44, 38);
insert into userscout values(45, 39);

select * from useraccount;
select * from usercontact;
select * from userscout;
select * from accountcontact;
select * from permission;