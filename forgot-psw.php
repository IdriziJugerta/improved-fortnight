<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';
session_start();
require_once 'includes/dbcon.php';
if (isset($_POST['submit'])){

   
    //krijojme nje token dhe url e cila do i dergohet userit per te bere reset
    $token=bin2hex(random_bytes(32));
    $email=$_POST['email'];

    $url="http://localhost/web/web-project/createpsw.php?token=".$token."&email=".$email."";
    //marrim email e derguar nga user

    //kontrollojme nese email i dhene eshte i regjistruar
    $sqlE="SELECT * from user WHERE email='$email'";
    $rezE = mysqli_query($conn, $sqlE) or die(mysqli_error($conn));
    if(!$row=mysqli_fetch_assoc($rezE)){
        header("Location:forgot-psw.php?reset=noaccount");
    }else{

    //bejme delete nese ka token ekzistues
    $sqlD="DELETE  from pswreset WHERE pswemail='$email'";
    $rezD = mysqli_query($conn, $sqlD) or die(mysqli_error($conn));

    //bejme insert 
    $sql1="INSERT INTO pswreset (pswemail,pswtoken,expire) VALUES('$email','$token',DATE_ADD(NOW(), INTERVAL 20 MINUTE))";
    $rez = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    mysqli_close($conn);
    
    $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
                );
            $mail->Host="smtp.gmail.com";
            $mail->SMTPAuth=true;
            $mail->Username="provatheatre@gmail.com";
            $mail->Password="the@ho123"; 
            $mail->SMTPSecure = 'tls';           
            $mail->SMTPDebug = 2;
            $mail->Port = 587;
            $mail->setFrom("provatheatre@gmail.com", "The@HO");
	        $mail->addAddress($email);
	        $mail->Subject = "Reset Password";
	        $mail->Body = "In order to reset your password, please click on the link below:<br>
	            <a href='".$url."'>".$url."</a><br><br> ";
            $mail->isHTML(true);
           if(!$mail->send()) 
            header("Location:forgot-psw.php?reset=failed");
              
        else 
            header("Location:forgot-psw.php?reset=success");
     } 
}
?>

<html>
<head>
    <link rel="stylesheet" href="loginStyle.css">
    <title>Forgot password?</title>
</head>

<body>
    <img src="images/logo.png" class="logo" />
    <div class="mainfp">
        <p class="sign" align="center">Forgot Password?</p>
       <form class="form1" action=""  method="post">
            <input class="un " type="email" align="center" name ="email" placeholder="Please enter you email">
            <button class="btn1" type="submit" name="submit">Send</button><br><br>
        </form> 

        <?php
//do afishohen mesazhet perkatese per secilin error
 if (isset($_GET['reset'])){
    if(($_GET['reset'])=="success"){
        echo'<p class="error">Check your email!</p>';
    }else if(($_GET['reset'])=="failed"){
        echo'<p class="error">Failed!</p>';
    }
}
if (isset($_GET['reset'])){
    if(($_GET['reset'])=="noaccount"){
        echo'<p class="error">No account with this email!</p>';
    }
    else if(($_GET['reset'])=="error"){
        echo'<p class="error">An error occured.</p>';
    }else if(($_GET['reset'])=="nothex"){
        echo'<p class="error">Not hex.</p>';
    }
    else if(($_GET['reset'])=="notsamehash"){
        echo'<p class="error">Not the same hash.</p>';
    }
    else if(($_GET['reset'])=="exp"){
        echo'<p class="error">databaze error.</p>';
    }
}
?>
</body>

</html>
