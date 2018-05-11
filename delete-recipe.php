<?php

/*
Template Name: Delete Recipe Template
*/

require 'connect.php';

  $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);
  $query = "DELETE FROM article_ratings WHERE article='$p_id'";
  $result = mysqli_query($conn, $query);
  $query1 = "DELETE FROM tbl_comment WHERE p_id='$p_id'";
  $result1 = mysqli_query($conn, $query1);
  $query2 = "DELETE FROM p_recipe WHERE p_id='$p_id'";
  $result2 = mysqli_query($conn, $query2);
  $query3 = "DELETE FROM image WHERE id='$p_id'";
  $result3 = mysqli_query($conn, $query3);
  $query4 = "DELETE FROM steps WHERE id='$p_id'";
  $result4 = mysqli_query($conn, $query4);
  $query5 = "DELETE FROM ingredients WHERE id='$p_id'";
  $result5 = mysqli_query($conn, $query5);
  header("Refresh:0.5; url=http://localhost/wordpress/wordpress/my-recipes/");

 ?>
