
<?php
require_once("includes/dbcon.php");
// query qe ben te mundur fshirjen e rreshtit ne tabele bazuar ne id
$sql = "DELETE FROM salle WHERE salle_id='" . $_GET["salle_id"] . "'";
mysqli_query($conn,$sql);
//pas fshirjes shfaqet faqja me listen e shfaqeve qe jane ne tabele
header("Location:salle.php"); 
?>