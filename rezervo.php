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
echo "rezervimi u be";
else
echo mysqli_error($conn);
?>