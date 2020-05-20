<html>
<head>
    <title>Add Theatre</title>
    <link rel="stylesheet" type="text/css" href="adminStyle.css" />
    <script>
    </script>
</head>
<body>
    <br /><br />
    <form name="frm" method="post" action="add_teater.php">
        <table border="1" cellpadding="10" cellspacing="3" width="500" align="center">
            <tr>
                <td colspan="2" align="center">Add New Theatre</td>
            </tr>
            <tr>
                <td><label>Emer Teatri</label></td>
                <td> <input type="text"  name="teater_emer" placeholder="Emer Teatri" required="required"></td>
            </tr>
            <tr>
                <td> <label>Adrese</label></td>
                <td><input type="text"  name="adrese" placeholder="Adrese"></td>
            </tr>
            <tr>
                <td> <label>Email</label></td>
                <td><input type="email" name="email" placeholder="Email" required="required"></td>
            </tr>
            <tr>
                <td><label>Nr. Telefoni</label></td>
                <td><input type="tel" name="tel" placeholder="Nr telefoni" pattern="^(?=.*06[7-9]+.*)(?=.*[0-9]+.*)[0-9]{7,}$" required >
                <small>Format: 06X XXX XXXX</small></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Add" class="crudBtn"></td>
            </tr>
        </table>
    </form>
    
    <?php

    // Kontrollon nese jane derguar te dhenat e formes per tu vendosur ne tabele
    if(isset($_POST['submit'])) {
    $teater = $_POST['teater_emer'];
    $adrese = $_POST['adrese'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    

    // perfshin file qe ben lidhjen me databazen
    include_once("includes/dbcon.php");
   
    
    // shton te dhenat e shfaqjes ne tabele
    $result = mysqli_query($conn, "INSERT INTO teater(teater_emer, adrese, email, tel) VALUES('$teater','$adrese','$email','$tel')");
    if($result){
    echo"<p align='center'><font color=white>Teatri u shtua me sukses!</font></p>";
    }else{
    echo "<p align='center'><font color=red> Te dhenat nuk u shtuan.</font></p>";
    }

    echo "<p align='center'><a href='teaterCRUD.php' class='link' align='center'>View Theatres</a></p>";
}
    ?>
</body>
</html>