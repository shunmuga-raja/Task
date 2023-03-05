<?php
 include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
$sqld="SELECT * FROM register WHERE email='$loggedin_session'";
$result=mysqli_query($conn,$sqld);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./css/register.css" />
    </head>
    <body style="background-color: rgb(230, 252, 244) ;">
       <div class="container">
        <div class="display-3 mb-3" style="text-align: center;">Update Profile</div>
         <form method="POST" action="">
         <div class="row mb-3">
           <div class="col mb-1">
                <label>First Name</label>
                <input type="text" class="form-control" id="firstname" value="<?php echo $rows["fname"]; ?>" name="firstname" maxlength="15">
            </div>
            <div class="col mb-1">    
                <label>Last Name</label>
                <input type="text" class="form-control" id="lastname" value="<?php echo $rows["lname"]; ?>" name="lastname" maxlength="15">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Email</label>
                <input type="text" class="form-control" id="email" value="<?php echo $rows["email"]; ?>"placeholder="Email" name="email">
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Phone Number</label>
                <input type="text" class="form-control" id="mob" placeholder="Phone Number" value="<?php echo $rows["mob"]; ?>" name="mob">
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Age</label>
                <input type="number" class="form-control" id="age" value="<?php echo $rows["age"]; ?>" placeholder="Age" name="age">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Website</label>
                <input type="text" class="form-control" id="web" value="<?php echo $rows["web"]; ?>"placeholder="Website Link" name="web">
            </div>
        </div>  
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Instagram</label>
                <input type="text" class="form-control" id="insta" value="<?php echo $rows["insta"]; ?>" placeholder="Instagram" name="insta">
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Twitter</label>
                <input type="text" class="form-control" id="twitter" value="<?php echo $rows["twitter"]; ?>" placeholder="Twitter" name="twitter">
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col mb-1">    
                <label>Bio</label>
                <textarea class="form-control" id="bio" name="bio" value="<?php echo $rows["bio"]; ?>" rows="3" cols="5"></textarea>
            </div>
        </div>  
        <div class="col mt-5" style="text-align: center;">
        <input type="submit" value="Update" name="submit" id="submit">
         </div>
         </form> 
        </div>
        <?php
        }
        ?>
    </body>
</html>
<?php
if (isset($_POST['submit'])) {   
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $age = $_POST['age'];
    $web = $_POST['web'];
    $insta = $_POST['insta'];
    $twitter = $_POST['twitter'];
    $bio = $_POST['bio'];
$sql = "UPDATE register SET fname='$firstname',lname='$lastname',email='$email',mob='$mob',age='$age',web='$web',insta='$insta',twitter='$twitter',bio='$bio' WHERE email='$loggedin_session'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
  header("Location:profile.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
  header("Location:profile.php");
}
}
?>
<?php
require 'C:\xampp\htdocs\phpmongodb\Task\assets\vendor\autoload.php';
if (isset($_POST['submit'])) {   
          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $mobile = $_POST['mob'];
          $age = $_POST['age'];
          $website = $_POST['web'];
          $insta = $_POST['insta'];
          $twitt = $_POST['twitter'];
          $bio = $_POST['bio'];
          $pwd = $_POST['pwd'];
mysqli_close($conn);
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $client = new MongoDB\Client;
            $db = $client->profile;
            $collection = $db->profile;
            if($_POST){
                $find = $collection->findOne([
                    'email' => $email
                  ]);
                  if(!$find){
                $insertOneResult = $collection->insertOne([
                    'firstname' => $fname,
                    'lastname' => $lname,
          'username' => $username,
          'email' => $email,
          'mob' => $mobile,
          'age' => $age,
          'web' => $website,
          'insta' => $insta,
          'twitter' => $twitt,
          'bio' => $bio
                ]);
        }
        }
        if($insertOneResult==1){
            echo "Registered";
        }
    }
}
    ?>