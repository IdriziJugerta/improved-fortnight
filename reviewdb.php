<?php
session_start();
    require_once 'dbcon.php';
    $shfaqje=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    $id=$_SESSION['userId'];
    if(isset($_POST["sendrev"])&& $_SESSION['userId']){
        if(!empty($_POST['review'])&& $_POST['review']!=" "){
        $rev=mysqli_real_escape_string($conn,$_POST['review']);
        $sql="INSERT INTO opinion (idUser,idShfaqje, review) VALUES ('$id','$shfaqje','$rev')";
        
        if(mysqli_query($conn,$sql)){
            header("Location:shfaqja.php?shfaqje_id=$shfaqje");
        }else{
            echo "Error".mysqli_error($conn);
        }
        }
        else echo "<script type='text/javascript'>alert('Ploteso fushen')</script>";
    }else{ echo "<script type='text/javascript'>alert('Nuk jeni loguar')</script>";}

?>