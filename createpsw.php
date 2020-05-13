
<html>
<head>
    <link rel="stylesheet" href="loginStyle.css">
    <title>Reset password</title>
</head>

<body>
    <img src="images/logo.png" class="logo" />
    <div class="main">
        <p class="sign" align="center">Reset Password</p>
        <?php
        session_start();
        $token=$_GET['token'];
        $email=$_GET['email'];
        if(empty($token)){
            header("Location:forgot-psw.php?reset=error");
            exit();
        }
        else {
            //kontrollojme nese token eshte i fromatiti hex
            if(ctype_xdigit($token)==true){
        ?>

       <form class="form1" action="checkpswreset.php" method="post">
            <input type="hidden" name ="token" value="<?php echo $token;?>">
            <input type="hidden" name ="email" value="<?php echo $email;?>">
<<<<<<< HEAD
            <input class="un" type="password" align="center" name ="psw" pattern="^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{5,}$" title="Password must contain at least 6 characters, at least one letter and one number." required placeholder="Please enter you password">
=======
            <input class="un" type="password" align="center" name ="psw"  pattern="^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{5,}$" title="Password must contain at least 6 characters, at least one letter and one number." required placeholder="Please enter you password">
>>>>>>> b7d35d44613fa70de2ee90e6c4cfc75e9f8d3822
            <input class="un" type="password" align="center" name ="pswrep" required placeholder="Repeat your password">
            <button class="btn1" type="submit" name="reset">Send</button><br><br>
        </form> 

        <?php
            }else
            header("Location:forgot-psw.php?reset=nothex");
        }
        if (isset($_GET['reset'])){
            if(($_GET['reset'])=="nomatch"){
                echo'<p class="error">Your passwords do not match!</p>';
            }
        }
        ?>

   

</body>
