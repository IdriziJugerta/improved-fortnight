
<html>
<head>
<title>Add Show</title>
<link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>
<body>
<br/><br/>
<form name="frmShow" method="post" action="add_show.php" enctype="multipart/form-data">
<table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
<tr>
<td colspan="2" align="center">Add New Show</td>
</tr>
<tr>
<td><label>SalleId</label></td>
<td><input type = "number" name="salleId" class="form-control" placeholder="ID"></td>
</tr>
<tr>
<td><label>Emer Shfaqje</label></td>
<td> <input type = "text" class="form-control" name="shfaqje_emer" placeholder="Emer Shfaqje"></td>
</tr>
<tr>
<td> <label>Cast</label></td>
<td><input type = "text" class="form-control" name="cast" placeholder="Cast"></td>
</tr>
<tr>
<td> <label>Description</label></td>
<td> <TEXTAREA  class="form-control" name="pershkrim" placeholder="Pershkrim" type="textArea" tabindex="1" required></TEXTAREA></td>
</tr>
<tr>
<td> <label>Image</label></td>
<td><input style="padding: 10px;" type="file" name="image" required autofocus></td>
</tr>
<tr>
<td><label>Zhaner</label></td>
<td> <select class="form-control" name="zhaner" >
					<option value="Komedi">Komedi</option>
					<option value="Drame">Drame</option>
				</select></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Add" class="crudBtn"></td>
</tr>
</table>
</form>

<?php

	// Kontrollon nese jane derguar te dhenat e formes per tu vendosur ne tabele
	if(isset($_POST['submit'])) {
		$salleId = $_POST['salleId'];
		$shfaqje = $_POST['shfaqje_emer'];
		$cast = $_POST['cast'];
		$pershkrim = $_POST['pershkrim'];
		$target_dir = "images/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "<p align='center'><font color=white>File ". basename( $_FILES["image"]["name"]). " eshte uploduar.</font></p>";
    } else {
        echo "<p align='center'><font color=red>Ka nje gabim ne uploadimin e file-it.</font></p>";
    }
	
    $image=basename( $_FILES["image"]["name"]); // ruan emrin e file ne nje variabel

		$zhaner = $_POST['zhaner'];

		// perfshin file qe ben lidhjen me databazen
		include_once("includes/dbcon.php");

		$qry="SELECT * FROM salle WHERE salle_id=$salleId";
$result = mysqli_query($conn,$qry);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
    // shton te dhenat e shfaqjes ne tabele
	mysqli_query($conn, "INSERT INTO shfaqje(salleId, shfaqje_emer, cast, pershkrim,image, zhaner) VALUES('$salleId','$shfaqje','$cast','$pershkrim','$image','$zhaner')");
    echo"<p align='center'><font color=white>Shfaqja u shtua me sukses!</font></p>";
}else{
    echo "<p align='center'><font color=red>Salla nuk ekziston! Te dhenat nuk u shtuan.</font></p>";
}
		
		echo "<p align='center'><a href='shfaqje.php' class='link' align='center'>View Shows</a></p>";
	}
	?>
</body>
</html>
