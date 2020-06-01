<?php
  include 'includes/header.php';
  
  require_once 'includes/dbcon.php';
  $sql="SELECT * FROM shfaqje";
    $rez=mysqli_query($conn,$sql);
    
$sql="SELECT * FROM rezervim INNER JOIN orar on orarId=idOrar ";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($rowR=mysqli_fetch_assoc($result)){
   $rezId=$rowR['rezervim_id'];
   $currentd=date('Y-m-d H:i:s');
   $date = $rowR['date_shfaqje'];
   if($currentd>$date){
       $sqlR="UPDATE rezervim SET status = 0 where rezervim_id=$rezId";
     mysqli_query($conn,$sqlR) or die(mysqli_error($conn));

 
     }else{
          $sqlR="UPDATE rezervim SET status = 1 where rezervim_id=$rezId";
          mysqli_query($conn,$sqlR) or die(mysqli_error($conn));
   
     }
     }

     $sql="SELECT * FROM rezervim INNER JOIN orar on orarId=idOrar INNER JOIN salle on idSalle=salle_id";
     $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     while($rowR=mysqli_fetch_assoc($result)){
       if($rowR['status']==0){
 $nrSeats=$rowR['seats']+$rowR['no_seats'];
 $id=$rowR['salle_id'];
 $sqlU="UPDATE salle SET seats = $nrSeats where salle_id=$id";
 mysqli_query($conn,$sqlU) or die(mysqli_error($conn));
 $rezId=$rowR['rezervim_id'];
 $sql="DELETE FROM rezervim WHERE rezervim_id=$rezId";
 mysqli_query($conn,$sql) or die(mysqli_error($conn));
       }
       else{
$id=$rowR['salle_id'];

$nrSeat=$rowR['seats'];
 $sqlU="UPDATE salle SET seats = $nrSeat where salle_id=$id";
 mysqli_query($conn,$sqlU) or die(mysqli_error($conn));
       }
     }

?>

<!DOCTYPE html>
<head>
<style>
* {
  box-sizing: border-box;
}

.column1 {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row1::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
 <body>
    <div class = "row1">
        <?php
                //do te afishohen te gjitha shfaqjet me imazhin dhe emrin te cilat jane te klikueshme dhe te cojne ne faqen perkatese te shfaqjes
          while($row=mysqli_fetch_assoc($rez)){ ?>
            <div class = "column1" > 
              <a href='shfaqja.php?shfaqje_id=<?php echo $row['shfaqje_id'];?>'> <p><img src='images/<?php echo $row['image']?>'style= "width:50%  "></p><p> <?php echo $row['shfaqje_emer'] ?></p> 
            </div>
         <?php } ?>
     </div>   
     </body>
 </html>
   