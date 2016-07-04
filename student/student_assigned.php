<?php
session_start();
include_once('..\db_conn\db_conn.php');
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
            <div class="not_list">
                <ul style="list-style-type:none;" align="center" >
                    <?php 
                    $query = mysql_query("SELECT * FROM assign WHERE assigny_username='$user' AND ass_designation='Student'LIMIT 1");

                    //echo $query;
                   // die();
                    if ($query) {
                    while ($fetch = mysql_fetch_assoc($query)) {
                        $assigned_by= $fetch['assigned_by'];
                        $applicant  = $fetch['requested_by'];
                        $dept_name = $fetch['department'];
                        $applicant_username = $fetch['req_username'];
                         $query_new = mysql_query("SELECT * FROM request WHERE applicant='$applicant_username' AND user_to='$assigned_by'LIMIT 1");
                        if ($query_new ) {
                        while ($fetch_new = mysql_fetch_assoc($query_new)){
                        $asset_name= $fetch_new['asset_name'];
                        $position  = $fetch_new['position'];
                        $resn = $fetch_new['reason'];
                        $d_o_u = $fetch_new['d_o_u'];
                        $details = $fetch_new['details'];
                        echo "<li><b>YOU HAVE BEEN ASSSIGNED A DUTY BY ".$assigned_by .".<br> The Details Are <br> Applicant:".$applicant." <br>DEPARTMENT: 
                         ".$dept_name."<br> ASSET NAME: ".$asset_name. "<br> Reason: " .$resn ."<br> Date of Use:" .$d_o_u . "<br> Deatils: ".
                         $details . "</b></li>
                        <br>
                        <br>";
                        }
                    }
                }
            }
                ?>
                        
                   
                    <br />
                    <br />

                    </ul>

                				  
			</div>
</div>
<div id="footer"> OHD@MAIT 2015. Copyright All Rights Reserved</div>

</div>
</body>
</html>

