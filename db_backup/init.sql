create table post (`id` int unsigned not null auto_increment primary key, 
`title` varchar (64) not null,
`content` text not null,
`create_at` int unsigned not null,
`update_at` int unsigned not null,
`state` varchar (32) not null);

create table tag (`id` int unsigned not null auto_increment primary key, 
`title` varchar(64) not null);