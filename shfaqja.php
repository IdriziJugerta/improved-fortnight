<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';
    //merret id  e shfaqjes se klikuar nga url
    $idSh=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    
    //marrim te dhenat e shfaqjes 
    $sql="SELECT * FROM shfaqje WHERE shfaqje_id='$idSh'";
    $rez=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     $row=mysqli_fetch_assoc($rez);     
   
    //marrim reviewn dhe username e user i cili e ka derguar
    $sql1="SELECT username,review FROM opinion INNER JOIN user ON idUser=userId WHERE idShfaqje='$idSh'";
    $rez1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

    //marrim teatrot ne te cilet do shfaqet shfaqja
    $sql2="SELECT DISTINCT teater_id from orar inner join salle on idsalle=salle_id inner join teater on t_id=teater_id WHERE idShfaq='$idSh'";
    $rez2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
    
  
?>

<!DOCTYPE html>
    <body>
        <div>
        <!-- afishohen te dhenat e shfaqjes -->
                <h3><?php echo $row['shfaqje_emer'] ?></h3>
                <p><img src='images/<?php echo $row['image'] ?>'></p>
                <p><?php echo $row['zhaner'] ?></p>
                <p><?php echo $row['pershkrim'] ?></p>
                <p>Cast : <?php echo $row['cast'] ?></p>
       </div>
        <div>
       <?php 
        //per te shfaqur form te review kontrollojme nese kemi nje user te loguar
        if(isset($_SESSION['userId'])){
        echo ' <form action="reviewdb.php?shfaqje_id='.$idSh.'" method="post">
        <textarea rows="4" cols="50" name ="review" placeholder="Give a review" required></textarea>
        <input type="submit" name="sendrev">
        </form>';
        }
        ?>
        </div>
        <div>
        <?php
            //afishojme review-et e bera te dukshme per user e regjistruar dhe per vizitoret
         if(mysqli_num_rows($rez1)>0){
            while($row1=mysqli_fetch_assoc($rez1)){
                echo"<div>
            <h3>".$row1['username']."</h3>
                <p>".$row1['review']."</p>
            </div>";
            }     
       }
        ?>
        </div>

        <div>
        <table>
        <!-- afishojme teatrot dhe kohet e shfaqjeve -->
        <?php
        
            while($row2=mysqli_fetch_assoc($rez2)){
                $sqlt="SELECT * FROM teater WHERE teater_id='".$row2['teater_id']."'";
                $rezt=mysqli_query($conn,$sqlt)  or die(mysqli_error($conn));
                while($rowOr=mysqli_fetch_assoc($rezt))
                {?>
                <tr>                
                <!-- afishojme teatrot -->
                <td><?php echo $rowOr['teater_emer']." , ".$rowOr['adrese']?> </td> 
                <?php } ?> 
                <td> 
                <?php
                // do marrim oraret ne te cilat shfaqja do te jepet ne teatrot e ndryshme
                $sqlOr="SELECT DISTINCT ora_fillimi FROM salle INNER JOIN teater ON t_id= teater_id INNER JOIN orar 
                ON salle_id=idSalle where idShfaq='$idSh' and teater_id='".$row2['teater_id']."'";
                $rezOr=mysqli_query($conn,$sqlOr) or die(mysqli_error($conn));
                while($rowOr=mysqli_fetch_assoc($rezOr))
                {?>
                <!-- afishojme oraret -->
                <a href ="rezervim.php?orar=<?php echo $rowOr['ora_fillimi'];?>&shfaqje_id=<?php echo $idSh;?>&teater_id=<?php echo $row2['teater_id'];?>"><button> <?php echo date('h:i A',strtotime($rowOr['ora_fillimi']));?></button></a>
                <?php } ?> 
                 </td>
               </tr>
            <?php 
            }     
        ?>
        </table>
        </div>
               
     </body>
 </html>
