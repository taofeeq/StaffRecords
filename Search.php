<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<?php
include_once("header.php"); 
?>
<div class="section-1-container section-container">
<div class="container">
<div class="row pt-4">
<div class="col text-center">
<h1> View Staff Records </h1>
<div class="container">
<form  method="post"  action="Search.php" enctype="multipart/form-data" onsubmit="setTimeout(function(){ window.location.reload(); }, 200)">
<input type="text" id = "staff_no" name="staff_no"/><br/></label>
<button type="submit" name="submit" id= "submitLink" class= "btn btn-primary savebtn">Search ID</button>
</form>
</div>

<table border="1" align="left">
<tr>
  <td>Staff ID</td>
  <td>DOB</td>
  <td>FirstName</td>
  <td>LastName</td>
  <td>Email</td>
  <td>Phone</td>
  <td>Salary</td>
  <td>Start Pay Date</td>
  <td>Start Employment Date</td>
  <td>Position Held</td>
  <td>Position Held</td>
  <td>Employment Start Date</td>
  <td>Current Work Date</td>
  <td>Department ID</td>
  <td>Present Department Start Date</td>
  <td>Current Department Date</td>
  <td>Present Department Start Date</td>
  <td>Current Department Date</td>
</tr>

<div>
<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "staffDB"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$con1 = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con1) {
 die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])){
    $staff_no = $_POST['staff_no'];
}


$sel = mysqli_query($con,"SELECT * FROM employees,salaries,titles,dept_manager WHERE employees.emp_no = '$staff_no' AND salaries.emp_no='$staff_no' AND titles.emp_no='$staff_no' AND dept_manager.emp_no ='$staff_no'");
while ($row = mysqli_fetch_array($sel)) {
  echo
   "<tr>
    <td>{$row['emp_no']}</td>
    <td>{$row['birth_date']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['phone_number']}</td>
    <td>{$row['Salary']}</td>
    <td>{$row['from_date']}</td>
    <td>{$row['to_date']}</td>
    <td>{$row['title']}</td>
    <td>{$row['title']}</td>
    <td>{$row['from_date']}</td>
    <td>{$row['to_date']}</td>
    <td>{$row['dept_no']}</td>
    <td>{$row['from_date']}</td>
    <td>{$row['to_date']}</td>
    <td>{$row['from_date']}</td>
    <td>{$row['to_date']}</td>
   </tr>\n";

}
 $con->close();
 $con1->close();
?>
</div>
</table>
</div>

</div>
</div>

</div>




<?php
include_once("footer.php");
?>
</body>
</html>
