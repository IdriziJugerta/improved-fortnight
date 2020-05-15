<?php
require_once 'includes/dbcon.php';
include 'includes/header.php';
 //kontrollojme nese perdoruesi ka shtypur butonin dergo nga form perkatese
    if(isset($_GET['submitsrch'])){
        //perdorim kete funksion per te mos ekzekutuar ne databaze kod qe mund te shkruhet ne fushat e  inputit
        $search=mysqli_real_escape_string($conn,$_GET['search']);
        //marrim rreshtat te cilat plotesojne kushtet
        $sql="SELECT * FROM shfaqje WHERE shfaqje_emer LIKE '%$search%' or zhaner LIKE '%$search%'
         or cast LIKE '%$search%' or pershkrim LIKE '%$search%'";
        $rez=mysqli_query($conn,$sql);
        $nrQuery=mysqli_num_rows($rez);   
    }
?>
<!DOCTYPE html>
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
<body>
<div class= "row1">
    <?php
    
if($nrQuery>0){
    echo "U gjenden ".$nrQuery." rezultate";
    while($row=mysqli_fetch_assoc($rez)){
        //afishojme rezulatet e gjetura nga query  i mesiperm
      
        echo"<div>
        <a href='shfaqja.php?shfaqje_id=".$row['shfaqje_id']."'>
        <h3>".$row['shfaqje_emer']."</h3></a>
            <p>".$row['pershkrim']."</p>
        </div>"; 
    
    }
}
else{
   echo "nuk ka rezultate";
}


    ?>
   </div>            
    </body>
     </html>


