<?php
require_once 'includes/header.php';
require_once 'includes/dbcon.php';
    $id=$_GET['userId'];
    
    $sql="SELECT * FROM user WHERE userId='$id'";
    $rez=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    $row=mysqli_fetch_assoc($rez);

    
?>

<!DOCTYPE html>
<body>
    <h3>Edit Profile</h3>         
    <form action="editProfProcces.php" method="post" >
        Username : <input type="text" name="username" value=<?php echo $row['username'] ?> ><br>
        Emer :      <input type="text" name="emer" value=<?php echo $row['emer'] ?> ><br>
        Mbiemer : <input type="text" name="mbiemer" value=<?php echo $row['mbiemer'] ?> ><br>
        Tel: <input type="number" name="tel" value=<?php echo $row['telefon'] ?> ><br>
        Email : <input type="text" name="email" value=<?php echo $row['email'] ?> ><br>
        Password : <input type="text" name="password" value=<?php echo $row['userPass'] ?> ><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
</html> 