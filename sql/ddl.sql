create database stewie;

create table if not exists questions (
  id int(11) not null auto_increment,
  question varchar(150) not null,
  answer varchar(150) default "no answer",

  constraint pk primary key (id)
);

create table if not exists admins (
  id int(11) not null auto_increment,
  username varchar(200) not null,
  password varchar(200) not null,
  hash varchar(200) not null,

  unique key user_uniq (username),
  constraint pk primary key (id)
);