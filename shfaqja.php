<?php
session_start();
    require_once 'dbcon.php';
    //merret id  e shfaqjes se klikuar nga url
    $idSh=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    
    //marrim te dhenat e shfaqjes 
    $sql="SELECT * FROM shfaqje WHERE shfaqje_id='$idSh'";
    $rez=mysqli_query($conn,$sql);
    $nrQuery=mysqli_num_rows($rez);
     $row=mysqli_fetch_assoc($rez);     
   
    //marrim reviewn dhe username e user i cili e ka derguar
    $sql1="SELECT username,review FROM opinion INNER JOIN user ON idUser=userId WHERE idShfaqje='$idSh'";
    $rez1=mysqli_query($conn,$sql1);
    $nrQuery1=mysqli_num_rows($rez1);
  
?>

<!DOCTYPE html>
    <body>
        <div>
        <!-- afishohen te dhenat e shfaqjes -->
                <h3><?php echo $row['shfaqje_emer'] ?></h3>
                <p><img src='<?php echo $row['image'] ?>'></p>
                <p><?php echo $row['zhaner'] ?></p>
                <p><?php echo $row['pershkrim'] ?></p>
                <p>Cast : <?php echo $row['cast'] ?></p>
       </div>

       <?php 
        //per te shfaqur form te review kontrollojme nese kemi nje user te loguar
        if(isset($_SESSION['userId'])){
        echo ' <form action="reviewdb.php?shfaqje_id='.$idSh.'" method="post">
        <textarea rows="4" cols="50" name ="review" placeholder="Give a review" required></textarea>
        <input type="submit" name="sendrev">
        </form>';
        }
        ?>
        <div>
        <?php
            //afishojme review-et e bera te dukshme per user e regjistruar dhe per vizitoret
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
