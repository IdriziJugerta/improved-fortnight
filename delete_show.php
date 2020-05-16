
<?php
require_once("includes/dbcon.php");
// query qe ben te mundur fshirjen e rreshtit ne tabele bazuar ne id
$sql = "DELETE FROM shfaqje WHERE shfaqje_id='" . $_GET["shfaqje_id"] . "'";
mysqli_query($conn,$sql);
//pas fshirjes shfaqet faqja me listen e shfaqeve qe jane ne tabele
header("Location:shfaqje.php"); 
?>