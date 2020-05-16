<?php
// include database connection file
include_once("includes/dbcon.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['Edit']))
{
	$shfaqje_id = $_POST['shfaqje_id'];

	$salleId = $_POST['salleId'];
		$shfaqje = $_POST['shfaqje_emer'];
		$cast = $_POST['cast'];
        $pershkrim = $_POST['pershkrim'];
        $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "File ". basename( $_FILES["image"]["name"]). " u aplodua me sukses.";
    } else {
        echo "Ka nje problem ne uploadimin e file-it.";
    }

    $image=basename( $_FILES["image"]["name"]); // used to store the filename in a variable
        $zhaner = $_POST['zhaner'];

	// update user data
    $qry="SELECT * FROM salle WHERE salle_id=$salleId";
$result = mysqli_query($conn,$qry);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
	mysqli_query($conn, "UPDATE shfaqje SET salleId='$salleId',shfaqje_emer='$shfaqje',cast='$cast',pershkrim='$pershkrim',image='$image',zhaner='$zhaner' WHERE shfaqje_id=$shfaqje_id");
    echo"Shfaqja u shtua me sukses!";
}else{
    echo "Salla nuk ekziston! Te dhenat nuk u shtuan.";
}
	// Redirect to homepage to display updated user in list
	header("Location: shfaqje.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$shfaqje_id = $_GET['shfaqje_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM shfaqje WHERE shfaqje_id=$shfaqje_id");

while($show_data = mysqli_fetch_array($result))
{
	$salleId = $show_data["salleId"];
	$shfaqje = $show_data['shfaqje_emer'];
    $cast = $show_data['cast'];
    $pershkrim = $show_data["pershkrim"];
	$image = htmlspecialchars ($show_data["image"], ENT_QUOTES);
    $zhaner = $show_data['zhaner'];
}
?>
<html>
<head>
	<title>Edit Show Data</title>
<link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>

<body>
<p align='center'><a href="shfaqje.php" class="link" align="center">Home</a></p>
	<br/><br/>

	<form name="frmShow" method="post" action="edit_show.php" enctype="multipart/form-data">
		<table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
        <tr>
<td><label>SalleId</label></td>
<td><input type = "number" name="salleId" class="form-control" placeholder="ID" value=<?php echo $salleId;?>></td>
</tr>
<tr>
<td><label>Emer Shfaqje</label></td>
<td> <input type = "text" class="form-control" name="shfaqje_emer" value=<?php echo $shfaqje;?>></td>
</tr>
<tr>
<td> <label>Cast</label></td>
<td><input type = "text" class="form-control" name="cast" placeholder="Cast" value=<?php echo $cast;?>></td>
</tr>
<tr>
<td> <label>Description</label></td>
<td> <TEXTAREA  class="form-control" name="pershkrim" placeholder="Pershkrim" type="textArea" ><?php echo htmlspecialchars($pershkrim); ?></TEXTAREA></td>
</tr>
<tr>
<td> <label>Image</label></td>
<td><input style="padding: 10px;" type="file" name="image" value= <?php echo $image;?>></td>
</tr>
<tr>
<td><label>Zhaner</label></td>
<td> <select class="form-control" name="zhaner" value=<?php echo $zhaner;?>>
					<option value="Komedi">Komedi</option>
					<option value="Drame">Drame</option>
				</select></td>
</tr>
<tr>
				<td><input type="hidden" name="shfaqje_id" value=<?php echo $_GET['shfaqje_id'];?>></td>
				<td colspan="2" align="center"><input type="submit" name="Edit" value="Edit" class="crudBtn"></td>
			</tr>
		</table>
	</form>
</body>
</html>