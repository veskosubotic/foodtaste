<?php

/*
Template Name: Logout Template
*/

// DATABASE CONNECT
require 'connect.php';

// START SESSION
session_start();

// DESTROY SESSION
session_destroy();

if(isset($_SERVER['HTTP_REFERER'])) {
  header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
  header('Location: http://localhost/wordpress/wordpress/');
}
exit();


?>
