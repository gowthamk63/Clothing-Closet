alter table person modify email varchar(40) not null;
alter table admin modify id int(20) primary key auto_increment;
alter table admin add constraint foreign key (id) references person (id);
alter table item modify dateOfAcquiring timestamp not null default current_timestamp;
alter table item modify posteddate date null ;
