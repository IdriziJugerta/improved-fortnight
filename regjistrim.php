<?php
require_once 'dbcon.php';
if (isset($_POST['submit'])) {
   
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $emer = mysqli_real_escape_string($conn, $_POST['emer']);
    $mbiemer = mysqli_real_escape_string($conn, $_POST['mbiemer']);
    $gjini = mysqli_real_escape_string($conn, $_POST['gjini']);
    $moshe = mysqli_real_escape_string($conn, $_POST['moshe']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(empty($username) || empty($password)){
        header("Location:../regjistrim.php?error=emptyfields");
    }
    $sql = "INSERT INTO user (username, userPass, emer, mbiemer, moshe, gjini, telefon, email, userType) VALUES ('$username','$password', '$emer' ,'$mbiemer','$moshe','$gjini','$tel','$email',1)";
    $rez = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if ($rez) {
        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a></p>
              </div>";
    } else {
        echo "<div class='form'>
              <h3> fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
              </div>";
    }
}
?>
<!DOCTYPE html>
<html>
    <title>Registration</title>
</head>
<body>

    <form action="" method="post">
        <h1 >Registration</h1>
        <input type="text" name="username" placeholder="Username" >
        <input type="text" name="emer" placeholder="Emer " >
        <input type="text" name="mbiemer" placeholder="Mbiemer" >
        <input type="text" name="gjini" placeholder="gjini" >
        <input type="number" name="moshe" placeholder="moshe" >
        <input type="number" name="tel" placeholder="tel" >
        <input type="text" name="email" placeholder="email" >
        <input type="password" name="password" placeholder="Password" >
        <input type="submit" name="submit" value="Register">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
</body>
</html>