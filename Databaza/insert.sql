USE hrms;

INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('1', 'Secretary');
INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('2', 'Administrator');
INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('3', 'Developer');
INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('4', 'DevOps');
INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('5', 'BackEnd');
INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('6', 'Designer');
INSERT INTO `hrms`.`jobs` (`job_id`, `job_tittle`) VALUES ('7', 'Editor');

INSERT INTO `hrms`.`requests` (`request_id`, `request_tittle`) VALUES ('1', 'vacation_leave');
INSERT INTO `hrms`.`requests` (`request_id`, `request_tittle`) VALUES ('2', 'medical_leave');
INSERT INTO `hrms`.`requests` (`request_id`, `request_tittle`) VALUES ('3', 'pregnancy_leave');


INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('1', 'Visar ', 'Buza', 'visarbuza', '123123', '100000', '20.10.2005');
INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('2', 'Shpat ', 'Gashi', 'shpatgashi', '12341234', '90000', '18.06.2008');
INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('3', 'Vegim ', 'Bytyqi', 'vegimbytyqi', 'vegim123', '90000', '22.01.2010');
INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('4', 'Vigan ', 'Dika', 'vigandika', 'manchester', '120000', '07.07.2012');
INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('5', 'Puhize', 'Doci', 'puhizedoci', 'duqi1234', '110000', '08.10.2017');
INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('6', 'Rrezarta', 'Sallauka', 'rrezartasallauka', 'suhareka4life', '85000', '12.12.2018');
INSERT INTO `hrms`.`managers` (`managers_id`, `name`, `surname`, `username`, `password`, `salary`, `start_date`) VALUES ('7', 'Blert ', 'Beqa', 'blertbeqa', 'blerti123', '120000', '12.08.2015');


INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('1', 'Head Office', '1000000', '3');
INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('2', 'Dev Center', '850000', '1');
INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('3', 'Human Resources', '700000', '2');
INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('4', 'Branch Prishtine', '900000', '5');
INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('5', 'Branch Gjakove', '650000', '4');
INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('6', 'Client Care', '300000', '7');
INSERT INTO `hrms`.`departments` (`department_id`, `dept_name`, `budget`, `manager_id`) VALUES ('7', 'Research Center', '1500000', '6');
