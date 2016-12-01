alter table item change `cond` `condition` varchar(1) not null;
alter table item modify id int(20) auto_increment;
alter table donator add constraint foreign key (id) references person(id);
alter table donation_history add constraint foreign key (personid) references donator(id);
alter table purchase_history add constraint foreign key (personid) references buyer(id);
alter table role modify column id int(20) auto_increment;
alter table item change `value` `revised_price` double not null;
