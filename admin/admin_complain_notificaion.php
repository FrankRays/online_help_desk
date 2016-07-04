<?php
session_start();
include_once('..\db_conn\db_conn.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> -OHD @ MAIT</title>
<link rel="stylesheet" type="text/css" href="../styles/mystyle.css">
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="../styles/dashboard_styles.css"  media="screen" />
<!-- <script src="../js/function.js" type="text/javascript"></script> -->
<style>
#left_column{
height: 470px;
}

</style>
</head>
<body>
<div id="content">
<div id="header">
<div id="notify"> Hi, <?php echo $user; ?><a href="admin.php"><img src="../images/admin_icon.jpg" /> </a></div>
<h1><a href="#"><img src="../images/hd_logo.jpg" width="20" height="20" ></a>Online Help Desk @ MAIT</h1></div>

<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
            <li><a href='notification.php'>Notification->Registration</a></li>
            <li><a href='notification.php'>Notification->Complains</a></li>
			<li><a href="admin_faculty.php">Faculty</a></li>
			<li><a href="admin_lab_assistent.php">Lab-Assistent</a></li>
			<li><a href="admin_student.php">Student</a></li>
			<li><a href="../logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
    
 <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="admin.php" class="dashboard-module">
                	<img src="../images/admin_icon.jpg" width="75" height="75" alt="edit" />
                	<span>Registraion->Notifications</span>
                </a>
                <a href="admin_faculty.php" class="dashboard-module">
                	<img src="../images/faculties.png"  width="75" height="75" alt="edit" />
                	<span>Complaints->Notification</span>
                </a>
                
                				  
			</div>
</div>
<div id="footer" align="Center"> OHD@MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>

