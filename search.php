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

.imazh {
  background-image: url("images/enjoy.jpg");
  height: 700px;
  background-position: right;
  background-repeat: no-repeat;
 border:   border:1px solid black;
  position: relative;
}

</style>
<body>
<div class= "imazh">
    <?php
    
if($nrQuery>0){
  echo "<h3 style = 'color:	#505050;'>U gjenden ".$nrQuery." rezultate </h3>";
  while($row=mysqli_fetch_assoc($rez)){
      //afishojme rezulatet e gjetura nga query  i mesiperm
    
      echo"<div style= 'float: left;
      width: 100%;
      padding: 5px;'>
      <a href='shfaqja.php?shfaqje_id=".$row['shfaqje_id']."'>
      <h4 style= 'text-align: left; color:	#D3D3D3';>".$row['shfaqje_emer']."</h4></a>
          <p style= 'text-align: left; width: 700px; color:	#505050;' } '>" .substr($row['pershkrim'],0,150)."...</p>
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


