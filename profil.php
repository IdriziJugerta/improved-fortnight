<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';

$user=mysqli_real_escape_string($conn,$_GET['userId']);
$sql="SELECT * FROM user WHERE userId='$user'";
$rez=mysqli_query($conn,$sql);
$nrQuery=mysqli_num_rows($rez);
if($nrQuery>0){
    $row=mysqli_fetch_assoc($rez);
}
?>
<!DOCTYPE html>
    <body>
    <h3>Personal Information </h3>        
        <table>
                    <tr>                
                     <td>Username :</td><td><?php echo $row['username'] ?></td>   
                    </tr>
                    <tr>                
                     <td>First Name :</td><td><?php echo $row['emer'] ?></td> 
                    </tr>
                    <tr>                
                     <td>Last Name :</td><td><?php echo $row['mbiemer'] ?></td>   
                    </tr>
                    <tr>                
                     <td>Age :</td><td><?php echo $row['moshe'] ?></td> 
                    </tr>  
                    <tr>                
                     <td>Gender :</td><td><?php echo $row['gjini'] ?></td> 
                    </tr>
                    <tr>                
                     <td>Tel.number :</td><td><?php echo $row['telefon'] ?></td>   
                    </tr>
                    <tr>                
                     <td>Email :</td><td><?php echo $row['email'] ?></td> 
                    </tr>             
        </table> 
      
    </body>