<?php
//perfshin file qe ben lidhjen me databazen
include_once("includes/dbcon.php");
//merr te dhenat e teatrit nga databaza
$sql = "SELECT * FROM orar ORDER BY idOrar DESC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<html>
<head>
    <title>Orar</title>
    <link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>
<body>
    </br>
    </br>
    <a href='admin.php' class='link' align='center'>Admin Page</a>
    <form name="frm" method="post" action="">
        <table border="1" cellpadding="10" cellspacing="3" width="500" align="center" style="padding-top:25px;">
            <tr>
                <th>Id Salle</th>
                <th>Id Shfaqe</th>
                <th>Orar fillimi</th>
                <th>Date shfaqje</th>
                <th>CRUD Actions</th>
            </tr>
            <?php
            while($orar_data = mysqli_fetch_array($result)) {
            echo "
            <tr>
                ";
                echo "
                <td>".$orar_data["idSalle"]."</td>";
                echo "
                <td>".$orar_data["idShfaq"]."</td>";
                echo "
                <td>".$orar_data["ora_fillimi"]."</td>";
                echo  "
                <td>".$orar_data["date_shfaqje"]."</td>";
                echo "
                <td><a href='edit_orar.php?idOrar=$orar_data[idOrar]' class='link'>Edit</a> | <a href='delete_orar.php?idOrar=$orar_data[idOrar]' class='link'>Delete</a></td>
            </tr>";

            }
            ?>

        </table>
        <div align="center" style="padding-top:25px;"><a href="add_orar.php" class="link"> Shto Orar</a></div>
    </form>
    
</body>
</html>