<?php

$conn = new mysqli('localhost','root','root','staffDB');
$conn1 = new mysqli('localhost','root','root','staffDB');
$conn2 = new mysqli('localhost','root','root','staffDB');
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS staffDB";
if ($conn->query($sql) === true) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sqlo =" 
CREATE TABLE IF NOT EXISTS employees (
  emp_no INT(11),
  birth_date date,
  first_name varchar(20),
  last_name varchar(20),
  email varchar(50),
  phone_number varchar(15)
);

CREATE TABLE IF NOT EXISTS salaries (
  emp_no INT(11),
  Salary INT(11),
  from_date date,
  to_date date,
  title varchar(50)
);

CREATE TABLE IF NOT EXISTS titles (
  emp_no INT(11),
  title varchar(50),
  from_date date,
  to_date date
);

CREATE TABLE IF NOT EXISTS dept_manager (
  dept_no CHAR(4),
  emp_no INT(11),
  from_date date,
  to_date date
);

CREATE TABLE IF NOT EXISTS departments (
  dept_no char(4),
  dept_name varchar(40)
);

CREATE TABLE IF NOT EXISTS emp_Dept (
  emp_no INT(11),
  dept_no CHAR(4),
  from_date date,
  to_date date
);

ALTER TABLE `emp_Dept` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `emp_Dept` ADD FOREIGN KEY (`dept_no`) REFERENCES `departments` (`dept_no`);

ALTER TABLE `dept_manager` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `titles` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `salaries` ADD FOREIGN KEY (`emp_no`) REFERENCES `employees` (`emp_no`);

ALTER TABLE `salaries` ADD FOREIGN KEY (`title`) REFERENCES `titles` (`title`);

";


if ($conn->multi_query($sqlo) === true) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if(isset($_REQUEST['submit'])){
$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$dob = $_POST['dob'];
$dob = $conn->real_escape_string($dob);
$dob = strtotime($dob);
$dob =  date('Y-m-d',$dob);
$today = date('Y-m-d');
$staff_no = $conn->real_escape_string($_POST['staff_no']);
$email = $conn->real_escape_string($_POST['email']);
$phone_no = $conn->real_escape_string($_POST['phone_no']);
$title_pos = $conn->real_escape_string($_POST['title_pos']);
$start_date= $_POST['start_date'];
$start_date = $conn->real_escape_string($start_date);
$start_date = strtotime($start_date);
$start_date =  date('Y-m-d',$start_date);
$salary = $conn->real_escape_string($_POST['salary']);
$pay_date = $_POST['pay_date'];
$pay_date = $conn->real_escape_string($pay_date);
$pay_date = strtotime($pay_date);
$pay_date =  date('Y-m-d',$pay_date);
$dept_now = $conn->real_escape_string($_POST['dept_now']);
$dept_no = $conn->real_escape_string($_POST['dept_no']);
$dept_startdate = $_POST['dept_startdate'];
$dept_startdate = $conn->real_escape_string($dept_startdate);
$dept_startdate = strtotime($dept_startdate);
$dept_startdate =  date('Y-m-d',$dept_startdate);


$sqla = "INSERT INTO employees(emp_no,birth_date,first_name,last_name,email,phone_number)VALUES
('$staff_no','$dob','$firstname','$lastname','$email','$phone_no')"; 
$conn1->query($sqla); 
$sqlb = "INSERT INTO salaries(emp_no,Salary,from_date,to_date,title)VALUES('$staff_no','$salary','$start_date','$pay_date','$title_pos')";
$conn1->query($sqlb); 

$sqlc ="INSERT INTO titles(emp_no,title,from_date,to_date)VALUES('$staff_no','$title_pos','$start_date','$today')";
$conn2->query($sqlc); 
$sqld ="INSERT INTO dept_manager(dept_no,emp_no,from_date,to_date)VALUES('$dept_no','$staff_no','$start_date','$today')"; 
$conn1->query($sqld); 
$sqle ="INSERT INTO departments(dept_no,dept_name)VALUES('$dept_no','$dept_now')";
$conn1->query($sqle); 
echo
$sqlf="INSERT INTO emp_Dept(emp_no,dept_no,from_date,to_date)VALUES('$staff_no','$dept_no','$dept_startdate','$today')";
$conn2->query($sqlf); 

if($conn2->multi_query($sqlf) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sqlc. " . $conn->error;
}
$conn->close();
$conn1->close();
$conn2->close();
}
?>

