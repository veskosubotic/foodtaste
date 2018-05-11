<?php

/*
Template Name: Edit Parent Comment Template
*/

// START SESSION
session_start();

// DATABASE CONNECT
require 'connect.php';

// EDIT COMMENT PARENT
$query = "SELECT * FROM tbl_comment WHERE parent_comment_id!=''";
$result = mysqli_query($conn, $query);
while ($results = mysqli_fetch_assoc($result)){
  $u_id = $results['comment_sender_u_id'];
  $getname = "SELECT * FROM users WHERE u_id=$u_id";
  $result2 = mysqli_query($conn, $getname);
  if ($getname2 = mysqli_fetch_assoc($result2)) {
    if (isset($_SESSION['u_id'])) {
      if ($_SESSION['u_id'] == $getname2['u_id']) {
        $number = $_GET['number'];
        $number2 = $results['comment_id'];
        $parent_id = $results['parent_comment_id'];
        if ($number == $number2) {
          $query2 = "SELECT comment FROM tbl_comment WHERE parent_comment_id = '$parent_id' AND comment_sender_u_id='$u_id' AND comment_id='$number'";
          $result2 = mysqli_query($conn, $query2);
          $result3 = mysqli_fetch_assoc($result2);
          echo $result3['comment'];
        }
      }
    }
  }
}

?>
