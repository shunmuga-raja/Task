<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "register";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die('Could not connect to the database.');
}
session_start();
$user_check=$_SESSION['details'];
$ses_sql=mysqli_query($conn,"SELECT email,pwd,uname FROM register Where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['email'];
$loggedin_id=$row['pwd'];
$user=$row['uname'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: ../login.html");
}
?>