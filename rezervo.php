<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';


$user=$_POST['user'];
$orari=$_POST['orari'];
$seats=$_POST['noSeats'];
$pagesa=$_POST['pagesa'];
$cmimi=$seats*$pagesa;
$status=1;

$query="insert into rezervim(user_id,orarId,no_seats,total_pagese,status) values('".$user."','".$orari."','".$seats."','".$cmimi."','".$status."')";
$result=mysqli_query($conn,$query);
if($result)
echo "<h2> Rezervimi u be.</h2>";
else
echo mysqli_error($conn);
// DERGIMI NE EMAIL 
//marrim email e user
$queryUser="select * from user where userId='".$user."'";
$resultUser=mysqli_query($conn,$queryUser);
$arrayUser=mysqli_fetch_assoc($resultUser);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

if (isset($_POST['submit'])){
//dergimi ne email i te dhenave te rezervimit
$email=$arrayUser['email'];
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
$mail->Subject = "Rezervimi juaj";
$mail->Body = "
<html>
<head>
<style> 
table {
    border: solid 3px #d9d9d9;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 14px Arial, sans-serif;
}
td {
    border: solid 2px #d9d9d9;
    color: black;
    padding: 10px;
}
</style>
</head>
<body>
<h4>Te dhenat e rezervimit per shfaqjen: <b>".$_POST['shfaqja']."</b></h4> <br><br>
<table>
<tr>
<td > Emri: ".$_POST['fName']."</td> <td >Mbiemri: ".$_POST['lName']."</td> <td > Nr.telefon: ".$_POST['pNumber']."</td>
</tr>
<tr>
<td > Teatri: ".$_POST['tEmer']."</td> <td > Salla: ".$_POST['tSalle']."</td> <td > Data: ".$_POST['date']."</td>
</tr>
<tr>
<td >Orari: ".$_POST['orar']."</td> <td >Numri i vendeve: ".$_POST['noSeats']."</td> <td >Pagesa: ".$_POST['pagesa']."</td>
</tr>
</table>
</body>
</html> ";
$mail->isHTML(true);
if(!$mail->send()) 
exit();
}

?>

<!DOCTYPE html>
    <body>
<div class ="imazh"> <img src="images\logo.png" width= "1600" height="500">  </div>
    <style>
    .imazh {
 
 position: center;
        max-width: 100%;
  height: auto;}
  h2{
    font-family: "Comic Sans MS", cursive, sans-serif	
;

}
    </style>
    </body>
    </html>
