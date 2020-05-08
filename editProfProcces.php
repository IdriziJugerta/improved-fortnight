<?php
session_start();
require_once 'includes/dbcon.php';

$id=$_SESSION['userId'];

  if (isset($_POST['submit'])) {

    //username
    if (!empty($_POST['username'])){
      $sql_u = "SELECT * FROM user WHERE username='".$_POST['username']."'";
      $res_u = mysqli_query($conn, $sql_u);
      if(mysqli_num_rows($res_u)> 0 ){
        header("Location:editProf.php?userId=".$id."&error=usernametaken");
        exit();
      }
      if(!preg_match('/^[a-zA-Z0-9]{4,10}$/',$username)) {
        header("Location:editProf.php?userId=".$id."&error=invaliduname");
        exit();
      }
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $sql="UPDATE user SET username='$username' WHERE userId='$id'";
      mysqli_query($conn,$sql) or die(mysqli_error($conn));
    }
    //first name
    if (!empty($_POST['emer'])){
      if(!preg_match('/^[a-zA-Z]{2,20}$/',$_POST['emer'])) {
       header("Location:editProf.php?userId=".$id."&error=invalidname");
       exit();
      }
    $emer = mysqli_real_escape_string($conn, $_POST['emer']);
    $sql="UPDATE user SET emer='$emer' WHERE userId='$id'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    }

    //last name
    if (!empty($_POST['mbiemer'])){
     if(!preg_match('/^[a-zA-Z]{2,20}$/', $_POST['mbiemer'])) {
       header("Location:editProf.php?userId=".$id."&error=invalidlname");
       exit();
      }
    $mbiemer = mysqli_real_escape_string($conn, $_POST['mbiemer']);
    $sql="UPDATE user SET mbiemer='$mbiemer' WHERE userId='$id'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
  }
    //email
    if(!empty($_POST['email'])){
      $sql_e = "SELECT * FROM user WHERE email='".$_POST['email']."'";
      $res_e = mysqli_query($conn, $sql_e);
      if(mysqli_num_rows($res_e)> 0){
        header("Location:editProf.php?userId=".$id."&error=emailtaken");
        exit();
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:editProf.php?userId=".$id."&error=invalidemail");
        exit();
    }
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $sql="UPDATE user SET email='$email', WHERE userId='$id'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
  }
    //phone
    if(!empty($_POST['tel'])){
      if(!preg_match('/^06[6-9]{1}+[0-9]{7}$/',$_POST['tel'])) {
        header("Location:editProf.php?userId=".$id."&error=invalidphone");
        exit();
      }
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $sql="UPDATE user SET telefon='$tel' WHERE userId='$id'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
  }

      header("Location:profil.php?userId=$id");
  }  
    
  if (isset($_POST['change'])){
    $oldpsw = mysqli_real_escape_string($conn, $_POST['oldpsw']);
    $newpsw = mysqli_real_escape_string($conn, $_POST['newpsw']);
    $rep = mysqli_real_escape_string($conn, $_POST['rep']);

    $sql_p = "SELECT * FROM user WHERE userId='$id'";
    $rez_p=mysqli_query($conn,$sql_p) or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($rez_p);
    if(!password_verify($oldpsw,$row['userPass'])){
      header("Location:editProf.php?userId=".$id."&error=wrongpsw");
      exit();
    }
    else{
    if(!preg_match('/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{5,}$/',$newpsw)) {
      header("Location:editProf.php?userId=".$id."&error=invalidpsw");
      exit();
    }
    if($newpsw!=$rep){
      header("Location:editProf.php?userId=".$id."&error=nomatch");
      exit();
    }

    $hashpsw=password_hash($newpsw,PASSWORD_DEFAULT);
    $sql1="UPDATE user SET userPass='$hashpsw' WHERE userId='$id'";

    if(mysqli_query($conn,$sql1)){
      header("Location:profil.php?userId=$id");
    } else {
        echo mysqli_error($conn);
      }

  }
}
?>