<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['faculty_id']);
unset($_SESSION['lab_ass_id']);
unset($_SESSION['student_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['department']);
unset($_SESSION['faculty_dept']);

unset($_SESSION['username']);
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
?>
