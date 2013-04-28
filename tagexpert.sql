create database TagExpert;

use TagExpert;

create table user_profile (
    user_id int unsigned not null auto_increment primary key,
    fname varchar(20) not null,
    lname varchar(20) not null,
    email varchar(50),
    password varchar(256) not null,
    user_group varchar(20) not null
);

create table tag_profile (
    tag_id int unsigned auto_increment primary key not null,
    tag_name varchar(20) not null
);

create table user_tag_score (
    user_id int unsigned not null,
    tag_id int unsigned not null,
    foreign key(tag_id) references tag_profile(tag_id),
    foreign key(user_id) references user_profile(user_id),
    score int not null
);

create table posting_profile (
    posting_id int unsigned auto_increment primary key not null,
    parent_posting_id int unsigned,
    user_id int unsigned not null,
    title varchar(80) not null,
    content mediumtext not null,
    hit int unsigned not null,
    post_date datetime not null,
    last_modify_date datetime,
    foreign key(user_id) references user_profile(user_id),
    foreign key(parent_posting_id) references posting_profile(posting_id)
);

create table posting_refer_tag (
    posting_id int unsigned not null,
    tag_id int unsigned not null,
    foreign key(posting_id) references posting_profile(posting_id),
    foreign key(tag_id) references tag_profile(tag_id)
);

create table user_description (
    user_id int unsigned not null,
    tag_id int unsigned not null,
    foreign key(user_id) references user_profile(user_id),
    foreign key(tag_id) references tag_profile(tag_id)
);
