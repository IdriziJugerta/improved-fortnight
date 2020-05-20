<html>
<head>
    <title>Add Showtime</title>
    <link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>
<body>
    <br /><br />
    <form name="frm" method="post" action="add_orar.php">
        <table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
            <tr>
                <td colspan="2" align="center">Add New Showtime</td>
            </tr>
            <tr>
                <td><label>Id Salle</label></td>
                <td> <input type="number" name="idSalle" placeholder="Id Salle"></td>
            </tr>
            <tr>
                <td> <label>Id Shfaqje</label></td>
                <td><input type="number" name="idShfaq" placeholder="Id Shfaqje"></td>
            </tr>
            <tr>
                <td> <label>Ore Fillimi</label></td>
                <td><input type="time" name="ora_fillimi" placeholder="Ore fillimi"></td>
            </tr>
            <tr>
                <td><label>Date shfaqe</label></td>
                <td><input type="date" name="date_shfaqje" placeholder="Date Shfaqje" required="required"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Add" class="crudBtn"></td>
            </tr>
        </table>
    </form>

    <?php

    // Kontrollon nese jane derguar te dhenat e formes per tu vendosur ne tabele
    if(isset($_POST['submit'])) {
    $idSalle = $_POST['idSalle'];
    $idShfaqe = $_POST['idShfaq'];
    $ore = $_POST['ora_fillimi'];
    $date = $_POST['date_shfaqje'];

    // perfshin file qe ben lidhjen me databazen
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
    echo "<p align='center'><a href='orarCRUD.php' class='link' align='center'>View Orar</a></p>";
    }
    ?>
</body>
</html>