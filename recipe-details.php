<?php

/*
Template Name: Recipe Details Template
*/

if (!isset($_GET['p_id'])) {
  header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
  die;
}

// SESSION START
session_start();

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  // DATABASE CONNECT
  require 'connect.php';

  // POST COMMENT
  if (isset($_POST['submit-comment'])) {

    if (isset($_SESSION['u_id'])) {
      $u_id = $_SESSION['u_id'];
      $getname = mysqli_query($conn, "SELECT u_name,u_picture,u_id FROM users WHERE u_id=$u_id");
      while ($getname2 = mysqli_fetch_assoc($getname)) {
        if(empty($_POST["comment"]))
        {
          echo '<p class="text-danger">Comment is required</p>';
        }
        else {
          $comment_sender_name = $getname2['u_name'];
          $comment = $_POST["comment"];
          $parent_comment_id = $_POST['comment_id'];
          $comment_sender_picture = $getname2['u_picture'];
          $comment_sender_u_id = $getname2['u_id'];
          $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);
          $query = "INSERT INTO tbl_comment (p_id, parent_comment_id, comment, comment_sender_name, comment_sender_picture, comment_sender_u_id) VALUES ('$p_id', '$parent_comment_id', '$comment', '$comment_sender_name','$comment_sender_picture', '$comment_sender_u_id')";
          $result = mysqli_query($conn, $query);
        }
      }
    }
    else {

      if(empty($_POST["comment"]))
      {
        echo '<p class="text-danger">Comment is required</p>';
      }
      else
      {
        $comment = $_POST["comment"];
        $parent_comment_id = $_POST['comment_id'];
        $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);
        $query = "INSERT INTO tbl_comment (p_id, parent_comment_id, comment, comment_sender_name) VALUES ('$p_id', '$parent_comment_id', '$comment', '$comment_sender_name')";
        $result = mysqli_query($conn, $query);
      }
    }

  }

  // VIEWS COUNTER
  $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);
  $views = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_id = '$p_id'");
  while ($row = mysqli_fetch_assoc($views)) {
    $current_views = $row['views'];
    $new_view = $current_views + 1;
    $update_views = mysqli_query($conn, "UPDATE p_recipe SET `views` = $new_view WHERE p_id = '$p_id'");
  }


  // get ID
  $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);

  $countnum = "SELECT * FROM tbl_comment
  WHERE parent_comment_id = '0' AND p_id = '$p_id'
  ORDER BY comment_id DESC
  ";
  $result = mysqli_query($conn, $countnum);
  $count = mysqli_num_rows($result);

  // RATING
  $article = null;
  if (isset($_GET['p_id'])) {

    $p_id = mysqli_real_escape_string($conn, $_GET['p_id']);

    $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id'")->fetch_object();

    if (isset($_SESSION['u_id'])) {
      $u_id = $_SESSION['u_id'];
      $rated = $conn->query("SELECT rated_id FROM article_ratings WHERE article=$p_id AND rated_id=$u_id");
      $result3 = mysqli_fetch_assoc($rated);
      $a = $result3['rated_id'];
      $rating2 = $conn->query("SELECT rating FROM article_ratings WHERE article=$p_id AND rated_id=$u_id");
      $result = mysqli_fetch_assoc($rating2);
      $my_rating = $result['rating'];
    }
  }

  // RECIPE
  // create query
  $query = "SELECT * FROM p_recipe WHERE p_id='$p_id'";

  // get result
  $results = mysqli_query($conn, $query);

  // fetch data
  $post = mysqli_fetch_assoc($results);

  // free result
  mysqli_free_result($results);

  // TAGS
  $queryy = "SELECT p_tags FROM p_recipe WHERE p_id='$p_id'";

  // get result
  $results = mysqli_query($conn, $queryy);

  // fetch data
  $tags = mysqli_fetch_assoc($results);

  // free result
  mysqli_free_result($results);

  // SIDEBAR RECIPES
  require 'sidebar-recipes.php';

  // INGREDIENTS
  $querys = "SELECT
  p_ingredients,p_ingredients1,p_ingredients2,p_ingredients3,p_ingredients4,p_ingredients5,p_ingredients6,p_ingredients7,p_ingredients8,p_ingredients9,p_ingredients10,p_ingredients11,p_ingredients12,p_ingredients13,p_ingredients14,p_ingredients15,p_ingredients16,p_ingredients17,p_ingredients18,p_ingredients19,p_ingredients20,p_ingredients21,p_ingredients22,p_ingredients23,p_ingredients24,p_ingredients25,p_ingredients26,p_ingredients27,p_ingredients28,p_ingredients29,p_ingredients30,
  p_ingredients31,p_ingredients32,p_ingredients33,p_ingredients34,p_ingredients35,p_ingredients36,p_ingredients37,p_ingredients38,p_ingredients39,p_ingredients40,p_ingredients41,p_ingredients42,p_ingredients43,p_ingredients44,p_ingredients45,p_ingredients46,p_ingredients47,p_ingredients48,p_ingredients49,p_ingredients50 FROM ingredients WHERE id='$p_id'";

  $resulti = mysqli_query($conn, $querys);

  // fetch data
  $ingredients = mysqli_fetch_assoc($resulti);

  // free result
  mysqli_free_result($resulti);

  // STEPS IMAGES
  $sql = "SELECT image_upload1,image_upload2,image_upload3,image_upload4,image_upload5,image_upload6,image_upload7,image_upload8,image_upload9,image_upload10,image_upload11,image_upload12,image_upload13,image_upload14,image_upload15 FROM image WHERE id='$p_id'";

  $resulti = mysqli_query($conn, $sql);

  // fetch data
  $images = mysqli_fetch_assoc($resulti);

  // free result
  mysqli_free_result($resulti);

  // STEPS
  $sqly = "SELECT p_steps,p_steps1,p_steps2,p_steps3,p_steps4,p_steps5,p_steps6,p_steps7,p_steps8,p_steps9,p_steps10,p_steps11,p_steps12,p_steps13,p_steps14 FROM steps WHERE id='$p_id'";

  $resulti = mysqli_query($conn, $sqly);

  // fetch data
  $steps = mysqli_fetch_assoc($resulti);

  // free result
  mysqli_free_result($resulti);

  // EDIT COMMENT
  if (isset($_POST['update'])) {
    $query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '0'";
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
            if ($number == $number2) {
              $comment = $_POST['comment'];
              $sqli = "UPDATE tbl_comment SET comment='$comment' WHERE comment_sender_u_id='$u_id' AND comment_id='$number'";
              $result2 = mysqli_query($conn, $sqli);

            }
          }
        }
      }
    }
  }

  // EDIT COMMENT PARENT
  if (isset($_POST['update_parent'])) {
    $query = "SELECT * FROM tbl_comment WHERE parent_comment_id != ''";
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
            if ($number == $number2) {
              $comment = $_POST['comment'];
              $sqli = "UPDATE tbl_comment SET comment='$comment' WHERE comment_sender_u_id='$u_id' AND comment_id='$number'";
              $result2 = mysqli_query($conn, $sqli);

            }
          }
        }
      }
    }
  }

  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section -->

