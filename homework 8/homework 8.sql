CREATE DATABASE `homework 8`;

CREATE TABLE `notes`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`      varchar(80) NOT NULL,
    `description` TEXT NOT NULL,
    primary key (`id`)
);

insert into notes (title, description)
values ('title 1', 'this is note 1');
insert into notes (title, description)
values ('title 2', 'this is note 2');
insert into notes (title, description)
values ('title 3', 'this is note 3');

update notes set description = 'this is a note update' where title = 'title 1'
update notes set description = 'this is a note update' where title = 'title 2'

delete from notes where title = 'title 3'

select * from notes order by title desc
select * from notes
select * 
from 
notes 
where 
description like '%a%' 
and 
description like '%e%' 
and 
description like '%i%' 
and 
description like '%o%' 
and 
description like '%u%' 
and 
description not like '% %'
