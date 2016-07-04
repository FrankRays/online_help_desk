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
<?php
if (isset($_SESSION['username'])) {
    header("Location:login.php");
} else {

    $captchaerr = "";
    $nameerr = "";
    $localerr = "";
    $addresserr = "";
    $emailerr = "";
    $passerr = "";
    $confirmerr = "";
    $accepterr = "";
    $flag = 0;
    if (isset($_POST["state"]) && $_POST["contact_no"] && $_POST["owner_name"]) {
        $state = $_POST["state"];
        $contact = $_POST["contact_no"];
        $owner = $_POST["owner_name"];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['store_name'])) {
            $nameerr = "*Name is required.";
            $flag = 0;
        } else {
            $store_name = mysql_real_escape_string($_POST["store_name"]);
            $flag = 1;
        }
        if (empty($_POST['locality'])) {
            $localerr = "*Locality name is required.";
            $flag = 0;
        } else {
            $locality = $_POST["locality"];
            $flag = 1;
        }
        if (empty($_POST['address'])) {
            $addresserr = "*Address is required.";
            $flag = 0;
        } else {
            $address = mysql_real_escape_string($_POST["address"]);
            $flag = 1;
        }
        if (empty($_POST['email'])) {
            $emailerr = "*Email id is required.";
            $flag = 0;
        } else {
            $email = $_POST["email"];
            $flag = 1;
        }
        if (empty($_POST['password'])) {
            $passerr = "*Password is required.";
            $flag = 0;
        } else {
            $flag = 1;
        }


        if ($_POST["confirm_pass"] != $_POST["password"]) {
            $confirmerr = "*The password does not match with the above password";
            $flag = 0;
        } else {
            $password = $_POST ["confirm_pass"];
            $flag = 1;
        }
        if ($_POST["accepted"] != TRUE) {
            $accepterr = "*Please agree to the terms and conditions to register.";
            $flag = 0;
        } else {
            $flag = 1;
        }


//        require_once('recaptchalib.php');
//        $privatekey = "6LfunPMSAAAAADdjPk8-6-aHSdpnDsH2rCJl9BoV";
//        $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
//
//        if (!$resp->is_valid || empty($_POST["recaptcha_response_field"])) {
//            // What happens when the CAPTCHA was entered incorrectly
//            $captchaerr = "The reCAPTCHA wasn't entered correctly.";
//            $flag = 0;
//        } else {
//            $flag = 1;
//        }
    }
    if ($flag) {
        include './connect.php';

        $query = "insert into info values('" . $email . "','" . $store_name . "','" . $state . "','" . $address . "','" . $owner . "','" . $password . "','" . $contact . "','" . $locality . "')";

        $q = mysqli_query($con, $query);
        if (!$q) {
            print "<br><br>Registration Unsuccessful.";
        } else {
            header("Location:../user/login.php");
        }

        include './footer.php';

        exit();
    }
    ?>
    <title>Registration</title>

    <style>
        .error {color: #FF0000;}
    </style>
    <div id="product-promotion" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">REGISTRATION</h1>
                </div> <!-- /.col-md-12 -->
            </div>
        </div> <!-- /.container -->
    </div> <!-- /#product-promotion -->

    <!--<div class="service-item">-->
        <!--<span class="service-icon first"></span><br><br>-->
    <form class="form" action="registration.php" method="POST">
        Name: <br><input type="text" name="store_name" style="border-color: graytext"><span class="error"><?php echo $nameerr ?></span><br>
        Enter collage(in short): <input type="text" name="locality" style="border-color: graytext"><span class="error"><?php echo $localerr ?></span><br>

        Stream: <select name="state">
            <option value="Information Technology">Information Technology</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Electrical">Electrical</option>
            <option value="Electronics">Electronics</option>
            <option value="Civil">Civil</option>
            <option value="Other">Other</option>
            
        </select><br><br>
        
        Store Address: <input type="text" name="address" style="border-color: graytext"><span class="error"><?php echo $addresserr ?></span><br>
        Owner Name: <input type="text" name="owner_name" style="border-color: graytext"><br>
        Email ID: <br><input type="email" name="email" style="border-color: graytext"><span class="error"><?php echo $emailerr ?></span><br>
        Choose Password: <input type="password" name="password" style="border-color: graytext"><span class="error"><?php echo $passerr ?></span><br>
        Confirm Password: <input type="password" name="confirm_pass" style="border-color: graytext"><span class="error"><?php echo $confirmerr ?></span><br><br>
        Contact No: <input type="text" name="contact_no" style="border-color: graytext"><br>
        Enter the visible text:<?php
        require_once('recaptchalib.php');
        $publickey = "6LfunPMSAAAAAGGM1vPARX2VCp-SrlJBfVUTdiXK"; // you got this from the signup page
        echo recaptcha_get_html($publickey);
        ?><span class="error"><?php echo $captchaerr ?></span>
        <br><br>
        <label><input type="checkbox" name="accepted" value="TRUE">I accept all the terms and conditions laid down by this website.  </label>
        <br><span class="error"><?php echo $accepterr ?></span>

        <input type="submit" value="Register">
    </form>

    <!--</div>-->  

    <?php
    //include_once './footer.php';
}
?>
    
        </div>
    </section>
    </div>
    </div>
  </body>
  </html>

