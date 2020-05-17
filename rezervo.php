<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';


$user=$_POST['user'];
$orari=$_POST['orari'];
$seats=$_POST['noSeats'];
$pagesa=$_POST['pagesa'];
$status=1;
$_SESSION['shfaqje']=$_POST['shfaqja'];

$query="insert into rezervim(user_id,orarId,no_seats,total_pagese,status) values('".$user."','".$orari."','".$seats."','".$pagesa."','".$status."')";
$result=mysqli_query($conn,$query);
if($result)
echo "<h2> Rezervimi u be.</h2><h4>Te dhenat ndodhen tashme ne emailin tuaj.</h4><br><br><br>";
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
<head>
<script
    src="https://www.paypal.com/sdk/js?client-id=AdPL6ygaOlizOZ-hT-a-RSvWcYacqaInboNkkG4sjBMTKU4FcldJZ7KlSO7L4pPlH8s6AOdzQd33stCd"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>
</head>
    <body>
    <style>

  h2{
    font-family: "Comic Sans MS", cursive, sans-serif	
;
color:white;
}
h4{
    font-family: "Comic Sans MS", cursive, sans-serif	
;
color:white;
}
    </style>
    <h4>Mund te beni dhe pagese online</h4><br><br>
    <div id="paypal-button-container" style="width: 400px; margin: 0 auto;"></div>

    <!-- PAGESA ONLINE -->
    <script>
    var lek=  <?php echo $pagesa?>*0.0088;
    paypal.Buttons({
    style: {
            size : 'responsive',        
          shape: 'pill',
          color: 'silver',
          layout: 'vertical',
          label: 'buynow',
          
      },
    
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value:lek
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function() {
        // This function shows a transaction success message to your buyer.
        window.location = "paypal-transaction-complete.php?orderID="+data.orderID;				
        
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
    </script>
    </body>
    </html>
