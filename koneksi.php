<?php 
$databaseHost = 'localhost';
$databaseName = 'mekadoo';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli_connect = mysqli_connect($databaseHost,$databaseUsername,$databasePassword);
mysqli_select_db($mysqli_connect,$databaseName);
?>