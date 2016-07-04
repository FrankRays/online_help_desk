<?php
session_start();
include_once('../db_conn/db_conn.php');
include_once('../way2sms-api.php');

if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
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
$user_stu=$_POST['username_stu'];
$pas_stu=$_POST['password_stu'];
$sql1=mysql_query("SELECT * FROM student WHERE username='$user'");
 $result=mysql_fetch_array($sql1);
 if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO student(first_name,last_name,department,address,phone,email,username,password,date)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user_stu','$pas_stu',NOW())");
if($sql>0) {
	$mess1= "OHD@ MAIT Account Info TYPE-STUDENT";
	$mess2 = "USERNAME :  " .$user. "and  PASSWORD: ". $pas;
	$message = $mess1.'  '.$mess2;
	//echo $message;

	sendWay2SMS ('8802840673' , 'mummy111' ,$phone, $message );
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_student.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> - OHD @ MAIT</title>
<link rel="stylesheet" type="text/css" href="../styles/mystyle.css">
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="../styles/table.css" type="text/css" media="screen" /> 
<script src="../js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>
 <style>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
 </style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="../images/hd_logo.jpg"></a>OHD @ MAIT</h1></div>
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
    <h4>Manage Student</h4> 
<hr/>	
    <div class="tabbed_area">  

      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add User</a></li> 
            <li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Add excel file</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
			<?php if(!empty($message))
		echo $message;
			if(!empty($message1))
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        //include_once('../db_conn/db_conn.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM student") 
                or die(mysql_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Update </th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['student_id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				<td><a href="update_student.php?username=<?php echo $row['username']?>"><img src="../images/update-icon.png" width="35" height="35" border="0" /></a></td>
				<td><a href="delete_student.php?student_id=<?php echo $row['student_id']?>"><img src="../images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
		           <!--Cashier-->
		<?php if(!empty($message))
		echo $message;
			if(!empty($message1))
			  echo $message1;
			  ?>
		<form name="form1" onsubmit="return validateForm(this);" action="admin_student.php" method="post" >
			<table width="600" height="300" border="0" >	
				<tr><td align="center">First Name - <input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td align="center">Last Name - <input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td>Faculty Department - <!-- <input name="faculty_dept" type="text" style="width:170px" placeholder="Faculty Department" required="required" id="staff_id"/> -->
				<select name="faculty_dept" style="width:170px">
					<option>--Select Department</option>
					<option>CSE</option>
					<option>MAE</option>
					<option>ECE</option>
					<option>EEE</option>
					<option>IT</option>
					</select>
				</td></tr>  
				<tr><td align="center">Address - <input name="address" type="text" style="width:170px" placeholder="Address" required="required" id="postal_address" /></td></tr>  
				<tr><td align="center">Phone - <input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				<tr><td align="center">Email - <input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center">Username - <input name="username_stu" type="text" style="width:170px" placeholder="Username" required="required" id="username_stu" /></td></tr>
				<tr><td align="center">Password - <input name="password_stu" type="password" style="width:170px" placeholder="Password" required="required" id="password_stu"/></td></tr>
				<tr><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
        </div>   
        
      
   <div id="content_3" class="content"> 
 		<?php
			if(isset($_POST["upload"]))
			{
				$file = $_FILES['file']['tmp_name'];
				$handle = fopen($file, "r");
				$c = 0;
				while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
				{
					$fname = $filesop[0];
					//echo $name;
					$lname = $filesop[1];

					$sid =   $filesop[2];

					$postal= 	$filesop[1];
					$phone = 	$filesop[4];
					$email =	$filesop[5];
					$user =		$filesop[6];
					$pas = 		$filesop[7];
					//echo $email;
					$sql = mysql_query("INSERT INTO student (first_name,last_name,department,address,phone,email,username,password,date)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas',NOW())");
				}
				
					if($sql){
						$message ="You database has imported successfully";
						//echo "You database has imported successfully";
					}else{
						$message = "Sorry! There is some problem.";

						//echo "Sorry! There is some problem.";
					}
			}
			?>

	<form name="import" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" /><br />
        <input type="submit" name="upload" value="Upload" />
	</form>
	<p style="background:blue; color: white; font-weight: larger;"> coloumn order of Excel file should be first_name,last_name,department,address,phone,email,username,password.</p>
     </div> 
    </div>  
  </div>
</div>
<div id="footer" align="Center"> OHD@MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>
