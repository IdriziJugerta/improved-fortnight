<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';
    //merret id  e shfaqjes se klikuar nga url
    $idSh=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    
    //marrim te dhenat e shfaqjes 
    $sql="SELECT * FROM shfaqje WHERE shfaqje_id='$idSh'";
    $rez=mysqli_query($conn,$sql) or die(mysqli_error($conn));
         
   
    //marrim reviewn dhe username e user i cili e ka derguar
    $sql1="SELECT username,review FROM opinion INNER JOIN user ON idUser=userId WHERE idShfaqje='$idSh'";
    $rez1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

    //marrim teatrot ne te cilet do shfaqet shfaqja
    $sql2="SELECT DISTINCT teater_id from orar inner join salle on idsalle=salle_id inner join teater on t_id=teater_id WHERE idShfaq='$idSh'";
    $rez2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
    
  
?>

<!DOCTYPE html>
    <body>
    <style>


/*.container {
  position: relative;
}

.topright {
  position: absolute;
  top: 100px;
  right: 16px;
  font-size: 18px;
}
 .topleft {
  position: absolute;
  top: 150px;
  left: 16px;
  font-size: 18px;
  

 }
 /*.container2 {
  position: relative;


}

.bottomright {
  position: fixed;
  bottom: 60px;
  right: 600px;
  font-size: 18px;
  
}*/
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 50%;
  padding: 5px;
  margin:1px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

</style>



<div class = "row"  >    <!---"container1" ---   "topleft"-  "container"---------topright---container2---bottomright------------------------>

            <?php
                 if($row=mysqli_fetch_assoc($rez)){ ?>
                    <!-- afishohen te dhenat e shfaqjes -->
                      <div class = "column"> <div class="topleft"> <p> <img src='images/<?php echo $row['image']; ?>'></p>  <h3><?php echo $row['shfaqje_emer']; ?></h3>  <p><?php echo $row['zhaner']; ?></p>  <p><?php echo substr($row['pershkrim'],0,150);?>...</p>  <p>Cast : <?php echo $row['cast']; ?></p > </div>
                     
        
            <?php } ?>

    
  <table>
                   <!-- afishojme teatrot dhe kohet e shfaqjeve -->
                    <?php
        
                    while($row2=mysqli_fetch_assoc($rez2)){
                     $sqlt="SELECT * FROM teater WHERE teater_id='".$row2['teater_id']."'";
                     $rezt=mysqli_query($conn,$sqlt)  or die(mysqli_error($conn));
                     while($rowOr=mysqli_fetch_assoc($rezt))
                     {?>
              <div class="column">  <tr>                
                        <!-- afishojme teatrot -->
                <td><?php echo $rowOr['teater_emer']." , ".$rowOr['adrese']?> </td> 
                     <?php } ?> 
                <td> 
                      <?php
                         // do marrim oraret ne te cilat shfaqja do te jepet ne teatrot e ndryshme
                           $sqlOr="SELECT DISTINCT idOrar,ora_fillimi FROM salle INNER JOIN teater ON t_id= teater_id INNER JOIN orar 
                           ON salle_id=idSalle where idShfaq='$idSh' and teater_id='".$row2['teater_id']."'";
                           $rezOr=mysqli_query($conn,$sqlOr) or die(mysqli_error($conn));
                while($rowOr=mysqli_fetch_assoc($rezOr))
                {?>
                <!-- afishojme oraret -->
                <a href ="rezervim.php?orar=<?php echo $rowOr['idOrar'];?>&shfaqje_id=<?php echo $idSh;?>&teater_id=<?php echo $row2['teater_id'];?>">
                <button> <?php echo date('h:i A',strtotime($rowOr['ora_fillimi']));?></button></a>
               </div>
                <?php } ?> 
                 </td>
               </tr>
            <?php 
            }     
        ?>
        </table>
        </div>

   







        <div class= "row">

         <!--div class ="row"-->    
    <?php 
             //per te shfaqur form te review kontrollojme nese kemi nje user te loguar
             if(isset($_SESSION['userId'])){ ?>
            <div class = "column">
             <form action="reviewdb.php?shfaqje_id=<?php echo $idSh ?>" method="post"> <textarea  rows="4" cols="50" name ="review" placeholder="Give a review" required > </textarea><input type="submit" name="sendrev">
             </form>
              
    <?php }?>


        <?php
            //afishojme review-et e bera te dukshme per user e regjistruar dhe per vizitoret
         if(mysqli_num_rows($rez1)>0){
            while($row1=mysqli_fetch_assoc($rez1)){ ?>
<div class="column"><h4><?php echo $row1['username']; ?></h4> <p><?php echo $row1['review']; ?></p></div>
          
      <?php  }     
       }
    ?>
     </div>
     <!--/div-->




      
               
     </body>
 </html>
