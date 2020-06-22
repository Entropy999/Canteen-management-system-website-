create table `user`
(
	`id` int unsigned not null auto_increment primary key,
	`username` varchar(7) not null,
	`password` varchar(32) not null,
	`realname` varchar(10) not null,
	`tel` char(11) not null,
	`gp` varchar(5)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
create table `manager`
(
	`id` int unsigned not null auto_increment primary key,
	`wnum` char(3) not null,
	`password` varchar(32) not null,
	`realname` varchar(10) not null,
	`tel` char(11) not null
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
