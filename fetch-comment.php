<?php

/*
Template Name: Fetch Comment Template
*/
date_default_timezone_set('Europe/Belgrade');
$connect = new PDO('mysql:host=localhost;dbname=recipes', 'root', '');
$query = "SELECT * FROM tbl_comment
WHERE parent_comment_id = '0' AND p_id = '$p_id'
ORDER BY comment_id DESC
";
$output= '';
if (!isset($_SESSION['u_id'])) {
  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();
  $output = '';
}
function facebook_time_ago($timestamp)
{
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_difference = $current_time - $time_ago;
  $seconds = $time_difference;
  $minutes      = round($seconds / 60 );           // value 60 is seconds
  $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
  $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
  $weeks          = round($seconds / 604800);          // 7*24*60*60;
  $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
  $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
  if($seconds <= 60)
  {
    return "Just Now";
  }
  else if($minutes <=60)
  {
    if($minutes==1)
    {
      return "one minute ago";
    }
    else
    {
      return "$minutes minutes ago";
    }
  }
  else if($hours <=24)
  {
    if($hours==1)
    {
      return "an hour ago";
    }
    else
    {
      return "$hours hrs ago";
    }
  }
  else if($days <= 7)
  {
    if($days==1)
    {
      return "yesterday";
    }
    else
    {
      return "$days days ago";
    }
  }
  else if($weeks <= 4.3) //4.3 == 52/12
  {
    if($weeks==1)
    {
      return "a week ago";
    }
    else
    {
      return "$weeks weeks ago";
    }
  }
  else if($months <=12)
  {
    if($months==1)
    {
      return "a month ago";
    }
    else
    {
      return "$months months ago";
    }
  }
  else
  {
    if($years==1)
    {
      return "one year ago";
    }
    else
    {
      return "$years years ago";
    }
  }
}
// edit/delete as user
if (isset($_SESSION['u_id'])) {
  $result = $conn->query($query);
  while($results = mysqli_fetch_assoc($result)){
    $output = '';
    $u_id = $results['comment_sender_u_id'];
    $getname = "SELECT * FROM users WHERE u_id=$u_id";
    $result2 = mysqli_query($conn, $getname);
    if ($getname2 = mysqli_fetch_assoc($result2)) {
      if (isset($_SESSION['u_id'])) {
        if ($_SESSION['u_id'] == $getname2['u_id']) {
          $timeago = $results['date'];
          echo '<div class="row start-xs start-sm start-md start-lg" id="starter'.$results["comment_id"].'" style="margin-bottom: 30px;">
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="comment-xs" style="padding-left: 0;">
          <img src="../wp-content/uploads/2018/04/'.$results['comment_sender_picture'].'" style="width: 100px; height: 90px;"/>
          </div>
          <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="padding:0;">
          <div class="row start-xs start-sm start-md start-lg shadow-box" id="reply'.$results["comment_id"].'" style="background: #fff;">
          <p class="comment-name">'.$results["comment_sender_name"].'</p>
          <p class="comment-time">( '.facebook_time_ago($timeago).' )</p>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="comment'.$results["comment_id"].'">
          <p class="comment-comment" style="margin-top: 0;">'.$results["comment"].'</p>
          </div>
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" id="editremove'.$results["comment_id"].'" style="padding: 0;">
          <div class="panel-footer" align="right"><button type="button" class="btn-edit" id="'.$results["comment_id"].'">Edit</button></div>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="deleteremove'.$results["comment_id"].'" style="padding: 0;">
          <div class="panel-footer" align="right"><button type="submit" name="delete" class="btn-delete" id="'.$results["comment_id"].'">Delete</button></div>
          </div>
          </div>
          </div>
          </div>
          ';
          $output .= get_reply_comment($connect, $results["comment_id"]);
        }
        // /edit/delete as user
        // repy as user
        else {
          $timeago = $results['date'];
          echo '<div class="row start-xs start-sm start-md start-lg" style="margin-bottom: 30px;">
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="comment-xs" style="padding-left: 0;">
          <img src="../wp-content/uploads/2018/04/'.$results['comment_sender_picture'].'" style="width: 100px; height: 90px;"/>
          </div>
          <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="padding:0;">
          <div class="row start-xs start-sm start-md start-lg shadow-box" style="background: #fff;">
          <p class="comment-name">'.$results["comment_sender_name"].'</p>
          <p class="comment-time">( '.facebook_time_ago($timeago).' )</p>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p class="comment-comment" style="margin-top: 0;">'.$results["comment"].'</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
          <div class="panel-footer" align="right"><button type="button" class="btn-reply" id="'.$results["comment_id"].'">Reply</button></div>
          </div>
          </div>
          </div>
          </div>';
          $output .= get_reply_comment($connect, $results["comment_id"]);
        }
        // /reply as user
      }
    }
  }
}
// see comment as guest
else {
  foreach($result as $row)
  {
    $timeagorow = $row['date'];
    $output .= '
    <div class="row start-xs start-sm start-md start-lg" style="margin-bottom: 30px;">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="comment-xs" style="padding-left: 0;">
    <img src="../wp-content/uploads/2018/04/'.$row['comment_sender_picture'].'" style="width: 100px; height: 90px;"/>
    </div>
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="padding:0;">
    <div class="row start-xs start-sm start-md start-lg shadow-box" style="background: #fff;">
    <p class="comment-name">'.$row["comment_sender_name"].'</p>
    <p class="comment-time">( '.facebook_time_ago($timeagorow).' )</p>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <p class="comment-comment" style="margin-top: 0;">'.$row["comment"].'</p>
    </div>
    </div>
    </div>
    </div>';
    $output .= get_reply_comment($connect, $row["comment_id"]);
  }
}
// /see comment as guest

