DROP DATABASE if EXISTS achievelife;
CREATE DATABASE achievelife;
USE achievelife;



DROP TABLE if EXISTS Admins;
CREATE TABLE Admins (
  uid 				int(10) NOT NULL AUTO_INCREMENT, 
  firstName			varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  lastName			varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  userName			varchar(30) UNIQUE NOT NULL COLLATE utf8_unicode_ci,
  email				varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  password          varchar(40) COLLATE utf8_unicode_ci,
  gender			varchar(1) COLLATE utf8_unicode_ci,
  title				varchar(40) COLLATE utf8_unicode_ci,
  pCount			int(10),
  aCount			int(4),
  pPic				BLOB NOT NULL,
  pPicName 			varchar(50) COLLATE utf8_unicode_ci,
  dateCreated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (uid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS Users;
CREATE TABLE Users (
  uid 				int(10) NOT NULL AUTO_INCREMENT, 
  firstName			varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  lastName			varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  userName			varchar(30) UNIQUE NOT NULL COLLATE utf8_unicode_ci,
  email				varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  password          varchar(40) COLLATE utf8_unicode_ci,
  gender			varchar(1) COLLATE utf8_unicode_ci,
  title				varchar(40) COLLATE utf8_unicode_ci,
  pCount			int(10),
  aCount			int(4),
  pPic				BLOB,
  rank				int(3),
  honesty			int(2),
  dateCreated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (uid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE picture (
  image_id tinyint(3) NOT NULL AUTO_INCREMENT,
  image_type varchar(25) NOT NULL,
  image longblob NOT NULL,
  image_size varchar(25) NOT NULL,
  image_ctgy varchar(25) NOT NULL,
  image_name varchar(50) NOT NULL,
  userName	 varchar(30) UNIQUE NOT NULL COLLATE utf8_unicode_ci,
  KEY image_id (image_id),
  FOREIGN KEY (userName) REFERENCES Users(userName)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE if EXISTS Challenges;
CREATE TABLE Challenges (
  cid 				int(10) NOT NULL AUTO_INCREMENT, 
  cPic				BLOB,
  name				varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  points			int(10) NOT NULL, 
  description		varchar (255) NOT NULL COLLATE utf8_unicode_ci,
  users				varchar (255) COLLATE utf8_unicode_ci,
  userName	 		varchar(30) NOT NULL COLLATE utf8_unicode_ci,
  dateCreated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (cid),
  FOREIGN KEY (userName) REFERENCES Users(userName)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



	   
INSERT INTO Admins (uid, firstName, lastName, userName, email, password, gender, title) VALUES 
	   ('1', 'Augustus', 'Rutkoski', 'admin1', 'stuskoski@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Admin');
INSERT INTO Admins (uid, firstName, lastName, userName, email, password, gender, title) VALUES 
	   ('2', 'Michael', 'Murata', 'admin2', 'Murata_m33@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Admin');
INSERT INTO Admins (uid, firstName, lastName, userName, email, password, gender, title) VALUES 
	   ('3', 'Sean', 'Butcher', 'admin3', 'butcher.sean@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Admin');
	   
INSERT INTO Users (uid, firstName, lastName, userName, email, password, gender, title, pPic, rank) VALUES 
	   ('1', 'John', 'Smith', 'user1', 'jsmith@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Peasant', LOAD_FILE('/home/stus/Desktop/joust/generic.png'), '1');
INSERT INTO Users (uid, firstName, lastName, userName, email, password, gender, pPic, title) VALUES 
	   ('2', 'Augustus', 'Rutkoski', 'admin1', 'stuskoski@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', LOAD_FILE('/home/stus/Desktop/joust/generic.png'), 'Admin');
INSERT INTO Users (uid, firstName, lastName, userName, email, password, gender, pPic, title) VALUES 
	   ('3', 'Michael', 'Murata', 'admin2', 'Murata_m33@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', LOAD_FILE('/home/stus/Desktop/joust/generic.png'), 'Admin');
INSERT INTO Users (uid, firstName, lastName, userName, email, password, gender, pPic, title) VALUES 
	   ('4', 'Sean', 'Butcher', 'admin3', 'butcher.sean@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', LOAD_FILE('/home/stus/Desktop/joust/generic.png'), 'Admin');