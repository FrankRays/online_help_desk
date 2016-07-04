
<?php
session_start();
include_once('../db_conn/db_conn.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['student_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['department'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - OHD @ MAIT</title>
<link rel="stylesheet" type="text/css" href="../styles/mystyle.css">
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="../styles/dashboard_styles.css"  media="screen" />
<script src="../js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="../images/hd_logo.jpg"></a> Student Section</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="student.php">Dashboard</a></li>
			<li><a href="complain.php"target="_top">Register Complain </a></li>
			<li><a href="request.php">Campus Assets Request</a></li>
            <li><a href="student_assigned.php">Assigned Duties</a></li>
			<li><a href="../logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="student.php" class="dashboard-module">
                	<img src="../images/cashier_icon.jpg" width="100" height="100" alt="edit" />
                	<span>Dashboard</span>
                </a>
			     <a href="complain.php" target="_top" class="dashboard-module">
                	<img src="../images/payment.png" width="100" height="100" alt="edit" />
                	<span>Register Complain</span>
                </a>
                <a href="student_assigned.php" target="_top" class="dashboard-module">
                    <img src="../images/payment.png" width="100" height="100" alt="edit" />
                    <span>Assigned Duties</span>
                </a>
				<a href="request.php" target="_top" class="dashboard-module">
                	<img src="../images/payment.png" width="100" height="100" alt="edit" />
                	<span>Campus Assets Request</span>
                </a>
              </div>
</div>
<div id="footer" align="Center"> OHD @ MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>



?>