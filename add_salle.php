
<html>
<head>
<title>Shto Salle</title>
<link rel="stylesheet" type="text/css" href="salleStyle.css" />
</head>
<body>
<br/><br/>
<form name="frmShow" method="post" action="add_salle.php" enctype="multipart/form-data">
<table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
<tr>
<td colspan="2" align="center">Shto nje salle te re</td>
</tr>
<tr>
<td><label>Teaterid</label></td>
<td><input type = "number" name="t_id" class="form-control" placeholder="ID" required="required"></td>
</tr>
<tr>
<td><label>Emer Salle</label></td>
<td> <input type = "text" class="form-control" name="emer_salle" placeholder="Emer Salle" required="required"></td>
</tr>
<tr>
<td> <label>Seats</label></td>
<td><input type = "number" class="form-control" name="seats" placeholder="Seats" min="30" max="100" required="required"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Add" class="crudBtn"></td>
</tr>
</table>
</form>

<?php

	// Kontrollon nese jane derguar te dhenat e formes per tu vendosur ne tabele
	if(isset($_POST['submit'])) {
		$t_id = $_POST['t_id'];
		$emer_salle = $_POST['emer_salle'];
		$seats = $_POST['seats'];
		// perfshin file qe ben lidhjen me databazen
		include_once("includes/dbcon.php");

		$qry="SELECT * FROM teater WHERE teater_id=$t_id";
$result = mysqli_query($conn,$qry);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
    // shton te dhenat e shfaqjes ne tabele
	mysqli_query($conn, "INSERT INTO salle(t_id, emer_salle, seats) VALUES('$t_id','$emer_salle','$seats')");
    echo"<p align='center'><font color=white>Salla u shtua me sukses!</font></p>";
}else{
    echo "<p align='center'><font color=red>Teatri nuk ekziston! Te dhenat nuk u shtuan.</font></p>";
}
		
		echo "<p align='center'><a href='salle.php' class='link' align='center'>View Salle</a></p>";
	}
	?>
</body>
</html>
