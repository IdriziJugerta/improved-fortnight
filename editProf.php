<?php
session_start();
require_once 'dbcon.php';
require_once 'check.php';
if(isset($_POST['update'])){
    $id=$_SESSION['userId'];
    $new_user=mysqli_real_escape_string($conn,$_POST['newUser']);
    $new_pass=mysqli_real_escape_string($conn,$_POST['newPsw']);
   
        $sql1="UPDATE user SET username='$new_user', userPass='$new_pass' WHERE userId='$id'";
    

    if(mysqli_query($conn,$sql1)){
        
        header("Location:profil.php?userId=$id");
         } else {
       echo $mysqli_error($conn);
         }
    } 
?>

<!DOCTYPE html>
    <h1>Ndrysho te dhenat</h1>
    <form action="" method="post" >
    <input type="text" name="newUser" placeholder="Enter username" ><br>
    <input type="text" name="newPsw" placeholder="Password i ri" > <br>
    <input type="submit" name="update" value="Submit">
    </form>
</html>