CREATE DATABASE  `test-task`;
CREATE TABLE `test-task`.`member` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `fname` CHAR(128) NOT NULL, 
  `sname` CHAR(128) NOT NULL, 
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `age` INT(3) NOT NULL,
  `sex` VARCHAR(55) NOT NULL,
  `country` CHAR(128) NOT NULL, 
  `city` CHAR(128) NOT NULL,
  `postcode` CHAR(30) NOT NULL,  
  `username` VARCHAR(30) NOT NULL UNIQUE, 
  `password` CHAR(128) NOT NULL, 
  `salt` CHAR(128) NOT NULL
) ENGINE = InnoDB;