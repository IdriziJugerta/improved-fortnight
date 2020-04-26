<?php
    if(!isset($_SESSION["username"]) && $_SESSION['loguar']!=true) {
        header("Location: login.php");
        exit();
    }
?>