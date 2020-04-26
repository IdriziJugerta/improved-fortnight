<?php
session_start();
require_once 'dbcon.php';
require_once 'check.php';
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
    <h3>Personal Information |   </h3>        
        <table>
                    <tr>                
                     <td>username:</td><td><?php echo $row['username'] ?></td>   
                    </tr>
                    <tr>                
                     <td>password:</td><td><?php echo $row['userPass'] ?></td> 
                    </tr>       
        </table> 
        <a href ="editProf.php">Edit Profile</a>
    </body>
</html> 