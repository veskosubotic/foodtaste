<?php

/*
Template Name: Rate Recipe Template
*/

// START SESSION
session_start();

// DATABASE CONNTECT
require 'connect.php';

// RATING SYSTEM
if (isset($_GET['recipe-details'], $_GET['rating'])) {

  $article = (int)$_GET['recipe-details'];
  $rating = (int)$_GET['rating'];
  $rated_id = $_SESSION['u_id'];

  if (in_array($rating, [1, 2, 3, 4, 5])) {
    $exists = $conn->query("SELECT p_id FROM p_recipe WHERE p_id = '$article'")->num_rows ? true: false;

    if ($exists) {
      $conn->query("INSERT INTO article_ratings(article, rating, rated_id) VALUES ('$article', '$rating','$rated_id')");
    }
  }
  header('Location: recipe-details?p_id=' . $article);
}

// /RATING SISTEM
?>
