<?php
    session_start();
    require_once 'dbcon.php';
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        // Check user is exist in the database
        $sql= "SELECT * FROM user WHERE username='$username' AND userPass='$password'";
        $rez = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $nrRez = mysqli_num_rows($rez);
        if ($nrRez == 1) {
            $row=mysqli_fetch_assoc($rez);
            $_SESSION['username'] = $username;
            $_SESSION['userId']=$row['userId'];
            $_SESSION['loguar']=true;
            $_SESSION['type']=$row['userType'];
            // Redirect to user dashboard page
            if($_SESSION['type']=="0"){
                header("Location:admin.php");
            }else{
                header("Location: home.php");
            }
            
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>

    <form method="post" name="login">
        <h1 >Login</h1>
        <input type="text"  name="username" placeholder="Username" autofocus="true">
        <input type="password"  name="password" placeholder="Password">
        <input type="submit" value="Login" name="submit" >
        <br>
        <br>

        <div></div>

        <p><a href="regjistrim.php">New Registration</a></p>
  </form>

</body>
</html>