<?php
    require_once 'check.php';
?>
<!DOCTYPE html>

<h1>welcome <?=$_SESSION['username'];?></h1>
<a href='profil.php?userId=<?=$_SESSION['userId'];?>'>
<img src="account.png">
</a>
</html>