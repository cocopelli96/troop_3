use eventsdb;

delete from SignUp where event_id > 0 or signup_id > 0;
delete from Attendant where event_id > 0 or sid > 0;
delete from Event where event_id > 0;

insert into Event values(1, 'Rock Climbing Badge', 'Campout at rock climbing facitity with oppurtunity for scouts to earn Climbing Merit badge.', 'New Hampshire', '2016-04-15 18:00:00', '2016-04-17 11:00:00');
insert into Event values(2, 'Spring Camporee', 'Spring Camporee, a large campout where many troops come together to particapte in games and activities. This is an oppurtunity to learn about other troops and have fun with a new group of people.', 'Vermont', '2016-04-30 18:00:00', '2016-05-01 11:00:00');
insert into Event values(3, 'Hike up Mt. Norris', 'Hike on a Saturday up Mt. Norris as a troop. Come have a great time in the outdoors with friends and maybe learn a bit about Leave No Trace on the way up.', 'Mt. Norris, VT', '2016-04-23 8:00:00', '2016-04-23 17:00:00');
insert into Event values(4, 'Ice Fishing Campout', 'We will be camping out at Camp Collier and doing some ice fishing while we are there.', 'Gardner, MA', '2016-03-13 18:00:00', '2016-03-15 10:00:00');
insert into Event values(5, 'Merit Badge University', 'Come to Fitchburg State University and work on earning some merit badges', 'Fitchburg, MA', '2016-02-13 8:30:00', '2016-02-13 12:30:00');
insert into Event values(6, 'Merit Badge University', 'Come to Fitchburg State University and work on earning some merit badges', 'Fitchburg, MA', '2016-02-27 8:30:00', '2016-02-27 12:30:00');
insert into Event values(7, 'Merit Badge University', 'Come to Fitchburg State University and work on earning some merit badges', 'Fitchburg, MA', '2016-03-12 8:30:00', '2016-03-12 12:30:00');
insert into Event values(8, 'Freeze Out', 'It might be cold in Jaunaury but it is time for the great Freeze Out and camping in -9 degree weather.', 'Essex, VT', '2016-01-22 18:00:00', '2016-01-24 10:00:00');
insert into Event values(9, 'Scout Sunday', 'A scout is reverent, it is time to show this by attending church as a troop.', 'Winnooski, VT', '2016-02-07 9:30:00', '2016-02-07 12:00:00');
insert into Event values(10, 'Memorial Day Flag Planting', 'A scout has a duty to country, let us show our support of the soldier who fight and have fought for our great country.', 'Leominster, MA', '2016-05-21 8:00:00', '2016-05-21 10:00:00');
insert into Event values(11, 'Memorial Day White Cross Ceremony', 'A scout has a duty to country, let us show our support of the soldier who fight and have fought for our great country.', 'Leominster, MA', '2016-05-20 18:00:00', '2016-05-20 21:00:00');
insert into Event values(12, 'Memorial Day Brick Laying', 'A scout has a duty to country, let us show our support of the soldier who fight and have fought for our great country.', 'Leominster, MA', '2016-05-18 18:00:00', '2016-05-18 20:00:00');
insert into Event values(13, 'Memorial Day Parade', 'A scout has a duty to country, let us show our support of the soldier who fight and have fought for our great country.', 'Leominster, MA', '2016-05-23 10:00:00', '2016-05-23 12:00:00');
insert into Event values(14, 'Flag Day', 'A scout has a duty to country, let us show our beiliefs in the American flag and what it stands for.', 'Leominster, MA', '2016-06-14 10:00:00', '2016-06-14 12:00:00');

insert into SignUp values(1, '2016-04-10 23:59:00', 5, 1);
insert into SignUp values(2, '2016-04-24 23:59:00', 8, 2);
insert into SignUp values(3, '2016-03-10 23:59:00', 3, 4);
insert into SignUp values(4, '2016-01-04 23:59:00', 8, 8);

insert into Attendant values(1, 1);
insert into Attendant values(3, 1);
insert into Attendant values(5, 1);
insert into Attendant values(7, 1);
insert into Attendant values(9, 1);
insert into Attendant values(10, 1);
insert into Attendant values(12, 1);

insert into Attendant values(3, 2);
insert into Attendant values(4, 2);
insert into Attendant values(5, 2);
insert into Attendant values(15, 2);
insert into Attendant values(14, 2);
insert into Attendant values(7, 2);
insert into Attendant values(8, 2);

insert into Attendant values(6, 4);
insert into Attendant values(2, 4);
insert into Attendant values(1, 4);
insert into Attendant values(9, 4);
insert into Attendant values(7, 4);
insert into Attendant values(5, 4);
insert into Attendant values(13, 4);
insert into Attendant values(12, 4);
insert into Attendant values(11, 4);

insert into Attendant values(2, 8);
insert into Attendant values(3, 8);
insert into Attendant values(6, 8);
insert into Attendant values(5, 8);
insert into Attendant values(9, 8);
insert into Attendant values(11, 8);
insert into Attendant values(13, 8);
insert into Attendant values(8, 8);
insert into Attendant values(15, 8);

select * from Event;
select * from SignUp;
select * from Attendant;
