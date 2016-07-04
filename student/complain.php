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
if(isset($_POST['submit'])){
$issue=$_POST['issue'];
if (!preg_match("/^[a-zA-Z ]*$/",$issue))
  {
  $nameErr = "Only letters and white space allowed";
  }
$auth_name=$_POST['concerned_authority'];
$dept=$_POST['department'];
$problem=$_POST['problem'];
$sql1=mysql_query("SELECT * FROM complain WHERE issue='$issue'");
 $result=mysql_fetch_array($sql1);
 if($result>0){
$message="<font color=blue>sorry we are already looking into problem. will get back to you soon.</font>";
 }else{
 $message = "Thank You for your Precious Time, we'll look into it and notify you asap...!";
$sql=mysql_query("INSERT INTO complain(issue,auth_name,department,problem,date)
VALUES('$issue','$auth_name','$dept','$problem',NOW())");}
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
<h1><a href="#"><img src="../images/hd_logo.jpg"></a> OHD @ MAIT</h1></div>
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
            	<h3 align="Center">Please let us know The Difficulty you are facing. </h3>
				<?php if(!empty($message)) echo "<h4 align='center'>".$message."</h4>";?>
				<form name="form_complain"  action="complain.php" method="post" >
					<table width="500" height="200" border="0" >	
					<tr><td align="center">Concered Authority - <br><input name="concerned_authority" type="text" style="width:170px" placeholder="Issue" required="required"  id="first_name" /></td></tr>
					<tr><td align="center">Issue - <br><input name="issue" type="text" style="width:170px" placeholder="Issue" required="required"  id="first_name" /></td></tr>
					<tr><td align="center">Department - <br><select name="department">
					<option>--Select--</option>
					<option>Information technology</option>
					<option>Computer Science</option>
					<option>Electronics</option>
					<option>Mechanical</option>
					<option>Electrical</option></td></tr>
					<tr><td align="center">Problem - <br><textarea name="problem" placeholder="Please let us know your problem" required="required"></textarea></td></tr> 
					<tr><td align="right"><input name="submit" type="submit" value="Submit"></td></tr>
					</table>
				</form>
              </div>
</div>
<div id="footer" align="Center"> OHD @ MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>