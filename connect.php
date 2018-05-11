<?php
// DATABASE CONNECT
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'recipes';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error($conn));
 ?>
