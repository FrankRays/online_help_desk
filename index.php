  <?php 
include_once 'db_conn/db_conn.php';
$message = "";
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin/admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Faculty':
$result=mysql_query("SELECT faculty_id, first_name,last_name,faculty_department,username FROM faculties WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['faculty_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['faculty_dept']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/faculty/faculty.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Lab-Assistent':
$result=mysql_query("SELECT lab_ass_id, first_name,last_name,department,username FROM lab_assistent WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['lab_ass_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['department']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/lab_assistent/lab_ass.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Student':
$result=mysql_query("SELECT student_id, first_name,last_name,department,username FROM student WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['student_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['department']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/student/student.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
echo <<<LOGIN
<!DOCTYPE html>
<html>
<head>
<title>OHD @ MAIT</title>
<link rel="stylesheet" type="text/css" href="styles/mystyle_login.css">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body bgcolor='skyblue'>
<div id="content">
<div id="header">
<h1><img src="images/faculties.png">Online Help Desk System Of MAIT.<br>We are very happy to help you  :) :)</h1>
</div>
<div id="main">

  <section class="container">
  
     <div class="login">
	 <img src="images/student.png">
      <h1>Login here</h1>
		$message
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Faculty</option>
			<option>Lab-Assistent</option>
			<option>Student</option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>
<div id="footer" align="Center"> <marquee>OHD @ MAIT 2015
 Copyright All Rights Reserved</marquee></div>
</div>
</body>
</html>
LOGIN;
?>
