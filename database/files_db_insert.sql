use filesdb;

delete from Files where fid > 0;
delete from FileType where type_id > 0;

insert into FileType values(101, 'File');
insert into FileType values(202, 'Article');
insert into FileType values(303, 'Photo');

insert into Files values(1, '../files/articles/frosted.txt', 'Frosted', 202);
insert into Files values(2, '../files/articles/camp_collier.txt', 'Camp Collier', 202);
insert into Files values(3, '../files/articles/an_eagle_takes_flight.txt', 'An Eagle Takes Flight', 202);
insert into Files values(4, '../files/articles/camp_split_rock.txt', 'Camp Split Rock', 202);
insert into Files values(5, '../files/articles/changing_of_the_guard.txt', 'Changing of the Guard', 202);
insert into Files values(6, '../files/articles/freeze_out_2012.txt', 'Freeze Out 2012', 202);
insert into Files values(7, '../files/articles/ice_fishing_demo.txt', 'Ice Fishing Demo', 202);
insert into Files values(8, '../files/articles/mailing_party.txt', 'Mailing Party', 202);
insert into Files values(9, '../images/gallery/compass.jpeg', 'Main', 303);
insert into Files values(10, '../images/gallery/compass_test.jpeg', 'Main', 303);
insert into Files values(11, '../images/gallery/court_of_honor1.jpeg', 'Main', 303);
insert into Files values(12, '../images/gallery/freeze_out1.jpeg', 'Main', 303);
insert into Files values(13, '../images/gallery/freeze_out2.jpeg', 'Main', 303);
insert into Files values(14, '../images/gallery/freeze_out3.jpeg', 'Main', 303);
insert into Files values(15, '../images/gallery/freeze_out4.jpeg', 'Main', 303);
insert into Files values(16, '../images/gallery/freeze_out5.jpeg', 'Main', 303);
insert into Files values(17, '../images/gallery/ice_fishing1.jpeg', 'Main', 303);
insert into Files values(18, '../images/gallery/ice_fishing2.jpeg', 'Main', 303);
insert into Files values(19, '../images/gallery/ice_fishing3.jpeg', 'Main', 303);
insert into Files values(20, '../images/gallery/ice_fishing4.jpeg', 'Main', 303);
insert into Files values(21, '../images/gallery/ice_fishing5.jpeg', 'Main', 303);
insert into Files values(22, '../images/gallery/scouting1.jpeg', 'Main', 303);
insert into Files values(23, '../images/gallery/scouting2.jpeg', 'Main', 303);
insert into Files values(24, '../images/gallery/scouting3.jpeg', 'Main', 303);
insert into Files values(25, '../files/downloads/med_form.pdf', 'Medical Form', 101);
insert into Files values(26, '../files/downloads/guide_safe_scouting.pdf', 'Guide to Safe Scouting', 101);
insert into Files values(27, '../files/downloads/code_of_conduct.pdf', 'Scouting Code of Conduct', 101);
insert into Files values(28, '../files/downloads/permission_slip.pdf', 'Permission Slip', 101);

select * from FileType;
select * from Files;
