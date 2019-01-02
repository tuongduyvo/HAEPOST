CREATE DATABASE `haepost` /*!40100 COLLATE 'latin1_swedish_ci' */



CREATE TABLE `message` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(50) ,
	`message` VARCHAR(500) ,
	`delete_flg` INT ,
	`insert_date` DATETIME,
	PRIMARY KEY (`id`)
)


CREATE TABLE `user` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(50) NULL,
	`password` VARCHAR(50) NULL,
	`role` INT NULL,
	PRIMARY KEY (`id`)
)

INSERT INTO `haepost`.`user` (`user_name`, `password`, `role`) VALUES ('admin', 'admin', '1');