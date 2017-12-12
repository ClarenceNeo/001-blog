create table post (`id` int unsigned not null auto_increment primary key, 
`title` varchar (64) not null,
`content` text not null,
`create_at` int unsigned not null,
`update_at` int unsigned not null,
`state` varchar (32) not null);

create table tag (`id` int unsigned not null auto_increment primary key, 
`title` varchar(64) not null);

CREATE TABLE `post_and_tag`
(
  `id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL
);