<?php

/*
Template Name: Remove Newsletter Template
*/

require 'connect.php';

if (isset($_GET['email'])) {

  $email = mysqli_real_escape_string($conn, $_GET['email']);

  mysqli_query($conn, "DELETE FROM subscribers WHERE email='$email'");

  echo "You removed us from newsletter!";

  header("Refresh:1; url='http://localhost/wordpress/wordpress/'");
}

?>
