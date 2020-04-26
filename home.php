<?php
session_start();
?>
<!DOCTYPE html>
<body>

<?php 
    if(isset($_SESSION['userId'])){
        echo"<h1>welcome ".$_SESSION['username']."</h1>
        <a href='profil.php?userId=".$_SESSION['userId']."'>
        <img src='account.png'>
        </a>";
        
    } 
?>
    <form action="search.php" method="get" >
    <input type="text" name="srch" placeholder="Search">
    <input type="submit" name="dergo" value="Kerko">
    </form>
    <?php 
    if(isset($_SESSION['userId'])){
        echo"<a href='logout.php'>LogOut</a> 
        <a href='shfaqjet.php'>Shfaqje</a>";
        
    } else {
    echo' <a href="login.php">LogIN</a>  
    <a href="regjistrim.php">Sign Up</a>
    <a href="shfaqjet.php">Shfaqje</a>';
    }
?>
</body>
</html>