<?php
session_start();
    require_once 'include/dbcon.php';
    $shfaqje=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    $id=$_SESSION['userId'];
    if(isset($_POST["sendrev"])){
        //kontrollojme nese review eshte jo boshe
        if(!empty($_POST['review'])&& $_POST['review']!=" "){
        $rev=mysqli_real_escape_string($conn,$_POST['review']);

        //shtojme ne databazes review e bere
        $sql="INSERT INTO opinion (idUser,idShfaqje, review) VALUES ('$id','$shfaqje','$rev')";
        
        //nese shtimi eshte i sukseshem useri do te dergoheet ne faqen e shfaqjes 
        if(mysqli_query($conn,$sql)){
            header("Location:shfaqja.php?shfaqje_id=$shfaqje");
        }else{
            echo "Error".mysqli_error($conn);
        }
        }
        else echo "<script type='text/javascript'>alert('Ploteso fushen')</script>";
    }

?>