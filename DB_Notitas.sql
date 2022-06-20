CREATE TABLE notitas (
       id int primary key auto_increment,
       title varchar(80),
       content text,
       color enum('yellow','pink','lilac','lightBlue'),
       user_id int
);


CREATE TABLE users (
       id int primary key auto_increment,
       nick varchar(80) unique,
       mail varchar(80) unique,
       password varchar(255),
       token varchar(255),
       avatar varchar(64) unique,
       admin bool
       
);
