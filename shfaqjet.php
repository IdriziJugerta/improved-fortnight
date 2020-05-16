<?php
  include 'includes/header.php';
  
  require_once 'includes/dbcon.php';
  $sql="SELECT * FROM shfaqje";
    $rez=mysqli_query($conn,$sql);
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
              <a href='shfaqja.php?shfaqje_id=<?php echo $row['shfaqje_id'];?>'> <p><img src='images/<?php echo $row['image']?>'style= "width:20%  "></p><p> <?php echo $row['shfaqje_emer'] ?></p> 
            </div>
         <?php } ?>
     </div>   
     </body>
 </html>
   