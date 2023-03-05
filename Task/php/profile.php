
<?php
 include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./css/register.css" />
    </head>
    <body style="background-color: rgb(230, 252, 244) ;">
<div id="center">
<h1 align='center'>Hello <?php echo $user; ?>!!!</h1>
<div id="contentbox">
<?php
$sql="SELECT * FROM register WHERE email='$loggedin_session'";
$result=mysqli_query($conn,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
<div id="signup">
<div id="signup-st">
<form action="" method="POST" id="signin" id="reg">
<div id="reg-head" class="headrg">Your Profile</div>
<table border="0" align="center" cellpadding="2" cellspacing="0">
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Name:</div></td>
<td class="tl-4"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
<td class="tl-4"><?php echo $rows['uname']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Age:</div></td>
<td class="tl-4"><?php echo $rows['age']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Email id:</div></td>
<td class="tl-4"><?php echo $rows['email']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Website:</div></td>
<td class="tl-4"><?php echo $rows['web']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Instagram:</div></td>
<td class="tl-4"><?php echo $rows['insta']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Twitter:</div></td>
<td class="tl-4"><?php echo $rows['twitter']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Bio:</div></td>
<td class="tl-4"><?php echo $rows['bio']; ?></td>
</tr>
</table>
</form>
</div>
</div>
<div id="login">
<div id="login-sg">
<div id="st"><a href="logout.php" id="st-btn">Sign Out</a></div>
<div id="st"><a href="update.php" id="st-btn">Update Account</a></div>
</div>
</div>
<?php 
}
?>
</div>
</div>
</div>
</br>
</body>
</html>

