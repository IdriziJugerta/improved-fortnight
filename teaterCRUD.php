<?php
//perfshin file qe ben lidhjen me databazen
include_once("includes/dbcon.php");
//merr te dhenat e teatrit nga databaza
$sql = "SELECT * FROM teater ORDER BY teater_id DESC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<html>
<head>
    <title>Theatres</title>
    <link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>
<body>
    </br>
    </br>
    <a href='admin.php' class='link' align='center'>Admin Page</a>
    <form name="frm" method="post" action="">
        <table border="1" cellpadding="10" cellspacing="3" width="500" align="center" style="padding-top:25px;">
            <tr>
                <th>ID Teatri</th>
                <th>Emer Teatri</th>
                <th>Adrese</th>
                <th>Email</th>
                <th>Nr Telefoni</th>
                <th>CRUD Actions</th>
            </tr>
            <?php
            while($teater_data = mysqli_fetch_array($result)) {
            echo "
            <tr>
                ";
                echo "
                <td>".$teater_data["teater_id"]."</td>";
                echo "
                <td>".$teater_data["teater_emer"]."</td>";
                echo "
                <td>".$teater_data["adrese"]."</td>";
                echo "
                <td>".$teater_data["email"]."</td>";
                echo  "
                <td>".$teater_data["tel"]."</td>";
                echo "
                <td><a href='edit_teater.php?teater_id=$teater_data[teater_id]' class='link'>Edit</a> | <a href='delete_teater.php?teater_id=$teater_data[teater_id]' class='link'>Delete</a></td>
            </tr>";

            }
            ?>

        </table>
        <div align="center" style="padding-top:25px;"><a href="add_teater.php" class="link"> Shto teater</a></div>
    </form>
</body>
</html>
