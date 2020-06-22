create table `information`
(
	`iid` int unsigned not null auto_increment primary key,
	`wnum` char(3) not null,
	`wname` varchar(10),
	`cname` varchar(10),
	`location` varchar(50),
	`intro` varchar(50)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
create table `food`
(
	`fid` int unsigned not null auto_increment primary key,
	`name` varchar(15) not null,
	`time` char(2) not null,
	`price` decimal(6,2) not null,
	`wnum` char(3) not null,
	`stock` varchar(15) not null
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
create table `sell`
(
	`fid` int unsigned not null primary key,
	`sell` int(255) not null
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
create table `orders`
(
	`oid` int unsigned not null auto_increment primary key,
	`id` int(10) not null,
	`duetime` varchar(15) ,
	`ordertime` varchar(30) ,
	`package` char(1) ,
	`delivery` char(1),
	`destination` varchar(20),
	`tel` char(11),
	`complete` char(1),
	`payment` decimal(65,2),
	`finish` char(1)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
create table `ordersdetail`
(
	`ooid` int unsigned not null auto_increment primary key,
	`oid` int unsigned not null,
	`fid` int unsigned not null,
	`Name` varchar(15),
	`Price` decimal(6,2),
	`amount` int unsigned
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
create table `reviews`
(
	`rid` int unsigned not null auto_increment primary key,
	`fid` int unsigned,
	`score` int unsigned,
	`review` varchar(250)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
