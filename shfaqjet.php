<?php
    session_start();
    require_once 'dbcon.php';
    $sql="SELECT * FROM shfaqje";
    $rez=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
    <body>
   
        <?php
        
            while($row=mysqli_fetch_assoc($rez)){
                echo"<div>
            <a href='shfaqja.php?shfaqje_id=".$row['shfaqje_id']."'>
            <p><img src='".$row['image']."'></p>
            <p>".$row['shfaqje_emer']."</p>
            </a>
            </div>";
            }
               
       
        ?>
               
     </body>
 </html>
