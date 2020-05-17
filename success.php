<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';

$orderID=$_GET['order'];
$name=$_GET['name'];
$value=$_GET['value'];
$time=date('l jS \of F Y h:i:s A',strtotime($_GET['time']));
$userId=$_SESSION['userId'];


// DERGIMI NE EMAIL 
//marrim email e user
 $sql="select * from user where userId='$userId'";
 $rez=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($rez);
 $email=$row['email'];
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h4 style="font-family: 'Comic Sans MS', cursive, sans-serif; color:white;">Pagesa u be. Te dhenat e transaksionit u jane derguar ne email.</h4>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

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
$mail->Port = 587;
$mail->setFrom("provatheatre@gmail.com", "The@HO");
$mail->addAddress($email);
$mail->Subject = "Your transaction data";
$mail->Body = "<html>
<body>
<h4>You have made a booking for : <b>".$_SESSION['shfaqje']."</b> on <b>THE@HO</b> website</h4><br>
The transaction #<u>".$orderID."</u> was made by : ".$name.".<br>
You have paid : ".$value."$ on ".$time."
</body>
</html> ";

unset($_SESSION['shfaqje']);

$mail->isHTML(true);
if(!$mail->send()) 
exit();

?>
</body>
</html>