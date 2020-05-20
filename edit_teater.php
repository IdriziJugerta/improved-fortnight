<?php
include_once("includes/dbcon.php");
// Kontrollon nese forma me te dhenat e update-uara eshte derguar
if(isset($_POST['Edit']))
{
	$teater_id = $_POST['teater_id'];

		$teater = $_POST['teater_emer'];
		$adrese = $_POST['adrese'];
        $email= $_POST['email'];
        $tel = $_POST['tel'];


    // update-on te dhenat e teatrit ne tabele bazuar ne id
	$result = mysqli_query($conn, "UPDATE teater SET teater_emer='$teater',adrese='$adrese',email='$email',tel='$tel' WHERE teater_id=$teater_id");
    echo"Teatri u shtua me sukses!";

	// kthene ne faqen me te dhenat e update-uara
	header("Location: teaterCRUD.php");
}
?>
<?php
//shfaq te dhenat bazuar ne id
//merr id e teatrit
$teater_id = $_GET['teater_id'];

// merr te dhenat e teatrit ne baze te id
$result = mysqli_query($conn, "SELECT * FROM teater WHERE teater_id=$teater_id");

while($teater_data = mysqli_fetch_array($result))
{
	$teater = $teater_data['teater_emer'];
    $adrese = $teater_data['adrese'];
    $email = $teater_data['email'];
    $tel = $teater_data['tel'];
   
}
?>
<html>
<head>
    <title>Edit Theatre Data</title>
    <link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>

<body>
    <p align='center'><a href="teaterCRUD.php" class="link" align="center">Home</a></p>
    <br /><br />

    <form name="frm" method="post" action="edit_teater.php" >
        <table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
         
            <tr>
                <td><label>Emer Teatri</label></td>
                <td> <input type="text" name="teater_emer" placeholder="Emer Teatri" value=<?php echo $teater;?>></td>
            </tr>
            <tr>
                <td> <label>Adrese</label></td>
                <td><input type="text" name="adrese" placeholder="Adrese" value=<?php echo $adrese;?>></td>
            </tr>
            <tr>
                <td> <label>Email</label></td>
                <td><input type="email" name="email" placeholder="Email" value=<?php echo $email;?>></td>
            </tr>
            <tr>
                <td><label>Nr. Telefoni</label></td>
                <td><input type="number" name="tel" placeholder="Nr telefoni"  pattern="^(?=.*06[7-9]+.*)(?=.*[0-9]+.*)[0-9]{7,}$" value=<?php echo $tel;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="teater_id" value=<?php echo $_GET['teater_id'];?>></td>
                <td colspan="2" align="center"><input type="submit" name="Edit" value="Edit" class="crudBtn"></td>
        </table>
    </form>
</body>
</html>