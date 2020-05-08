<?php
require_once 'includes/dbcon.php';

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
    $sql= "SELECT * FROM user WHERE username='$username'";

    $rez = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($rez) == 1) {
        $row=mysqli_fetch_assoc($rez);
        if(password_verify($password,$row['userPass'])){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['userId']=$row['userId'];
        $_SESSION['type']=$row['userType'];
        // kontrollojme nese perdoruesi eshte admin apo user dhe e drejtojme te faqja perkatese
        if($_SESSION['type']=="0"){
            header("Location:admin.php");
        }
        else{
            header("Location:index.php");
        }
    }
        else header("Location:login.php?error=wrongpsw");
        exit();
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
    <img src="images/logo.png" class="logo" />
    <div class="main">
        <p class="sign" align="center">Login Now</p>
<?php
//do afishohen mesazhet perkatese per secilin error
 if (isset($_GET['error'])){
    if(($_GET['error'])=="emptyinput"){
        echo'<p class="error">Please fill all the fields!</p>';
    }
    if(($_GET['error'])=="wrongpsw"){
        echo'<p class="error">The password is incorrect.</p>';
        }
    if(($_GET['error'])=="nouser"){
        echo'<p class="error">This user does not exist. Check the information you have entered.</p>';
        }
    
    }
        
    
    if (isset($_GET['reset'])){
            if(($_GET['reset'])=="success"){
                echo'<p class="error">Login with new password!</p>';
            }
        }

?>
       <form class="form1" action="" method="post">
            <input class="un " type="text" align="center" name ="username" placeholder="Username">
            <input class="pass" type="password" align="center" name="password" placeholder="Password">
            <button class="btn1" type="submit" name="submit">Log in</button><br><br>
            <p class="noAcc" align="center">Don't have an account?  <a href="registration.php">Sign up</a> </p>
        </form> 
    <a href='forgot-psw.php' class="fpass">Forgot password?</a>
</body>

</html>
