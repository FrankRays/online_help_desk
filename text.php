<?php
require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // send via SMTP
//IsSMTP(); // send via SMTP
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "mohit.chawla16@gmail.com"; // Enter your SMTP username
$mail->Password = "read123@#%84mohit"; // SMTP password
$webmaster_email = "mohit.chawla16@gmail.com"; //Add reply-to email address
$email="mohit.chawla16@gmail.com"; // Add recipients email address
$name="MOHIT"; // Add Your Recipient’s name
$mail->From = $webmaster_email;
$mail->FromName = "mohit";
$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,"Mohit");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment(“/var/tmp/file.tar.gz”); // attachment
//$mail->AddAttachment(“/tmp/image.jpg”, “new.jpg”); // attachment
$mail->IsHTML(true); // send as HTML

$mail->Subject = "THIS IS SUBJECT";

$mail->Body =      "THIS IS BODY OF THIS MAIL" ;      //HTML Body

$mail->AltBody = "Hi, this s another plauin txt";     //Plain Text Body
if(!$mail->Send()){
echo "mailer Erroe:" . $mail->ErrorInfo;
} else {
echo "mail can not be sent";
}
?>