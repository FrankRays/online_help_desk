<?php
session_start();
include_once('..\db_conn\db_conn.php');
include_once('..\way2sms-api.php');
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
 <?php 
            if (isset($_POST['submit'])){

                $assigny_occupation =$_POST['assign_to'];

                $email_assign = $_POST['email'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                // var_dump($email_assign);
                // var_dump($assigny_occupation);
                $assigny_username = "";


                // if ($assigny_occupation == "Student"){
                //     echo "hello";
                // }

                //die();
                if ($assigny_occupation == "Student") {
                    //echo "HELLO";

                  $query =   mysql_query("SELECT * FROM student WHERE first_name = '$first_name' AND last_name= '$last_name'");
                  var_dump($query);
                  //die();
                  $fetch = mysql_fetch_assoc($query);
                  $assigny_username = $fetch['username'];
                 // echo $assigny_username;
                 // die();

                }
                if ($assigny_occupation == 'Lab Assitent') {
                  $query =   mysql_query("SELECT * FROM lab_assistent WHERE email='$email_assign'");
                  $fetch = mysql_fetch_assoc($query);
                  $assigny_username = $fetch['username'];

                }
                  if ($assigny_occupation == 'Teacher') {
                  $query =   mysql_query("SELECT * FROM faculty WHERE email='$email_assign'");
                  $fetch = mysql_fetch_assoc($query);
                  $assigny_username = $fetch['username'];

                }
                // if ($assigny_occupation == 'Financial Staff') {
                //   $query =   mysql_query("SELECT * FROM student WHERE email='$email_assign'");
                //   $fetch = mysql_fetch_assoc($query);
                //   $assigny_username = $fetch['user_name'];

                // }
                $f_name_assign = $_POST['first_name'];
                $l_name_assign = $_POST['last_name'];
                $email_assign = $_POST['email'];
                $number_assign = $_POST['number'];
                $req_id = $_POST['req_id'];
                $dept_ass = $_POST['dept'];
                $option = $_POST['option'];
               // echo $req_id;
                //echo  $req_id;
            if(!empty($l_name_assign) && !empty($email_assign) ){

                $query = mysql_query("SELECT * FROM request WHERE request_id='$req_id'");

                $fetch = mysql_fetch_assoc($query);



                $assigned_by = $fetch['user_to'];
                $requested_by = $fetch['full_name'];
                $dept = $fetch['department'];
                $req_username= $fetch['applicant'];


                
                

                $sql = mysql_query("INSERT INTO assign(ass_designation,assigny_username,first_name,last_name,email,phone,option_given,assigned_by,requested_by,department,req_username,date) 
            VALUES ('$assigny_occupation','$assigny_username','$f_name_assign','$l_name_assign','$email_assign','$number_assign','$option','$assigned_by','$requested_by','$dept ','$req_username',NOW() )");

                mysql_query("UPDATE request SET status = '1' WHERE request_id = '$req_id'");


            }

                if($sql>0) {
              $mess1= "Assigned Duty Details Are:";
              $mess2 = "Assigned BY:  " .$assigned_by. "  Requested By : ".$requested_by ." DEPARTMENT" . $dept;
              $message = $mess1.'  '.$mess2;
             //echo $message;

              sendWay2SMS ('8802840673' , 'mummy111' ,$number_assign, $message );
                //header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_faculty.php");


                    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/notification_preview_student.php");
                    echo "Thanks";
                }else{
                $message1="<font color=red><h2 align='center'>We can Not Assign this request at this time,Please Try again</h2></font>";
                echo $message1;
                die();
            } 


            } 
            ?>

    <?php 
           if (isset($_GET['name']) &&  isset($_GET['id']) && function_exists($_GET['name'])){
            call_user_func($_GET['name']);
           }
           else
           {
            echo "<h2 align='center'> Wrong Input.....Try Again.</h2>";
            die();
           }
           function assign_and_accept(){
            //echo "hi";
            //echo ($_GET['id']);
            $req_id=$_GET['id'];
            //echo $req_id;
            

            ?>
            <div class="form">
            <h2 align="center">Choose respective person to assign this duty</h2>
            <form action="student_notification_result.php?req_id=<?php echo $req_id; ?>" method="post">
                Whom to Assign - 
                <select name="assign_to">
                <option>
                    --Select--
                </option>
                <option>Lab Assistent</option>
                <option>Teacher</option>
                <option>Student</option>
                <option>Financial Staff</option>
                </select>
                <br />
                First Name - <input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" />
                <br />
                  Last Name - <input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" />
              
               <br>
                Option - <select name="option">
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


                </select>
                <br />
               Faculty Department - <!-- <input name="faculty_dept" type="text" style="width:170px" placeholder="Faculty Department" required="required" id="staff_id"/> -->
                <select name="dept" style="width:170px">
                <option>--Select Department</option>
                <option>CSE</option>
                <option>MAE</option>
                <option>ECE</option>
                <option>EEE</option>
                <option>IT</option>
                </select>
                <br>

                Email - <input name="email" type="text" style="width:170px" placeholder="Email" required="required" id="email" />
                <br />
                Number- <input name="number" type="text" style="width:170px" placeholder="Number"  id="number" />
                <br />
                <input type="hidden" name="req_id" value="<?php echo $req_id; ?>">
               <input name="submit" type="submit" value="Assign and Accept">

            </form>
            </div>

            <?php
            }
            ?>
            <?php
            function see_complete(){
            $id=$_GET['id'];
            $query = mysql_query("SELECT * FROM  request  WHERE request_id='$id'" );
            $result = mysql_fetch_assoc($query);
            $applicant= $result['applicant'];
            $asset_name = $result['asset_name'];
            $full_name=$result['full_name'];
            $d_o_u = $result['d_o_u'];
            $dept = $result['department'];
            $reason = $result['reason'];
            $details = $result['details'];

            echo "<h3 align='center'>  Name: ".$full_name."<br /> Asset_Name: ".$asset_name."<br /> DATE Of USE: ".$d_o_u."<br /> Department: ". $dept. "<br /> Reason: ".$reason."<br /> Details: ".$details. "</h3>";



           }

           function decline(){
            $id=$_GET['id'];
            $query = mysql_query("SELECT * FROM  request  WHERE request_id='$id'" );
            $fetcher = mysql_fetch_assoc($query);
            $applicant= $fetcher['applicant'];
            $asset_name = $fetcher['asset_name'];
            $full_name=$fetcher['full_name'];
            $d_o_u = $fetcher['d_o_u'];

             $query = mysql_query("DELETE FROM request WHERE request_id='$id'" );
             $new_query = mysql_query("INSERT INTO decline_request (asset_name, applicant, full_name, d_o_u) values ('$asset_name','$applicant','$full_name','$d_o_u')");


             if($new_query)
                echo "THIS RECORD IS DELETED.";



           }

           ?>


                

                                  
    </div>
</div>
<div id="footer" align="Center"> OHD@MAIT 2015. Copyright All Rights Reserved</div>
</div>
</body>
</html>

