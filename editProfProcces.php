<?php
session_start();
require_once 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $id=$_SESSION['userId'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $emer = mysqli_real_escape_string($conn, $_POST['emer']);
    $mbiemer = mysqli_real_escape_string($conn, $_POST['mbiemer']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql="UPDATE user SET username='$username', emer='$emer', mbiemer='$mbiemer', telefon='$tel', email='$email',
    userPass='$password' WHERE userId='$id'";

        if(mysqli_query($conn,$sql)){
        header("Location:profil.php?userId=$id");
         } else {
       echo mysqli_error($conn);
         }
}
?>