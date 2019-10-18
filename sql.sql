-- recreate database
DROP DATABASE IF EXISTS SSIS;
CREATE DATABASE SSIS;
USE SSIS;

-- create table to persist student class
-- not that i use snake case for field names
CREATE TABLE `ssis`.`jobs` (
     `id` INT NOT NULL AUTO_INCREMENT , 
     `jobTitle` VARCHAR(255) NOT NULL , 
     `jobLocation` VARCHAR(255) NOT NULL , 
     `jobType` VARCHAR(255) NOT NULL , 
	 `jobCategory` VARCHAR(255) NOT NULL ,
	 `company` VARCHAR(255) NOT NULL ,
     `endDate` DATE NULL , 
     PRIMARY KEY (`id`)
) ENGINE = InnoDB;    

-- populate table with data for testing
-- got to https://mockaroo.com/ to generate data like this in sql format
insert into jobs (id, jobTitle, jobLocation, jobType, jobCategory, company, endDate) values (1, 'PHP Developer', 'Hamilton', 'Full-time', 'IT', 'Wintec', '31-10-2019');

-- check if database user exists first 
-- create database user with permissions to use tables
DROP USER IF EXISTS 'ssisuser'@'localhost';
CREATE USER 'ssisuser'@'localhost' IDENTIFIED BY 'pwd';
GRANT SELECT, INSERT, UPDATE, DELETE ON SSIS.* TO 'ssisuser'@'localhost';