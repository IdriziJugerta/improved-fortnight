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
    body, html {
  height: 100%;
  margin: 0;
  }
  .imazh {
  background-image: url("images/background.jpeg");
  height: auto;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  /* position: relative; */
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
h3{
  text-align : left;
    font-family: "Comic Sans MS", cursive, sans-serif	
;
color:white;
}
</style>
<div class="imazh">
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
        <br>

        <h3>Your Reservations</h3>
        <?php
        $sql="SELECT * FROM rezervim INNER JOIN orar ON orarId=idOrar INNER JOIN salle on idSalle=salle_id INNER JOIN teater ON teater_id=t_id INNER JOIN shfaqje ON idShfaq=shfaqje_id WHERE user_id='$user'";
        $rez=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $nrQuery=mysqli_num_rows($rez);
        if($nrQuery==0){
            echo '<div class="span6"> <p>Nuk keni asnje bilete te rezervuar me pare </p></div>';
            exit();
        }else{?>
        <table class="table table-borderless table-secondary table-hover col-xs-5 col-lg-6">
        <thead>
        <tr>
        <th scope="col">Theatre</th>
        <th scope="col">Play</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Seats</th>
        <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($rez)){?>
        <tr>
        <td><?php echo $row['teater_emer'];?></td>
        <td><?php echo $row['shfaqje_emer'];?></td>
        <td><?php echo $row['date_shfaqje'];?></td>
        <td><?php echo $row['ora_fillimi'];?></td>
        <td><?php echo $row['no_seats'];?></td>
        <td><?php echo $row['total_pagese'];?></td>
        </tr>
        <?php
        }?>
        </tbody>
        </table>
      <?php  }
        ?>
     </div>
  
    </body>
    </html>
