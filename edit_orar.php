<?php
// include database connection file
include_once("includes/dbcon.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['Edit']))
{
	$orar_id = $_POST['idOrar'];

    $idSalle = $_POST['idSalle'];
    $idShfaqe = $_POST['idShfaq'];
    $ore = $_POST['ora_fillimi'];
    $date = $_POST['date_shfaqje'];
	// update user data
    include_once("includes/dbcon.php");

$sql1="SELECT * FROM salle WHERE salle_id='$idSalle'";

if(mysqli_query($conn,$sql1))
{
$sql2 = "SELECT * FROM shfaqje WHERE shfaqje_id='$idShfaqe'";

if (mysqli_query ($conn,$sql2)) 
{
$sql3="INSERT INTO orar(idSalle, idShfaq, ora_fillimi, date_shfaqje) VALUES('$idSalle','$idShfaqe','$ore','$date')";
}
if (mysqli_query($conn,$sql3))
{
    // Success
}
else 
{
    die('Error on query 2: ' . mysqli_error($conn));
}
}
    
	// Redirect to homepage to display updated user in list
	header("Location: orarCRUD.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$orar_id = $_GET['idOrar'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM orar WHERE idOrar=$orar_id");

while($orar_data = mysqli_fetch_array($result))
{
	$idSalle = $orar_data["idSalle"];
	$idShfaqe = $orar_data['idShfaq'];
    $ore = $orar_data['ora_fillimi'];
    $date = $orar_data['date_shfaqje'];

}
?>
<html>
<head>
	<title>Edit te dhenat e orarit</title>
<link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>

<body>
<p align='center'><a href="orarCRUD.php" class="link" align="center">Home</a></p>
	<br/><br/>

	<form name="frmShow" method="post" action="edit_orar.php" enctype="multipart/form-data">
		<table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
        <tr>
                <td><label>Id Salle</label></td>
                <td> <input type="number" name="idSalle" placeholder="Id Salle" value=<?php echo $idSalle;?>></td>
            </tr>
            <tr>
                <td> <label>Id Shfaqje</label></td>
                <td><input type="number" name="idShfaq" placeholder="Id Shfaqje" value=<?php echo $idShfaqe;?>></td>
            </tr>
            <tr>
                <td> <label>Ore Fillimi</label></td>
                <td><input type="time" name="ora_fillimi" placeholder="Ore fillimi" value=<?php echo $ore;?>></td>
            </tr>
            <tr>
                <td><label>Date shfaqe</label></td>
                <td><input type="date" name="date_shfaqje" placeholder="Date Shfaqje" value=<?php echo $date;?>></td>
            </tr>
<tr>
				<td><input type="hidden" name="orar_id" value=<?php echo $_GET['idOrar'];?>></td>
				<td colspan="2" align="center"><input type="submit" name="Edit" value="Edit" class="crudBtn"></td>
			</tr>
		</table>
	</form>
</body>
</html>