</section>

<!-- RECIPE DETAILS SECTION -->
<section id="recipe-details">
  <div class="container">
    <div class="row center-xs around-sm center-md start-lg" id="widh">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" id="main-padding">
        <!-- recipe title -->
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h3><?php echo $post['p_title'] ?></h3>
          </div>
          <hr>
        </div>
        <!-- /recipe title -->
        <!-- recipe image with info -->
        <div class="row center-xs start-sm center-md start-lg" id="image-time">
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" id="remove-padding">
            <?php
            echo '
            <img class="recipe-img" src="../wp-content/uploads/2018/04/'.$post['image_upload'].'" style="width: 100%;" /> ';
            ?>
          </div>
          <!-- recipe image with info for mobile -->
          <div class="row start-lg" id="prep">
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-4">
              <p style="text-align: left;">Prep Time: <?php echo $post['p_prepare']; ?>m</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-4">
              <p style="text-align: center;">Cook Time: <?php echo $post['p_cook']; ?>m</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-4">
              <p style="text-align: right;">Ready In: <?php echo $post['p_ready']; ?>m</p>
            </div>
          </div>
          <!-- /recipe image with info for mobile -->
          <div class="col-xs-8 col-sm-4 col-md-2 col-lg-2" style="padding-right: 0;">
            <div class="prep-time">
              <div class="prep-time2">
                <p style="font-weight:600; padding-bottom: 0;"><?php echo $post['p_yield']; ?></p><p style="font-family: 'Lato', sans-serif; font-size: 14px;">Yield</p>
                <hr>
                <p style="font-weight: 600;  padding-bottom: 0;"><?php echo $post['p_servings']; ?></p><p style="font-family: 'Lato', sans-serif; font-size: 14px;">Servings</p>
                <hr>
                <p style="font-weight: 600;  padding-bottom: 0;"><?php echo $post['p_prepare'] ?>m</p><p style="font-family: 'Lato', sans-serif; font-size: 14px;">Prep Time</p>
                <hr>
                <p style="font-weight: 600;  padding-bottom: 0;"><?php echo $post['p_cook'] ?>m</p><p style="font-family: 'Lato', sans-serif; font-size: 14px;">Cook Time</p>
                <hr>
                <p style="font-weight: 600;  padding-bottom: 0;"><?php echo $post['p_ready'] ?>m</p><p style="font-family: 'Lato', sans-serif; font-size: 14px;">Ready In</p>
              </div>
            </div>
          </div>
        </div>
        <!-- /recipe image with info -->
        <div class="submit-recipe-form">
          <form class="submit-form" action="submit-recipe.php" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px;">
            <!-- recipe info -->
            <div class="row center-xs start-sm start-md start-lg" id="select-row-lg">
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-left: 0;">
                <p>Cuisine: <b><?php echo $post['p_cuisine']; ?></b></p>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-left: 0;">
                <p style="text-align: left;">Course: <b><?php echo $post['p_course'];  ?></b></p>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-left: 0;">
                <p style="text-align: left;">Skill Level: <b><?php echo $post['p_skill'];  ?></b></p>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id="rating-img">
                <!-- recipe rating -->
                <?php if ($article): ?>
                  <p>
                    <?php
                    if (round($article->rating) == 0) {
                      echo '<img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">';
                    }
                    if (round($article->rating) == 1) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">';
                    }
                    if (round($article->rating) == 2) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">';
                    }
                    if (round($article->rating) == 3) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">';
                    }
                    if (round($article->rating) == 4) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="">';
                    }
                    if (round($article->rating) == 5) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="">';
                    }
                    ?>

                    &nbsp;&nbsp;(<?php echo round($article->rating); ?>/5)
                  </p>
                <?php endif; ?>
                <!-- /recipe rating -->
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="remove-padding">
                <hr>
              </div>
            </div>
            <!-- /recipe info -->
            <!-- recipe info for mobile -->
            <div class="row center-xs start-sm start-md start-lg" id="select-row-xs">
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <p>Cuisine: <b><?php echo $post['p_cuisine']; ?></b></p>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <p style="text-align: center;">Course: <b><?php echo $post['p_course'];  ?></b></p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <p style="text-align: center;">Skill Level: <b><?php echo $post['p_skill'];  ?></b></p>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" id="print" style="text-align: center;">
                  <?php
                  echo '<p>Rating: <b>'.round($article->rating).'/5</b></p>';
                  ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <hr>
              </div>
            </div>
            <!-- /recipe info for mobile -->
            <!-- short description -->
            <p class="font-light"><?php echo $post['p_short'] ?></p>
            <!-- /short description -->
            <!-- recipe ingredients -->
            <div class="mCustomScrollbar ingredents">
              <div class="ingredient">
                <h4>Ingredients</h4>
                <?php
                foreach ($ingredients as $ingredient){

                  if (empty($ingredient)) {
                    echo '<p class="font-light" style="display: none;">';
                  } else {
                    echo '<p class="font-light">'.$ingredient.'</p>';
                  }
                }?>
              </div>
            </div>
            <!-- /recipe ingredients -->
            <!-- recipe steps -->
            <div class="recipe-title-content">
              <div class="recipe-title">
                <h4>Step by Step Method</h4>
              </div>
              <hr style="margin-top: 34px;">
            </div>
            <?php
            $x = 0;
            $x++;
            $y= 0;
            $y++;
            foreach (array_combine($images, $steps) as $image => $step) {

              if (empty($image)) {
                echo '<img src="../wp-content/uploads/2018/04/'.$image.'" style="display:none;" />';
              } else {

                echo '<div id="wid2-lg" class="wid2 center-xs start-sm start-md start-lg">
                <div class="col-xs-8 col-sm-4 col-md-4 col-lg-3" style="padding-right: 0;">
                <div class="image-step">
                <img id="myImg" class="stepimg" src="../wp-content/uploads/2018/04/'.$image.'" onclick="openModal()" style="padding-right: 10px;" />
                </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-9" style="padding-right: 0;">
                <h4>Step '.$x++.'</h4>
                <p class="font-light">'.$step.'</p>
                </div>
                </div>
                <div id="wid2-xs" class="wid2 center-xs start-sm start-md start-lg">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" id="remove-padding">
                <div class="image-step">
                <img id="myImg" class="stepimg" src="../wp-content/uploads/2018/04/'.$image.'" alt="" onclick="openModal()" style="padding-right: 10px;">
                </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9" id="remove-padding">
                <h4>Step '.$y++.'</h4>
                <p class="font-light">'.$step.'</p>
                </div>
                </div>';
              }
            }
            ?>
            <!-- /recipe steps -->
          </form>
        </div>
        <hr style="margin: 0;">
        <div class="submit-recipe-form">
          <form class="submit-form" action="submit-recipe.php" method="post" enctype="multipart/form-data">
            <!-- recipe tags -->
            <div class="row center-xs center-sm start-lg start-md middle-xs middle-sm middle-md middle-lg" id="recipe-tags">
              <div class="col-xs-8 col-sm-1 col-md-1 col-lg-1" id="remove-padding">
                <h4>Tags:</h4>
              </div>
              <?php
              $tags = explode(",", $tags['p_tags']);
              foreach ($tags as $tag) {
                echo '

                <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2" id="tags-xs">
                <p>'.$tag.'</p>
                </div>
                ';
              } ?>
              <!-- /recipe tags -->
              <!-- rate recipe -->
              <div class="col-xs-8 col-sm-2 col-md-2 col-lg-2" id="rate-align">
                <?php
                if (isset($_SESSION['u_id'])) {
                  if ($a == 0) {
                    echo '<h2>Rate:</h2>';
                  } else {
                    echo '<h2>You Rated:</h2>';
                  }
                }
                ?>
              </div>
              <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3" id="rate-align">
                <?php
                if (isset($_SESSION['u_id'])) {
                  if ($a =='') {
                    foreach(range(1,5) as $rating){
                      echo '<a href="rate-recipe?recipe-details='.$article->p_id.'&rating='.$rating.'"><img src="../wp-content/uploads/2018/04/dish.png" alt="" title="'.$rating.'" style="width: 20px;"></a>';
                    }
                  }else {
                    if (($my_rating) == 1) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">';
                    }
                    if (($my_rating) == 2) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">';
                    }
                    if (($my_rating) == 3) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">';
                    }
                    if (($my_rating) == 4) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">';
                    }
                    if (($my_rating) == 5) {
                      echo '<img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                      <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">';
                    }
                  }
                }
                ?>
              </div>
            </div>
            <!-- /rate recipe -->
          </form>
        </div>
        <!-- recipe author -->
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h4>About Chef</h4>
          </div>
          <hr style="margin-top: 34px;">
        </div>
        <div class="wid3 center-xs start-sm start-md start-lg" id="about-chef-lg">
          <div class="col-xs-8 col-sm-4 col-md-4 col-lg-3" id="remove-padding">
            <?php echo '<img src="../wp-content/uploads/2018/04/'.$post['p_image'].'"/>'; ?>
          </div>
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-9" style="padding-right: 0; padding-left: 0; padding: 2px; background: #fff;">
            <div class="chef">
              <div class="chef-name">
                <h4><?php echo $post['p_author']; ?></h4>
                <hr>
              </div>
              <p class="font-light"><?php echo $post['p_about']; ?></p>
            </div>
          </div>
        </div>
        <!-- /recipe author -->
        <!-- recipe author for mobile -->
        <div class="wid3 center-xs start-sm start-md start-lg" id="about-chef-xs">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" id="remove-padding">
            <?php echo '<img src="../wp-content/uploads/2018/04/'.$post['p_image'].'"/>'; ?>
          </div>
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9" style="padding-right: 0; padding-left: 0; padding: 2px; background: #fff;">
            <div class="chef">
              <h4 style="margin-bottom: 10px; margin-top: 5px; text-transform: uppercase;"><?php echo $post['p_author']; ?></h4>
              <div class="col-xs-12 col-sm-8 col-md-2 col-lg-2" id="remove-padding">
                <hr style="margin-top: 0; border-top: 2px double #33C243; border-bottom:none; border-left: none; border-right: none;">
              </div>
              <p class="font-light"><?php echo $post['p_about']; ?></p>
            </div>
          </div>
        </div>
        <!-- /recipe author for mobile -->
        <!-- comment section -->
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h4>Comment ( <?php echo $count; ?> )</h4>
          </div>
          <hr style="margin-top: 34px;">
        </div>
        <?php require 'fetch-comment.php'; ?>
        <br>
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h4>Leave Comment</h4>
          </div>
          <hr style="margin-top: 34px;">
        </div>
        <div class="row center-xs start-sm start-md start-lg">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="remove-padding">
            <form method="post" class="comment_form">
              <?php if (!isset($_SESSION['u_id'])) {
                echo ' You must be logged in to comment';
              }
              else {
                echo '<input type="hidden" name="comment_sender_name" id="comment_sender_name" placeholder="Enter Name" />
                <textarea name="comment" id="comment" placeholder="Enter Comment" rows="5"></textarea>
                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                <button type="submit" name="submit-comment" id="submit" value="" style="margin-bottom: 15px;">Submit</button>';
              }?>
            </form>
          </div>
        </div>
        <!-- /comment section -->
      </div>

      <!-- SIDEBAR -->
      <?php
      define('sidebar', TRUE);
      require 'sidebar.php';
      ?>
      <!-- /SIDEBAR -->
    </div>
  </div>
</section>
<!-- RECIPE DETAILS SECTION -->

<?php the_content(); ?>


<?php endwhile;

else :
  echo '<p> No content found</p>';

endif;

get_footer();
?>
