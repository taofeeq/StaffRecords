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
<input type="text" id = "name" name="name"/><br/></label>
<input type="date" id = "date1" name="date1"/><br/></label>
<button type="submit" name="submit" id= "submitLink" class= "btn btn-primary savebtn">Search ID</button>
</form>
</div>

<table border="5" align="center">
<tr>
  <td>Staff ID</td>
  <td>DOB</td>
  <td>FirstName</td>
  <td>LastName</td>
  <td>Email</td>
  <td>Phone</td>
  <td>Salary</td>
  <td>Salary Start Date</td>
  <td>Last Pay Date</td>
  <td>Position Held</td>
  <td>Position Start Date</td>
  <td>Position End Date</td>
  <td>Current Work Date</td>
  <td>Department ID</td>
</tr>


<?php
$host = "sql204.unaux.com"; /* Host name */
$user = "unaux_24834628"; /* User */
$password = "gp6z22bgylnzo"; /* Password */
$dbname = "unaux_24834628_staffDB"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
$con1 = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (isset($_POST["submit"])){
    $staff_no = $_POST['staff_no'];
    $namec = $_POST['name'];
    $start_date= $_POST['date1'];
    $start_date = strtotime($start_date);
    $start_date =  date('Y-m-d',$start_date);
}
$sel = mysqli_query($con,"SELECT DISTINCT * FROM employees,salaries,titles,dept_manager WHERE employees.emp_no = '$staff_no' AND employees.last_name ='$namec'AND salaries.from_date ='$start_date' ");
$count_rows = mysqli_num_rows($sel);
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
    <td>{$row['from_date']}</td>
    <td>{$row['to_date']}</td>
    <td>{$row['to_date']}</td>
    <td>{$row['dept_no']}</td>
   </tr>\n";
    
$con->close();
}
 
?>

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