echo $output;
// edit parent comment
function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
  if (isset($_SESSION['u_id'])) {
    require 'connect.php';
    $query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'";
    $output = '';
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    if($parent_id == 0)
    {
      $marginleft = 0;
    }
    else
    {
      $marginleft = $marginleft + 48;
    }
    if($count > 0)
    {
      while($results = mysqli_fetch_assoc($result)){
        $u_id = $results['comment_sender_u_id'];
        $getname = "SELECT * FROM users WHERE u_id=$u_id";
        $result2 = mysqli_query($conn, $getname);
        if ($getname2 = mysqli_fetch_assoc($result2)) {
          if (isset($_SESSION['u_id'])) {
            if ($_SESSION['u_id'] == $getname2['u_id']) {
              $timeago = $results['date'];
              echo '<div class="row start-xs start-sm start-md start-lg" style="margin-bottom: 30px; margin-left:'.$marginleft.'px">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="comment-xs" style="padding-left: 0;">
              <img src="../wp-content/uploads/2018/04/'.$results['comment_sender_picture'].'" style="width: 100px; height: 90px;"/>
              </div>
              <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="padding:0;">
              <div class="row start-xs start-sm start-md start-lg shadow-box"  id="reply'.$results["comment_id"].'" style="background: #fff;">
              <p class="comment-name">'.$results["comment_sender_name"].'</p>
              <p class="comment-time">( '.facebook_time_ago($timeago).' )</p>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="comment'.$results["comment_id"].'">
              <p class="comment-comment" style="margin-top: 0;">'.$results["comment"].'</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="editremove'.$results["comment_id"].'" style="padding: 0;">
              <div class="panel-footer" align="right"><button type="button" class="btn-edit-parent" id="'.$results["comment_id"].'">Edit</button></div>
              </div>
              </div>
              </div>
              </div>';
              $output .= get_reply_comment($connect, $results["comment_id"], $marginleft);
            }
            // /edit parent comment
            // reply parent comment
            else {
              $timeago = $results['date'];
              echo '<div class="row start-xs start-sm start-md start-lg" style="margin-bottom: 30px; margin-left:'.$marginleft.'px">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="comment-xs" style="padding-left: 0;">
              <img src="../wp-content/uploads/2018/04/'.$results['comment_sender_picture'].'" style="width: 100px; height: 90px;"/>
              </div>
              <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="padding:0;">
              <div class="row start-xs start-sm start-md start-lg shadow-box" style="background: #fff;">
              <p class="comment-name">'.$results["comment_sender_name"].'</p>
              <p class="comment-time">( '.facebook_time_ago($timeago).' )</p>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <p class="comment-comment" style="margin-top: 0;">'.$results["comment"].'</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
              <div class="panel-footer" align="right"><button type="button" class="btn-reply" id="'.$results["comment_id"].'">Reply</button></div>
              </div>
              </div>
              </div>
              </div>';
              $output .= get_reply_comment($connect, $results["comment_id"], $marginleft);
            }
            // /reply parent comment
          }
        }
      }
    }
  }
  // see parent comment as guest
  else {
    $query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'";
    $output = '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if($parent_id == 0)
    {
      $marginleft = 0;
    }
    else
    {
      $marginleft = $marginleft + 48;
    }
    if($count > 0)
    {
      foreach($result as $row)
      {
        $timeagorow = $row['date'];
        $output .= '
        <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
        <div class="row start-xs start-sm start-md start-lg" style="margin-bottom: 30px;">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="comment-xs" style="padding-left: 0;">
        <img src="../wp-content/uploads/2018/04/'.$row['comment_sender_picture'].'" style="width: 100px; height: 90px;"/>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="padding:0;">
        <div class="row start-xs start-sm start-md start-lg shadow-box" style="background: #fff;">
        <p class="comment-name">'.$row["comment_sender_name"].'</p>
        <p class="comment-time">( '.facebook_time_ago($timeagorow).' )</p>
        <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
        <p class="comment-comment">'.$row["comment"].'</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        ';
        $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
      }
    }
  }
  // /see parent comment as guest
  return $output;
}

?>
