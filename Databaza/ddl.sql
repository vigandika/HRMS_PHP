CREATE TABLE `managmentsystem`.`new_table` (
  `manager_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `salary` DOUBLE NULL,
  `start_date` DATE NULL,
  PRIMARY KEY (`manager_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE);

CREATE TABLE `managmentsystem`.`jobs` (
  `job_id` INT NOT NULL AUTO_INCREMENT,
  `job_tittle` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`job_id`));
  
ALTER TABLE `managmentsystem`.`jobs` 
CHANGE COLUMN `job_tittle` `job_title` VARCHAR(45) NOT NULL ;


CREATE TABLE `managmentsystem`.`requests` (
  `request_id` INT NOT NULL AUTO_INCREMENT,
  `request_tittle` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`request_id`));
  
  CREATE TABLE `managmentsystem`.`departments` (
  `department_id` INT NOT NULL AUTO_INCREMENT,
  `department_name` VARCHAR(45) NOT NULL,
  `budget` DOUBLE NOT NULL,
  `manager_id` INT NOT NULL,
  PRIMARY KEY (`department_id`),
  INDEX `manager_idx` (`manager_id` ASC) VISIBLE,
  CONSTRAINT `manager`
    FOREIGN KEY (`manager_id`)
    REFERENCES `managmentsystem`.`managers` (`manager_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
ALTER TABLE `managmentsystem`.`departments` 
DROP FOREIGN KEY `manager`;
ALTER TABLE `managmentsystem`.`departments` 
ADD CONSTRAINT `manager`
  FOREIGN KEY (`manager_id`)
  REFERENCES `managmentsystem`.`managers` (`manager_id`)
  ON DELETE NO ACTION
  ON UPDATE CASCADE;
  
  CREATE TABLE `managmentsystem`.`employees` (
  `emp_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `passowrd` VARCHAR(45) NOT NULL,
  `job_id` INT NOT NULL,
  `department_id` INT NOT NULL,
  `salary` DOUBLE NOT NULL,
  `bonuses` DOUBLE NULL DEFAULT 0,
  PRIMARY KEY (`emp_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  INDEX `job_idx` (`job_id` ASC) VISIBLE,
  INDEX `department_idx` (`department_id` ASC) VISIBLE,
  CONSTRAINT `job`
    FOREIGN KEY (`job_id`)
    REFERENCES `managmentsystem`.`jobs` (`job_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `department`
    FOREIGN KEY (`department_id`)
    REFERENCES `managmentsystem`.`departments` (`department_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
ALTER TABLE `managmentsystem`.`employees` 
CHANGE COLUMN `passowrd` `passoword` VARCHAR(45) NOT NULL ;

ALTER TABLE `managmentsystem`.`employees` 
CHANGE COLUMN `passoword` `password` VARCHAR(45) NOT NULL ;

ALTER TABLE `managmentsystem`.`employees` 
ADD COLUMN `start_date` DATE NOT NULL AFTER `password`;


CREATE TABLE `managmentsystem`.`requests_made` (
  `request_made_id` INT NOT NULL AUTO_INCREMENT,
  `emp_id` INT NOT NULL,
  `request_id` INT NOT NULL,
  `documentation` BLOB NULL,
  `duration` INT NOT NULL,
  `request_date` DATE NOT NULL,
  `approval_date` DATE NULL,
  `approval` VARCHAR(45) NULL DEFAULT 'NO',
  PRIMARY KEY (`request_made_id`),
  INDEX `employee_idx` (`emp_id` ASC) VISIBLE,
  INDEX `request_idx` (`request_id` ASC) VISIBLE,
  CONSTRAINT `employee`
    FOREIGN KEY (`emp_id`)
    REFERENCES `managmentsystem`.`employees` (`emp_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `request`
    FOREIGN KEY (`request_id`)
    REFERENCES `managmentsystem`.`requests` (`request_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);

CREATE TABLE `managmentsystem`.`tasks` (
  `task_id` INT NOT NULL,
  `task_tittle` VARCHAR(45) NOT NULL,
  `task_documentation` BLOB NULL,
  `date_created` DATE NOT NULL,
  `due_date` DATE NOT NULL,
  `bonuses` DOUBLE NOT NULL,
  `department_id` INT NOT NULL,
  `emp_id` INT NULL,
  PRIMARY KEY (`task_id`),
  INDEX `department_idx` (`department_id` ASC) VISIBLE,
  INDEX `employee_idx` (`emp_id` ASC) VISIBLE,
  CONSTRAINT `department_task`
    FOREIGN KEY (`department_id`)
    REFERENCES `managmentsystem`.`departments` (`department_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `emp_excecute`
    FOREIGN KEY (`emp_id`)
    REFERENCES `managmentsystem`.`employees` (`emp_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);



