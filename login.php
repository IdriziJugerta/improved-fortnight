﻿<?php
require_once 'include/dbcon.php';

//pasi dergohet form marrim te dhenat e saj
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //kontrollojme nese nje nga fushat do jete bosh dhe e dergojme ne faqe me nje error 
    //ku user do i shfaqet mesazhi perkates
    if(empty($username)||empty($password)){
        header("Location:login.php?error=emptyinput");
        exit();
    }
    else{
    // kontrollojme nese user ndodhet ne databaze
    $sql= "SELECT * FROM user WHERE username='$username' AND userPass='$password'";
    $rez = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $nrRez = mysqli_num_rows($rez);
    if ($nrRez == 1) {
        $row=mysqli_fetch_assoc($rez);
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['userId']=$row['userId'];
        $_SESSION['loguar']=true;
        $_SESSION['type']=$row['userType'];
        // kontrollojme nese perdoruesi eshte admin apo user dhe e drejtojme te faqja perkatese
        if($_SESSION['type']=="0"){
            header("Location:admin.php");
        }
        else{
            header("Location:homepage.php");
        }
    }
    else header("Location:login.php?error=nouser");
    exit();
}
}
?>

<html>
<head>
    <link rel="stylesheet" href="loginStyle.css">
    <title>Log in</title>
</head>

<body>
    <img src="logo.png" class="logo" />
    <div class="main">
        <p class="sign" align="center">Login Now</p>
<?php
//do afishohen mesazhet perkatese per secilin error
 if (isset($_GET['error'])){
    if(($_GET['error'])=="emptyinput"){
        echo'<p class="error">Please fill all the fields!</p>';
    }
    else if(($_GET['error'])=="nouser"){
        echo'<p class="error">This user does not exist. Check the information you have entered.</p>';
    }
}
?>
       <form class="form1"  method="post">
            <input class="un " type="text" align="center" name ="username" placeholder="Username">
            <input class="pass" type="password" align="center" name="password" placeholder="Password">
            <button class="btn1" type="submit" name="submit">Log in</button><br><br>
            <p class="noAcc" align="center">Don't have an account?  <a href="registration.php">Sign up</a> </p>
        </form> 
</body>

</html>
