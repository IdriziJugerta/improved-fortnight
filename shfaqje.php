
<?php
//perfshin file qe ben lidhjen me databazen
include_once("includes/dbcon.php");
//merr te dhenat e shfaqes nga databaza
$sql = "SELECT * FROM shfaqje ORDER BY shfaqje_id DESC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<html>
<head>
<title>Shows</title>
<link rel="stylesheet" type="text/css" href="adminStyle.css" />
</head>
<body>
</br>
</br>
<a href='admin.php' class='link' align='center'>Admin Page</a>
<form name="frmShow" method="post" action="">
<table border="1" cellpadding="10" cellspacing="3" width="500" align="center" style="padding-top:25px;">
<tr>
<th>salleId</th>
<th>Emer Shfaqje</th>
<th>Cast</th>
<th>Pershkrim</th>
<th>Image</th>
<th>Zhaner</th>
<th>CRUD Actions</th>
</tr>
<?php
while($show_data = mysqli_fetch_array($result)) {
     echo "<tr>";
     echo "<td>".$show_data["salleId"]."</td>";
     echo "<td>".$show_data["shfaqje_emer"]."</td>";
     echo "<td>".$show_data["cast"]."</td>";
     echo "<td>".$show_data["pershkrim"]."</td>";
     echo  "<td><img src='images/".$show_data["image"]."' width='150px' height='100px' ></td>";
     echo "<td>".$show_data["zhaner"]."</td>";
     echo "<td ><a href='edit_show.php?shfaqje_id=$show_data[shfaqje_id]' class='link' >Edit</a> | <a href='delete_show.php?shfaqje_id=$show_data[shfaqje_id]' class='link' >Delete</a></td></tr>";

     }
?>

</table>
<div align="center" style="padding-top:25px;"><a href="add_show.php" class="link"> Add Show</a></div>
</form>
</div>
</body></html>
