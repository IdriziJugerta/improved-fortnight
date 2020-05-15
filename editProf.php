<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile</title>
 <style>
    body{
    background-image: url("images/background.jpeg");
    height: 900px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    }

    </style>
</head>
<body> 
<?php
require_once 'includes/header.php';    
?>
    <?php
     if (isset($_GET['error'])){
        if (($_GET['error'])=="usernametaken") {
        echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">This username is taken.</div>';
        }
        if (($_GET['error'])=="invaliduname") {
         echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">Username must be between 4 and 10 characters (numbers or letters).</div>';
        }
        if (($_GET['error'])=="emailtaken") {
         echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">There is an account linked with this email.</div>';
        }
        if (($_GET['error'])=="invalidname") {
         echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">First Name must be between 2 and 20 characters (only letters).</div>';
        }
        if (($_GET['error'])=="invalidlname") {
         echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">Last Name must be between 2 and 20 characters (only letters).</div>';
        }
        if (($_GET['error'])=="invalidphone") {
        echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">Please enter a valid phone number.</div>';
        }
        if(($_GET['error'])=="nomatch"){
        echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">The password do not match.</div>';
        }
        if (($_GET['error'])=="invalidpsw") {
        echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">Password must contain at least 6 characters, at least one letter and one number.</div>';
        }
        if (($_GET['error'])=="wrongpsw") {
        echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">The old password you have entered is incorrect.</div>';
        }
        if (($_GET['error'])=="invalidemail") {
        echo'<div class="alert alert-dark  w-2 d-inline-block" role="alert">Please enter a valid email.</div>';
       }
    }  
 ?>  
<div class='d-flex justify-content-center align-items-center' >
    <form class="text-center" action="editProfProcces.php" method="post">
        <p class="h4 mb-4 text-secondary">Edit Profile</p>

        <div class="form-row mb-4">
            
          <div class="form-group col-xs-5 col-lg-6">
            <!-- First name -->
            <input type="text" class="form-control" name="emer" placeholder="First name">
          </div>
          <div class="form-group col-xs-5 col-lg-6">
            <!-- Last name -->
            <input type="text" class="form-control" name="mbiemer" placeholder="Last name">
          </div>
        </div>
        <div class="form-group col-xs-5 col-lg-13">
        <!-- username -->
        <input type="text"  class="form-control mb-4" name="username" placeholder="Username">
        </div>
    
        <div class="form-group col-xs-5 col-lg-13">
        <!-- E-mail -->
        <input type="email" class="form-control mb-4" name="email" placeholder="E-mail">
        </div>

        <div class="form-group col-xs-5 col-lg-13">
        <!-- Phone number -->
        <input type="number" class="form-control" name="tel" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-secondary" >Update Profile</button>
        <hr>
    </form>
</div>
<div class='d-flex justify-content-center align-items-center' >
        <form class="text-center" action="editProfProcces.php" method="post" >
        <p class="h4 mb-4 text-secondary">Change Password</p>
         <div class="form-row mb-4"></div>
        <div class="form-group col-xs-5 col-lg-13">
        <input type="password" class="form-control mb-4" name="oldpsw" placeholder="Old Password">
        </div>
        <div class="form-row mb-4">
        <div class="form-group col-xs-5 col-lg-13">
        <input type="password" class="form-control mb-4" name="newpsw" placeholder="New Password">
        </div>
        <div class="form-group col-xs-5 col-lg-13">
        <input type="password" class="form-control mb-4" name="rep" placeholder="Repeat New Password">
        </div>
        </div>
        <button type="submit" name="change" class="btn btn-secondary">Update Password</button>
        </form>
</div>
</body>
</html> 
