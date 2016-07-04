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
            <div class="not_list">
                <ul style="list-style-type:none;" align="center" >
                    <?php 
                     $position = "student";
                    $query = mysql_query("SELECT * FROM request WHERE user_to='$user' AND position = '$position'");
                    //var_dump($query);

                    if ($query) {
                    while ($fetch = mysql_fetch_assoc($query)) {
                        $request_id = $fetch['request_id'];
                        $applicant  = $fetch['applicant'];
                        $asset_name = $fetch['asset_name'];
                        $d_o_u = $fetch['d_o_u'];
                        $dept = $fetch['department'];
                        $strength = $fetch['strength'];

                    $applicant_det = mysql_query("SELECT * FROM student WHERE username='$applicant'");
                        $fetch_applicant = mysql_fetch_assoc($applicant_det);
                        $email = $fetch_applicant['email'];
                        
                    ?>
                   <?php  $query_check = mysql_query("SELECT * FROM request WHERE request_id='$request_id'");
                            $fetch_check = mysql_fetch_assoc($query_check);
                            $status = $fetch_check['status'];
                            if($status == 1){
                                echo "<span style='color:blue; '> ACCEPTED</span>";
                            
                            ?>
                    <li>
                    <b><?php echo "Student ".$applicant ." from ".$dept." Department has requested for  
                    ".$asset_name." at ".$d_o_u. " <br /> The strenghth Required is ".$strength; ?></b>
                    </li>

                    <?php }
                    else
                        {
                        ?>
                             
                             <li>
                    <b><?php echo "Student ".$applicant ." from ".$dept." Department has requested for  
                    ".$asset_name." at ".$d_o_u. " <br /> The strenghth Required is ".$strength ; ?></b>
                    </li>
                    <?php echo "<a href='student_notification_result.php?name=assign_and_accept&id=$request_id'><button type='button'>Assign and Accept</button></a>"; ?>
                    <?php echo "<a href='student_notification_result.php?name=decline&id=$request_id'><button type='button'>Decline</button></a>"; 
                        }?>

                    <?php echo "<a href='student_notification_result.php?name=see_complete&id=$request_id'><button type='button'>See complete Request</button></a>"; ?>
                    

                    <br />
                    <br />
                    
                    <?php } }
                    else{
                        echo "<h2 align='center'>No Notification in this section</h2>";
                        }
                        ?>

                    </ul>

                				  
			</div>
</div>
<div id="footer"> OHD@MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>

