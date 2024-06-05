create database moonuse;
use moonuse;
drop database moonuse;

create table user (
id_user INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR (50) NOT NULL,
email VARCHAR (255) NOT NULL,
password VARCHAR(225) NOT NULL,
usertype VARCHAR (255) NOT NULL
);

select * from user;

INSERT INTO `user` (`username`, `email`, `password`, `usertype`) VALUES
('vykall', 'admin_moon@gmail.com', 'welcomeadmin1', 'admin'),
('kayla', 'pottermore@gmail.com', 'here110404', 'user');

/*CREATE TABLE book (
  id_book INT PRIMARY KEY AUTO_INCREMENT,
  id_title INT,
  chapter VARCHAR(225),
  id_user INT,	
  id_admin INT,
  tgl_input timestamp
) ;*/

CREATE TABLE title (
  id_title INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(225) NOT NULL,
  cover VARCHAR(225) NOT NULL,
  synopsis TEXT
);

INSERT INTO `title` (`title`, `cover`, `synopsis`) VALUES
('Trash of the Counts Family', 'tcf.jpg', '..........'),
('Omniscient Readers Viewpoint', 'omv.jpg', '..........');

select * from title;
