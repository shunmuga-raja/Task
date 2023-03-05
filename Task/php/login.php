
<?php

session_start ();

if(isset($_REQUEST['login']))
{
$a = $_POST['email'];
$b = $_POST['pwd'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "register";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die('Could not connect to the database.');
}
$res = mysqli_query($conn,"SELECT * FROM register WHERE email='$a'AND pwd='$b'");
$details = "SELECT * FROM register";
$result=mysqli_fetch_array($res);
if($result)
{
	
	$_SESSION["login"]="1";
	$_SESSION['details']=$a;
	header("location: profile.php");

}
else	
{
	header("location: ../login.html?err=1");	
}

}
?>
