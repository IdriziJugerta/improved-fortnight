
<?php
//perfshin file qe ben lidhjen me databazen
include_once("includes/dbcon.php");
//merr te dhenat e shfaqes nga databaza
$sql = "SELECT * FROM salle ORDER BY salle_id DESC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<html>
<head>
<title>Salla</title>
<link rel="stylesheet" type="text/css" href="salleStyle.css" />
</head>
<body>
</br>
</br>
<a href='admin.php' class='link' align='center'>Admin Page</a>
<form name="frmShow" method="post" action="">
<table border="1" cellpadding="10" cellspacing="3" width="500" align="center" style="padding-top:25px;">
<tr>
<th>Id Teatrit</th>
<th>Emri Salles</th>
<th>Vende</th>
<th>CRUD Actions</th>
</tr>
<?php
while($salle_data = mysqli_fetch_array($result)) {
     echo "<tr>";
     echo "<td>".$salle_data["t_id"]."</td>";
     echo "<td>".$salle_data["emer_salle"]."</td>";
     echo "<td>".$salle_data["seats"]."</td>";
     echo "<td ><a href='edit_salle.php?salle_id=$salle_data[salle_id]' class='link' >Edit</a> | <a href='delete_salle.php?salle_id=$salle_data[salle_id]' class='link' >Delete</a></td></tr>";

     }
?>

</table>
<div align="center" style="padding-top:25px;"><a href="add_salle.php" class="link"> Shto salle</a></div>
</form>
</div>
</body></html>