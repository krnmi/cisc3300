CREATE DATABASE `in_class_18`;

CREATE TABLE `users`
(
    `id`            int(11) NOT NULL AUTO_INCREMENT,
    `username`      varchar(80) NOT NULL,
    `email`         TEXT NOT NULL,
    primary key (`id`)
);

CREATE TABLE `userComments`
(
    `id`            int(11) NOT NULL AUTO_INCREMENT,
    `usersID`       int(11) NOT NULL,
    `comment`       TEXT NOT NULL,
    primary key (`id`),
    foreign key (`usersID`) references `users`(`id`)
);

insert into users (username, email)
values ('Ronece Saab', 'rsaab@fordham.edu');
insert into users (username, email)
values ('Amy Wang', 'awang@fordham.edu');
insert into users (username, email)
values ('Bethany Shaw', 'bshaw@fordham.edu');


insert into userComments (comment, usersID)
values ('This is my test comment.', 1);
insert into userComments (comment, usersID)
values ('This is my test comment.', 2);
insert into userComments (comment, usersID)
values ('This is my test comment.', 3);

select * from users left join userComments on users.id = userComments.usersID;

select * from users join userComments on users.id = userComments.usersID;



