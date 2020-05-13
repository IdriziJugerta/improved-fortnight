<?php 
$host="127.0.0.1";
$username="root";
$password="";
$db_name="projekt_web";
//krijojme lidhjen me databazen dhe e kontrollojme per gabime
$conn = new mysqli($host, $username, $password,$db_name,'3307') or die (mysql_error($conn));

?> 
