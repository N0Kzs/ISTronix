<?php
session_start(); 
error_reporting(0); 
include("connections/db.php"); 

if(isset($_POST['submit'])) {
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) ||  
        empty($_POST['phone']) || empty($_POST['password']) || empty($_POST['cpassword'])) {
        $message = "All fields must be Required!";
    } else {
        $check_username = mysqli_query($conn, "SELECT u_name FROM users where u_name = '".$_POST['username']."'");
        $check_email = mysqli_query($conn, "SELECT u_email FROM users where u_email = '".$_POST['email']."'");

        if($_POST['password'] != $_POST['cpassword']) {  
            echo "<script>alert('Password not match');</script>"; 
        } elseif(strlen($_POST['password']) < 6) {
            echo "<script>alert('Password Must be >=6');</script>"; 
        } elseif(strlen($_POST['phone']) < 10) {
            echo "<script>alert('Invalid phone number!');</script>"; 
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
        } elseif(mysqli_num_rows($check_username) > 0) {
            echo "<script>alert('Username Already exists!');</script>"; 
        } elseif(mysqli_num_rows($check_email) > 0) {
            echo "<script>alert('Email Already exists!');</script>"; 
        } else {
            $current_date = date("Y-m-d");
            $mql = "INSERT INTO users(u_name, u_Fname, u_Lname, u_email, u_phone, u_password, u_address, u_date) 
                    VALUES('".$_POST['username']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['password']."', '".$_POST['address']."', '$current_date')";
            mysqli_query($conn, $mql);

            header("refresh:0.1;url=login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">    
</head>
<body>
   <div class="reg-container">
        <a href="login.php" class="regclose-icon"><i class="fas fa-times"></i></a>
        <h1 class="form-title">Registration</h1>
        <form class="reg-form" action="" method="post">
            <div class="input-group">
            <i class="fas fa-user"></i>
            <input class="reg-input" type="text" placeholder="Username" id="username" name="username">
            <label class="unclick" for="username">Username</label>
            </div>
            
            <div class="input-group">
            <i class="fas fa-user"></i>
            <input class="reg-input" type="text" placeholder="First Name" id="firstname" name="firstname">
            <label class="unclick" for="firstname">First Name</label>
            </div>
            
            <div class="input-group">
            <i class="fas fa-user"></i>
            <input class="reg-input" type="text" placeholder="Last Name" id="lastname" name="lastname">
            <label class="unclick" for="lastname">Last Name</label>
            </div>
            
            <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input class="reg-input" type="email" placeholder="Email" id="email" name="email">
            <label class="unclick" for="email">Email</label>
            </div>
            
            <div class="input-group">
            <i class="fa-solid fa-phone"></i>
            <input class="reg-input" type="text" placeholder="Phone Number" id="phone" name="phone">
            <label class="unclick" for="phone">Phone Number</label>
            </div>
            
            <div class="input-group">
            <i class="fas fa-lock"></i>
            <input class="reg-input" type="password" placeholder="Password" id="password" name="password">
            <label class="unclick" for="password">Password</label>
            </div>
            
            <div class="input-group">
            <i class="fas fa-lock"></i>
            <input class="reg-input" type="password" placeholder="Confirm Password" id="cpassword" name="cpassword">
            <label class="unclick" for="cpassword">Confirm Password</label>
            </div>
            
            <div class="input-group">
            <label for="address">Delivery Address</label>
            <textarea id="address" name="address" rows="3"></textarea>
            </div>
            
            <input type="submit" id="reg-btn" value="Register" name="submit">
        </form>
    </div>
    
</body>
</html>
