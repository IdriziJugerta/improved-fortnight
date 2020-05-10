<?php
  include 'includes/header.php';
  require_once 'includes/dbcon.php';
  $sql="SELECT * FROM shfaqje";
    $rez=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
    <body>
   
        <?php
//do te afishohen te gjitha shfaqjet me imazhin dhe emrin te cilat jane te klikueshme dhe te cojne ne faqen perkatese te shfaqjes
            while($row=mysqli_fetch_assoc($rez)){ ?>
            <div>
            <a href='shfaqja.php?shfaqje_id=<?php echo $row['shfaqje_id'];?>'>
            <p><img src='images/<?php echo $row['image']?>'></p>
            <p> <?php echo $row['shfaqje_emer'] ?></p>
            </a>
            </div>
           <?php } ?>
               
     </body>
 </html>
