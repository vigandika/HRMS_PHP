CREATE DATABASE hrms;
USE hrms;

CREATE TABLE `hrms`.`managers` (
  `managers_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `salary` DOUBLE NOT NULL,
  `start_date` DATE NOT NULL,
  PRIMARY KEY (`managers_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE);
  




CREATE TABLE `hrms`.`departments` (
  `department_id` INT NOT NULL AUTO_INCREMENT,
  `dept_name` VARCHAR(45) NOT NULL,
  `budget` DOUBLE NOT NULL,
  `manager_id` INT NOT NULL,
  PRIMARY KEY (`department_id`),
  INDEX `manager_id_idx` (`manager_id` ASC) VISIBLE,
  CONSTRAINT `manager_id`
    FOREIGN KEY (`manager_id`)
    REFERENCES `hrms`.`managers` (`managers_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
CREATE TABLE `hrms`.`jobs` (
  `job_id` INT NOT NULL AUTO_INCREMENT,
  `job_tittle` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`job_id`));
  
  CREATE TABLE `hrms`.`requests` (
  `request_id` INT NOT NULL AUTO_INCREMENT,
  `request_tittle` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`request_id`));


CREATE TABLE `hrms`.`workers` (
  `worker_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `start_date` DATE NOT NULL,
  `job_id` INT NOT NULL,
  `department_id` INT NOT NULL,
  `salary` FLOAT NOT NULL,
  `bonuses` DOUBLE NULL,
  PRIMARY KEY (`worker_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  INDEX `job_id_idx` (`job_id` ASC) VISIBLE,
  INDEX `department_id_idx` (`department_id` ASC) VISIBLE,
  CONSTRAINT `job_id`
    FOREIGN KEY (`job_id`)
    REFERENCES `hrms`.`jobs` (`job_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `department_id`
    FOREIGN KEY (`department_id`)
    REFERENCES `hrms`.`departments` (`department_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
    
    CREATE TABLE `hrms`.`requests_made` (
  `request_no` INT NOT NULL AUTO_INCREMENT,
  `worker_id` INT NOT NULL,
  `request_id` INT NOT NULL,
  `request_date` DATE NULL,
  `documentation` BLOB NULL,
  `approval` VARCHAR(45) NULL DEFAULT 'NO',
  `approval_date` DATE NULL,
  PRIMARY KEY (`request_no`),
  INDEX `worker_id_idx` (`worker_id` ASC) VISIBLE,
  INDEX `request_id_idx` (`request_id` ASC) VISIBLE,
  CONSTRAINT `worker_id`
    FOREIGN KEY (`worker_id`)
    REFERENCES `hrms`.`workers` (`worker_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `request_id`
    FOREIGN KEY (`request_id`)
    REFERENCES `hrms`.`requests` (`request_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
    CREATE TABLE `hrms`.`tasks` (
  `task_id` INT NOT NULL AUTO_INCREMENT,
  `task_tittle` VARCHAR(45) NOT NULL,
  `task_body` VARCHAR(200) NOT NULL,
  `date_created` DATE NULL,
  `department_id` INT NOT NULL,
  `employee_id` INT NULL,
  PRIMARY KEY (`task_id`),
  INDEX `department_idx` (`department_id` ASC) VISIBLE,
  INDEX `employee_idx` (`employee_id` ASC) VISIBLE,
  CONSTRAINT `department`
    FOREIGN KEY (`department_id`)
    REFERENCES `hrms`.`departments` (`department_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `hrms`.`workers` (`worker_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION);
    



ALTER TABLE `hrms`.`managers` 
CHANGE COLUMN `managers_id` `manager_id` INT(11) NOT NULL AUTO_INCREMENT ;