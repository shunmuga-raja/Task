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
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "register";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(fname, lname, uname, email, mob, age, web, insta, twitter, bio, pwd) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssiisssss",$fname, $lname, $username, $email, $mobile, $age, $website, $insta, $twitt, $bio, $pwd);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                    header("Location:profile.php");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this Username.";
                header("Location:C:\xampp\htdocs\phpmongodb\Task\index.html");
            }
            $stmt->close();
            $conn->close();
        }
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
          'bio' => $bio,
          'pwd' => $pwd
                ]);
        }
        }
    }
}
    else {
        echo "All field are required.";
        die();
    }
    
?>
