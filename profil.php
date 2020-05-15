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
    <style>
    .imazh {
  background-image: url("images/background.jpeg");

  height: 700px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
table, td  {  
  border: 1px solid grey;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 20%;
}

 td {
  padding: 8px;
}
h2{
    font-family: "Comic Sans MS", cursive, sans-serif	
;
}
    </style>
<div class="imazh">
    <h2>Personal Information </h2>        
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
     </div> 
    </body>
