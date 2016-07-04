<?php
session_start();
include_once('../db_conn/db_conn.php');
if(isset($_SESSION['username']))
{
$id=$_SESSION['faculty_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
// $sid=$_SESSION['faculty_department'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$asset=$_POST['asset_name'];
if (!preg_match("/^[a-zA-Z ]*$/",$asset))
  {
  $nameErr = "Only letters and white space allowed";
  }
 $position = "FACULTY";
$dept=$_POST['dept'];
$reason=$_POST['reason_asset'];
$date_of_usage=$_POST['date_of_usage'];
$full_name=$_POST['full_name'];
$details=$_POST['details_asset'];
$user_to = $_POST['user_to'];
$strength = $_POST['strength'];

$sql1=mysql_query("SELECT * FROM request WHERE full_name='$full_name' AND asset='$asset'");
if($sql1){
 $result=mysql_fetch_array($sql1);
 if($result>0){
$message="<font color=blue>sorry we are already looking into your request. will get back to you soon.</font>";
 }
}
else{
 $message = "Thank You for your Precious Time, we'll look into it and notify you asap...!";
$sql=mysql_query("INSERT INTO request(status,applicant,user_to,asset_name,position,department,strength,reason,d_o_u,full_name,details,date)
VALUES(0,'$user','$user_to','$asset','$position','$dept','$strength', '$reason','$date_of_usage','$full_name','$details',NOW())");}
}


?>
<html>
<head>
<title><?php echo $user;?> - OHD @ MAIT</title>
<link rel="stylesheet" type="text/css" href="../styles/mystyle.css">
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="../styles/dashboard_styles.css"  media="screen" />
<script src="../js/function.js" type="text/javascript"></script>
<style>
#left_column{
/*height: 470px;*/
}
</style>
</head>
<body>
<div id="content_one">
<div id="header">
<div id="notify"> Hi, <?php echo $user; ?><a href="admin.php"><img src="../images/admin_icon.jpg" /> </a></div>
<h1><a href="#"><img src="../images/hd_logo.jpg" width="20" height="20" ></a>Online Help Desk @ MAIT</h1></div>

<div id="left_column">
<div id="button">
		<ul>
			<li><a href="faculty.php">Dashboard</a></li>
			<li><a href="faculty_assigned.php"target="_top">Assigned Request </a></li>
			<li><a href="faculty_request.php">Campus Assets Request</a></li>
			<li><a href="../logout.php">Logout</a></li>
        </ul>   
</div>
</div>
<div id="main_one">
					
<!-- Dashboard icons -->
				<div class="form">
            
            	<h3 align="Center">Please let us know details of the ASSET you Require </h3>
				<?php if(!empty($message)) echo "<h4 align='center'>".$message."</h4>";?>
				<form name="form_complain"  action="faculty_request.php" method="post" >
					<table>
					<tr><td align="center">Sent Request to <br>
					<select name="user_to">
					<option>--Select--</option>
					<option>Admin</option>
					<option>HOD</option>
					<option>Director</option>
					</select></p>
					</td></tr>
					<tr><td>Department<br><select name="dept">
					<option>--Select--</option>
					<option>IT</option>
					<option>CSE</option>
					<option>ECE</option>
					<option>MAE</option>
					<option>EEE</option>
					</select></td></tr>	
					<tr><td>Strength Required<br><select name="strength">
					<option>--Select--</option>
					<option>< 20</option>
					<option>> 20 and < 60</option>
					<option>> 60 and < 100</option>
					<option>More than 100</option>
					</select></td></tr>				
					<tr><td>-Full Name<br><input name="full_name" type="text" style="width:170px" placeholder="Issue" required="required"  id="first_name" /></td></tr>
					<tr><td>Asset Name - <br><select name="asset_name">
                		<option>
                   		 --Select--
                		</option>
		                <option>Room no.841</option>
		                <option>Room no.840</option>
		                <option>Room no.805</option>
		                <option>Room no.826</option>
		                <option>IT lab 1</option>
		                <option>IT lab 2</option>
		                <option>IT lab 3</option>
		                <option>It lab 4</option>


                	</select></td></tr></td></tr>
					<tr><td>Reason for Using Service - <br><input name="reason_asset" type="text" style="width:170px" required="required"  id="first_name" /></td></tr>
					<tr><td>Date for Using The Service - <br><input name="date_of_usage" type="text" style="width:170px" placeholder="xx/yy/dddd" required="required"  id="first_name" /></td></tr>
					<tr><td>Details - <br><textarea name="details_asset" placeholder="Please let us know your problem" required="required"></textarea></td></tr> 
					<tr><td><input name="submit" type="submit" value="Submit"></td></tr>
					</table>
				</form>
       </div>
</div>
</div>
<div id="footer" align="Center"> OHD@MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>