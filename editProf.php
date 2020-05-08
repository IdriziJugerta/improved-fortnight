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
    <?php
     if (isset($_GET['error'])){
        if (($_GET['error'])=="usernametaken") {
        echo'<p class="error">This username is taken.</p>';
        }
        if (($_GET['error'])=="invaliduname") {
         echo'<p class="error">Username must be between 4 and 10 characters (numbers or letters).</p>';
        }
        if (($_GET['error'])=="emailtaken") {
         echo'<p class="error">There is an account linked with this email.</p>';
        }
        if (($_GET['error'])=="invalidname") {
         echo'<p class="error">First Name must be between 2 and 20 characters (only letters).</p>';
        }
        if (($_GET['error'])=="invalidlname") {
         echo'<p class="error">Last Name must be between 2 and 20 characters (only letters).</p>';
        }
        if (($_GET['error'])=="invalidphone") {
        echo'<p class="error">Please enter a valid phone number.</p>';
        }
        if(($_GET['error'])=="nomatch"){
        echo'<p class="error">The password do not match.</p>';
        }
        if (($_GET['error'])=="invalidpsw") {
        echo'<p class="error">Password must contain at least 6 characters, at least one letter and one number.</p>';
        }
        if (($_GET['error'])=="wrongpsw") {
        echo'<p class="error">The old password you have entered is incorrect.</p>';
        }
        if (($_GET['error'])=="invalidemail") {
        echo'<p class="error">Please enter a valid email.</p>';
       }
    }  
 ?>     
    <form action="editProfProcces.php" method="post" >
        Username : <input type="text" name="username"><br>
        First Name :   <input type="text" name="emer"><br>
        Last Name : <input type="text" name="mbiemer"><br>
        Phone number: <input type="number" name="tel"><br>
        Email : <input type="email" name="email" ><br>
        <input type="submit" name="submit" value="Submit">

        <form action="editProfProcces.php" method="post" >
        <h3>Change password</h3>
        Old password : <input type="password" name="oldpsw"><br>
        New password: <input type="password" name="newpsw"><br>
        Repeat new password : <input type="password" name="rep"><br>
        <input type="submit" name="change" value="Change">

    </form>
    </body>
</html> 