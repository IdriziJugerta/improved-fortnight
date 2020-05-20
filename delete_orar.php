<?php
require_once("includes/dbcon.php");
// query qe ben te mundur fshirjen e rreshtit ne tabele bazuar ne id
$sql = "DELETE FROM orar WHERE idOrar='" . $_GET["idOrar"] . "'";
mysqli_query($conn,$sql);
//pas fshirjes shfaqet faqja me listen e orareve qe jane ne tabele
header("Location:orarCRUD.php");
?>