CREATE TABLE `employees` (
  `emp_no` INT(11),
  `birth_date` date,
  `first_name` varchar(20),
  `last_name` varchar(20),
  `email` varchar(50),
  `phone_number` varchar(15)
);

CREATE TABLE `salaries` (
  `emp_no` INT(11),
  `Salary` INT(11),
  `from_date` date,
  `to_date` date
);

CREATE TABLE `titles` (
  `emp_no` INT(11),
  `title` varchar(50),
  `from_date` date,
  `to_date` date
);

CREATE TABLE `dept_manager` (
  `dept_no` CHAR(4),
  `emp_no` INT(11),
  `from_date` date,
  `to_date` date
);

CREATE TABLE `departments` (
  `dept_no` char(4),
  `dept_name` varchar(40)
);

CREATE TABLE `emp_Dept` (
  `emp_no` INT(11),
  `dept_no` CHAR(4),
  `from_date` date,
  `to_date` date
);

ALTER TABLE `emp_Dept` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `emp_Dept` ADD FOREIGN KEY (`dept_no`) REFERENCES `departments` (`dept_no`);

ALTER TABLE `dept_manager` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `titles` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `salaries` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);
