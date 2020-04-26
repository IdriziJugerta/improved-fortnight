<?php 
$host="localhost";
$username="root";
$password="";
$db_name="projekt_web";
//krijojme lidhjen me databazen dhe e kontrollojme per gabime
$conn = new mysqli($host, $username, $password,$db_name) or die (mysql_error($conn));

?>