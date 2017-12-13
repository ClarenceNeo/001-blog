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

select tag.title from post_and_tag left join tag on post_and_tag.tag_id = tag.id left join post on post.id = post_and_tag.post_id;

select post.id, tag.title from post_and_tag 
left join tag on post_and_tag.tag_id = tag.id 
left join post on post.id = post_and_tag.post_id 
where post.id = 23;

alter table post_and_tag add unique key (post_id, tag_id);
