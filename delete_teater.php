<?php
require_once("includes/dbcon.php");
// query qe ben te mundur fshirjen e rreshtit ne tabele bazuar ne id
$sql = "DELETE FROM teater WHERE teater_id='" . $_GET["teater_id"] . "'";
mysqli_query($conn,$sql);
//pas fshirjes shfaqet faqja me listen e teatrove qe jane ne tabele
header("Location:teaterCRUD.php");
?>
