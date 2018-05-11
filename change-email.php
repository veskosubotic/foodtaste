<?php

/*
Template Name: Change Email Template
*/

// START SESSION
session_start();

// DATABASE CONNECT
require 'connect.php';

$u_id = $_SESSION['u_id'];
$query = "SELECT u_email FROM users WHERE u_id=$u_id";
$result = mysqli_query($conn, $query);
$result2 = mysqli_fetch_assoc($result);
echo $result2['u_email'];
 ?>
