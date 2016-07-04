<?php
session_start();
include_once('../db_conn/db_conn.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['department'];
$postal=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$pas=$_POST['password'];
 
// get value of id that sent from address bar
$user=$_POST['user'];

// Retrieve data from database 
$sql="UPDATE lab_assistent SET first_name='$fname', last_name='$lname', department='$sid',address='$postal',phone='$phone',email='$email',username='$username', password='$pas' WHERE username='$username'";
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message1="<font color=red>Update Failed, Try again</font>";
}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $username?> - OHD @ MAIT</title>
<link rel="stylesheet" type="text/css" href="../styles/mystyle.css">
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" /> 
<script src="../js/function.js" type="text/javascript"></script>
 <style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="../images/hd_logo.jpg"></a> OHD @ MAIT</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_faculty.php">Faculty</a></li>
			<li><a href="admin_lab_assistent.php">Lab-Assistent</a></li>
			<li><a href="admin_student.php">Student</a></li>
			<li><a href="../logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Lab-Assistent</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update Assistent</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php if(!empty($message1))echo $message1;?>
       <form name="myform" onsubmit="return validateForm(this);" action="update_lab_ass.php" method="post" >
			<table width="600" height="300" border="0" >	
				<tr><td align="center">First Name - <input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td align="center">Last Name - <input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td align="center">Department - <input name="department" type="text" style="width:170px" placeholder="Faculty Department" required="required" id="staff_id"/></td></tr>  
				<tr><td align="center">Address - <input name="address" type="text" style="width:170px" placeholder="Address" required="required" id="postal_address" /></td></tr>  
				<tr><td align="center">Phone - <input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				<tr><td align="center">Email - <input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center">Username - <input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center">Password - <input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"> OHD@MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>
