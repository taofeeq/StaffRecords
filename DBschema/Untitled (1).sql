CREATE TABLE IF NOT EXISTS employees (
  emp_no INT(11) NOT NULL,
  birth_date date NOT NULL,
  first_name varchar(20) NOT NULL,
  last_name varchar(20) NOT NULL,
  email varchar(50) NOT NULL,
  phone_number varchar(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS salaries (
  emp_no INT(11) NOT NULL,
  Salary INT(11) NOT NULL,
  from_date date NOT NULL,
  to_date date NOT NULL
);

CREATE TABLE IF NOT EXISTS titles (
  emp_no INT(11) NOT NULL,
  title varchar(50) NOT NULL,
  from_date date NOT NULL,
  to_date date NOT NULL
);

CREATE TABLE IF NOT EXISTS dept_manager (
  dept_no CHAR(4) NOT NULL,
  emp_no INT(11) NOT NULL,
  from_date date NOT NULL,
  to_date date NOT NULL
);

CREATE TABLE IF NOT EXISTS departments (
  dept_no char(4) NOT NULL,
  dept_name varchar(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS emp_Dept (
  emp_no INT(11) NOT NULL,
  dept_no CHAR(4) NOT NULL,
  from_date date NOT NULL,
  to_date date NOT NULL
);

ALTER TABLE `emp_Dept` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `emp_Dept` ADD FOREIGN KEY (`dept_no`) REFERENCES `departments` (`dept_no`);

ALTER TABLE `dept_manager` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `titles` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `salaries` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);
