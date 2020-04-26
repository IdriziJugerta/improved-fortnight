<?php
    session_start();
    require_once 'dbcon.php';
 


    if(isset($_GET['dergo'])){
        $search=mysqli_real_escape_string($conn,$_GET['srch']);
        $sql="SELECT * FROM shfaqje WHERE shfaqje_emer LIKE '%$search%' or zhaner LIKE '%$search%'
         or cast LIKE '%$search%' or pershkrim LIKE '%$search%'";
        $rez=mysqli_query($conn,$sql);
        $nrQuery=mysqli_num_rows($rez);   
    }
?>
<!DOCTYPE html>
<body>

    <?php
if($nrQuery>0){
    echo "U gjenden ".$nrQuery." rezultate";
    while($row=mysqli_fetch_assoc($rez)){
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
               
            </body>
            </html>


