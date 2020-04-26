<?php
session_start();
    require_once 'dbcon.php';
    $idSh=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);

    $sql="SELECT * FROM shfaqje WHERE shfaqje_id='$idSh'";
    $rez=mysqli_query($conn,$sql);
    $nrQuery=mysqli_num_rows($rez);

    if($nrQuery>0){
        $row=mysqli_fetch_assoc($rez);
           
   }

   $sql1="SELECT username,review FROM opinion INNER JOIN user ON idUser=userId WHERE idShfaqje='$idSh'";
    $rez1=mysqli_query($conn,$sql1);
    $nrQuery1=mysqli_num_rows($rez1);
  
?>

<!DOCTYPE html>
    <body>
        <div>
                <h3><?php echo $row['shfaqje_emer'] ?></h3>
                <p><img src='<?php echo $row['image'] ?>'></p>
                <p><?php echo $row['pershkrim'] ?></p>
       </div>
       <?php 
    if(isset($_SESSION['userId'])){
        echo ' <form action="reviewdb.php?shfaqje_id='.$idSh.'" method="post">
        <textarea rows="4" cols="50" name ="review" placeholder="Give a review" required></textarea>
        <input type="submit" name="sendrev">
        </form>';
        
    }
?>

        <div>
        <?php
         if($nrQuery1>0){
            while($row1=mysqli_fetch_assoc($rez1)){
                echo"<div>
            <h3>".$row1['username']."</h3>
                <p>".$row1['review']."</p>
            </div>";
            }
               
       }
        ?>
        </div>
               
     </body>
 </html>
