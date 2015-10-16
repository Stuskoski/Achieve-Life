DROP DATABASE if EXISTS achievelife;
CREATE DATABASE achievelife;
USE achievelife;



DROP TABLE if EXISTS Admin;
CREATE TABLE Admins (
  uid 				int(10) NOT NULL, 
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
  dateCreated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (uid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


	   
INSERT INTO Admins (uid, firstName, lastName, userName, email, password, gender, title) VALUES 
	   ('1', 'Augustus', 'Rutkoski', 'admin1', 'stuskoski@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Admin');
INSERT INTO Admins (uid, firstName, lastName, userName, email, password, gender, title) VALUES 
	   ('2', 'Michael', 'Murata', 'admin2', 'Murata_m33@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Admin');
INSERT INTO Admins (uid, firstName, lastName, userName, email, password, gender, title) VALUES 
	   ('3', 'Sean', 'Butcher', 'admin3', 'Sean.Butcher@yahoo.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee1', 'm', 'Admin');