drop database if exists sinhambredb;
create database if not exists sinhambredb;

use sinhambredb;

create table data (
	email varchar(50) not null primary key,
	name varchar(45) not null,
	paymenttype enum("creditcard", "debitcard", "cash", "others")
)engine=innodb;