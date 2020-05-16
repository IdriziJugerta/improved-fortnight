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