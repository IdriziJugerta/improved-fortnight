<?php
// include database connection file
include_once("includes/dbcon.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['Edit']))
{
	$salle_id = $_POST['salle_id'];

	$t_id = $_POST['t_id'];
		$emer_salle = $_POST['emer_salle'];
		$seats = $_POST['seats'];
	// update user data
    $qry="SELECT * FROM teater WHERE teater_id=$t_id";
$result = mysqli_query($conn,$qry);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
	mysqli_query($conn, "UPDATE salle SET t_id='$t_id',emer_salle='$emer_salle',seats='$seats' WHERE salle_id=$salle_id");
    echo"Salla u shtua me sukses!";
}else{
    echo "Teatri nuk ekziston! Te dhenat nuk u shtuan.";
}
	// Redirect to homepage to display updated user in list
	header("Location: salle.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$salle_id = $_GET['salle_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM salle WHERE salle_id=$salle_id");

while($salle_data = mysqli_fetch_array($result))
{
	$t_id = $salle_data["t_id"];
	$emer_salle = $salle_data['emer_salle'];
    $seats = $salle_data['seats'];
}
?>
<html>
<head>
	<title>Edit te dhenat e salles</title>
<link rel="stylesheet" type="text/css" href="salleStyle.css" />
</head>

<body>
<p align='center'><a href="salle.php" class="link" align="center">Home</a></p>
	<br/><br/>

	<form name="frmShow" method="post" action="edit_salle.php" enctype="multipart/form-data">
		<table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
        <tr>
<td><label>TeaterId</label></td>
<td><input type = "number" name="t_id" class="form-control" placeholder="ID" value=<?php echo $t_id;?>></td>
</tr>
<tr>
<td><label>Emer Salle</label></td>
<td> <input type = "text" class="form-control" name="emer_salle" value=<?php echo $emer_salle;?>></td>
</tr>
<tr>
<td> <label>Seats</label></td>
<td><input type = "text" class="form-control" name="seats" placeholder="Seats" min="30" max="200" value=<?php echo $seats;?>></td>
</tr>
<tr>
				<td><input type="hidden" name="salle_id" value=<?php echo $_GET['salle_id'];?>></td>
				<td colspan="2" align="center"><input type="submit" name="Edit" value="Edit" class="crudBtn"></td>
			</tr>
		</table>
	</form>
</body>
</html>