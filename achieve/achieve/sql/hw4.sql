DROP DATABASE if EXISTS homework;
CREATE DATABASE homework;
USE homework;


DROP TABLE if EXISTS EMPLOYEE;
CREATE TABLE EMPLOYEE (
  Fname		 	 varchar(60) NOT NULL COLLATE utf8_unicode_ci,
  Minit          varchar(1) COLLATE utf8_unicode_ci,
  Lname    		 varchar(60) NOT NULL COLLATE utf8_unicode_ci,
  Ssn	 		 int(9) NOT NULL,
  Bdate	 		 varchar(10) NOT NULL COLLATE utf8_unicode_ci,
  Address        varchar(75) COLLATE utf8_unicode_ci,
  Sex    		 varchar(1) COLLATE utf8_unicode_ci,
  Salary		 int(7),
  Super_ssn		 int(9),
  Dno            int(1) NOT NULL,
  PRIMARY KEY (Ssn)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE if EXISTS DEPT_LOCATIONS;
CREATE TABLE DEPT_LOCATIONS (
    dept_loc_id int(3) AUTO_INCREMENT,
	Dnumber		int(1) NOT NULL,
	Dlocation	varchar(50) NOT NULL,
	PRIMARY KEY (dept_loc_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS DEPARTMENT;
CREATE TABLE DEPARTMENT (
  Dname					varchar (50) NOT NULL COLLATE utf8_unicode_ci,
  Dnumber				int (1) NOT NULL,
  Mgr_ssn				int(9),
  Mgr_start_date		varchar (10) NOT NULL COLLATE utf8_unicode_ci,
  PRIMARY KEY (Dnumber)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE if EXISTS DEPENDENT;
CREATE TABLE DEPENDENT (
  dep_id        int(3) AUTO_INCREMENT,
  Essn	 		 int(9) NOT NULL,
  Dependent_name varchar(60) NOT NULL COLLATE utf8_unicode_ci,
  Sex    		 varchar(1) COLLATE utf8_unicode_ci,
  Bdate	 		 varchar(10) NOT NULL COLLATE utf8_unicode_ci,
  Relationship   varchar(25) COLLATE utf8_unicode_ci,
  PRIMARY KEY (dep_id),
  FOREIGN KEY (Essn) REFERENCES EMPLOYEE(Ssn)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE if EXISTS PROJECT;
CREATE TABLE PROJECT (
  Pname         varchar(50) NOT NULL COLLATE utf8_unicode_ci,
  Pnumber	    int(3) NOT NULL,
  Plocation     varchar(50) COLLATE utf8_unicode_ci,
  Dnum          int(1),
  PRIMARY KEY (Pnumber)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS WORKS_ON;
CREATE TABLE WORKS_ON (
  works_on_id    int(3) AUTO_INCREMENT,
  Essn           int(9) NOT NULL,
  Pno		     int(3),
  Hours          decimal(4,1),
  PRIMARY KEY (works_on_id),
  FOREIGN KEY (Pno) REFERENCES PROJECT(Pnumber),
  FOREIGN KEY (Essn) REFERENCES EMPLOYEE(Ssn)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('John', 'B', 'Smith', '123456789', '1965-01-09', '731 Fondren, Houston, TX', 'M', '30000', '333445555', '5');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('Franklin',	'T', 'Wong', '333445555',	'1955-12-08', '638 Voss, Houston, TX', 'M', '40000', '888665555', '5');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('Alicia',	'J', 'Zelaya', '999887777', '1968-01-19', '3321 Castle, Spring, TX', 'F', '25000', '987654321', '4');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('Jennifer',	'S', 'Wallace', '987654321', '1941-06-20',	'291 Berry, Bellaire, TX', 'F', '43000', '888665555', '4');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('Ramesh',	'K', 'Narayan', '666884444', '1962-09-15', '975 Fire Oak, Humble, TX', 'M', '38000', '333445555', '5');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('Joyce',	'A', 'English', '453453453', '1972-07-31', '5631 Rice, Houston, TX', 'F', '25000', '333445555', '5');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno) VALUES 
	   ('Ahmad',	'V', 'Jabbar',	'987987987', '1969-03-29', '980 Dallas, Houston, TX', 'M', '25000', '987654321', '4');
INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Dno) VALUES 
	   ('James',	'E', 'Borg',	'888665555', '1937-11-10', '450 Stone, Houston, TX', 'M', '55000', '1');
	   
	   

		
		
INSERT INTO DEPT_LOCATIONS (Dnumber, Dlocation) VALUES
		('1', 'Houston');
INSERT INTO DEPT_LOCATIONS (Dnumber, Dlocation) VALUES
		('4', 'Stafford');
INSERT INTO DEPT_LOCATIONS (Dnumber, Dlocation) VALUES
		('5', 'Bellaire');
INSERT INTO DEPT_LOCATIONS (Dnumber, Dlocation) VALUES
		('5', 'Sugarland');
INSERT INTO DEPT_LOCATIONS (Dnumber, Dlocation) VALUES
		('5', 'Houston');
		
		
		
INSERT INTO DEPARTMENT (Dname, Dnumber, Mgr_ssn, Mgr_start_date) VALUES
		('Research', '5', '333445555', '1988-05-22');
INSERT INTO DEPARTMENT (Dname, Dnumber, Mgr_ssn, Mgr_start_date) VALUES
		('Administration', '4', '987654321', '1995-01-01');
INSERT INTO DEPARTMENT (Dname, Dnumber, Mgr_ssn, Mgr_start_date) VALUES
		('Headquarters', '1', '888665555', '1981-06-19');
		


		
INSERT INTO PROJECT(Pname, Pnumber, Plocation, Dnum) VALUES
		('ProductX', '1', 'Bellaire', '5');
INSERT INTO PROJECT(Pname, Pnumber, Plocation, Dnum) VALUES
		('ProductY', '2', 'Sugarland', '5');
INSERT INTO PROJECT(Pname, Pnumber, Plocation, Dnum) VALUES
		('ProductZ', '3', 'Houston', '5');
INSERT INTO PROJECT(Pname, Pnumber, Plocation, Dnum) VALUES
		('Computerization', '10', 'Stafford', '4');
INSERT INTO PROJECT(Pname, Pnumber, Plocation, Dnum) VALUES
		('Reorganization', '20', 'Houston', '1');
INSERT INTO PROJECT(Pname, Pnumber, Plocation, Dnum) VALUES
		('Newbenefits', '30', 'Stafford', '4');
		
		
		
		
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('123456789', '1', '32.5');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('123456789', '2', '7.5');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('666884444', '3', '40.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('453453453', '1', '20.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('453453453', '2', '20.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('333445555', '2', '10.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('333445555', '3', '10.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('333445555', '10', '10.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('333445555', '20', '10.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('999887777', '30', '30.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('999887777', '10', '10.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('987987987', '10', '35.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('987987987', '30', '5.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('987654321', '30', '20.0');
INSERT INTO WORKS_ON (Essn, Pno, Hours) VALUES
		('987654321', '20', '15.0');
INSERT INTO WORKS_ON (Essn, Pno) VALUES
		('888665555', '20');

		

		
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('333445555', 'Alice', 'F', '1986-04-05', 'Daughter');
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('333445555', 'Theodore', 'M', '1983-10-25', 'Son');
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('333445555', 'Joy', 'F', '1958-05-03', 'Spouse');
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('987654321', 'Abner', 'M', '1942-02-28', 'Spouse');
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('123456789', 'Michael', 'M', '1988-01-04', 'Son');
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('123456789', 'Alice', 'F', '1988-12-30', 'Daughter');
INSERT INTO DEPENDENT (Essn, Dependent_name, Sex, Bdate, Relationship) VALUES
		('123456789', 'Elizabeth', 'F', '1967-05-05', 'Spouse');

