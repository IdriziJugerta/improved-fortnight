<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile</title>
 <style>
    body{
    background-image: url("images/background.jpeg");
    height:auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    }
    span{
      display:inline-block;
			color: black;
			font-size: 13px;
			font-style: italic;
    }
    .flname{
      display:inline-block;
      width :250px;
			color: black;
			font-size: 13px;
			font-style: italic;
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
<div class='d-flex justify-content-center align-items-center'  >
    <form class="text-center" action="editProfProcces.php" method="post">
        <p class="h4 mb-4 text-secondary">Edit Profile</p>

        <div class="form-row mb-4">
            
          <div class="form-group col-xs-5 col-lg-6">
            <!-- First name -->
            <input type="text" class="form-control " onkeyup="validateName()" name="emer" id="fname" placeholder="First name">
            <span class="flname" id="fnamerr"></span>
          </div>
          <div class="form-group col-xs-5 col-lg-6">
            <!-- Last name -->
            <input type="text" class="form-control " onkeyup="validateLName()" name="mbiemer" id="lname" placeholder="Last name">
            <span class="flname" id="lnamerr"></span>
          </div>
        </div>
        <div class="form-group col-xs-5 col-lg-13">
        <!-- username -->
        <input type="text"  class="form-control mb-4" onkeyup="validateUname()" name="username" id="username" placeholder="Username">
        <span id="usernamerr"></span>
      </div>
    
        <div class="form-group col-xs-5 col-lg-13">
        <!-- E-mail -->
        <input type="email" class="form-control mb-4" onkeyup="validateEmail()" name="email" id="email" placeholder="E-mail">
        <span id="emailerr"></span>
      </div>

        <div class="form-group col-xs-5 col-lg-13">
        <!-- Phone number -->
        <input type="number" class="form-control mb-4" onkeyup="validatePhone()" name="tel" id="phone" placeholder="Phone number">
        <span id="phonerr"></span>
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
        <input type="password" class="form-control mb-4" onkeyup="validatePsw()" name="oldpsw" id="oldp" placeholder="Old Password
        ">
        <span id="opswerr"></span>
        </div>
        <div class="form-row mb-4">
        <div class="form-group col-xs-5 col-lg-13">
        <input type="password" class="form-control mb-4" onkeyup="validateNewPsw()" name="newpsw" id="newp" placeholder="New Password">
        <span class="flname" id="newpswerr"></span>
        </div>
        <div class="form-group col-xs-5 col-lg-13">
        <input type="password" class="form-control mb-4" name="rep" placeholder="Repeat New Password">
        </div>
        </div>
        <button type="submit" name="change" class="btn btn-secondary">Update Password</button>
        </form>
</div>

<script>

function validateName(){
  var fname=document.getElementById('fname').value;
  var patt = /^[a-zA-Z]{2,20}$/;
  var ferror=document.getElementById('fnamerr');
  if(patt.test(fname)==false){
    ferror.innerHTML="First Name must be between 2 and 20 characters (only letters).";
    document.getElementById('fname').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('fname').setAttribute("class","form-control is-valid");
    document.getElementById('fnamerr').innerHTML=null;

  }
}
function validateLName(){
  var lname=document.getElementById('lname').value;
  var patt = /^[a-zA-Z]{2,20}$/;
  if(patt.test(lname)==false){
    document.getElementById('lnamerr').innerHTML="Last Name must be between 2 and 20 characters (only letters).";
    document.getElementById('lname').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('lname').setAttribute("class","form-control is-valid");
    document.getElementById('lnamerr').innerHTML=null;
  }
}
function validateUname(){
  var username=document.getElementById('username').value;
  var patt = /^[a-zA-Z0-9]{4,10}$/;
  if(patt.test(username)==false){
    document.getElementById('usernamerr').innerHTML="Username must be between 4 and 10 characters (numbers or letters).";
    document.getElementById('username').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('username').setAttribute("class","form-control is-valid");
    document.getElementById('usernamerr').innerHTML=null;
  }
}
function validateEmail(){
  var email=document.getElementById('email').value;
  var patt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(patt.test(email)==false){
    document.getElementById('emailerr').innerHTML="Email must be in this format : example@example.com";
    document.getElementById('email').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('email').setAttribute("class","form-control is-valid");
    document.getElementById('emailerr').innerHTML=null;
  }
}

function validatePhone(){
  var phone=document.getElementById('phone').value;
  var patt = /^06[6-9]{1}[0-9]{7}$/;
  if(patt.test(phone)==false){
    document.getElementById('phonerr').innerHTML="Phone must be in this format : 06xxxxxxxx";
    document.getElementById('phone').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('phone').setAttribute("class","form-control is-valid");
    document.getElementById('phonerr').innerHTML=null;
  }
}
function validatePsw(){
  var oldp=document.getElementById('oldp').value;
  var patt = /^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{5,}$/;
  if(patt.test(oldp)==false){
    document.getElementById('opswerr').innerHTML="Password must contain at least 6 characters, at least one letter and one number.";
    document.getElementById('oldp').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('oldp').setAttribute("class","form-control is-valid");
    document.getElementById('opswerr').innerHTML=null;
  }
}
function validateNewPsw(){
  var newp=document.getElementById('newp').value;
  var patt = /^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{5,}$/;
  if(patt.test(newp)==false){
    document.getElementById('newpswerr').innerHTML="Password must contain at least 6 characters, at least one letter and one number.";
    document.getElementById('newp').setAttribute("class","form-control is-invalid");
  }else{
    document.getElementById('newp').setAttribute("class","form-control is-valid");
    document.getElementById('newpswerr').innerHTML=null;
  }
}
 
</script>
</body>
</html> 
