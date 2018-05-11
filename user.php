<?php

/*
Template Name: User Page
*/

session_start();

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  // DATABASE CONNECT
  require 'connect.php';

  // SIDEBAR RECIPES
  require 'sidebar-recipes.php';

  if (isset($_SESSION['u_id'])) {

    $u_id = $_SESSION['u_id'];
    $getname = mysqli_query($conn, "SELECT * FROM users WHERE u_id=$u_id");
    $getname2 = mysqli_fetch_assoc($getname);
    $pic = $getname2['u_picture'];
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
  } else {
    header('Location: recent-recipes');
  }

  if (isset($_POST['update-user-name'])) {
    $user_name_user = $_POST['user_user_name'];
    $sqli = "UPDATE users SET u_name='$user_name_user' WHERE u_id=$u_id";
    $result2 = mysqli_query($conn, $sqli);
  }

  if (isset($_POST['update-user-about'])) {
    $user_about_user = $_POST['user_user_about'];
    $sqli = "UPDATE users SET u_about='$user_about_user' WHERE u_id=$u_id";
    $result2 = mysqli_query($conn, $sqli);
  }

  if (isset($_POST['update-user-email'])) {
    $user_email_user = $_POST['user_user_email'];
    $sqli = "UPDATE users SET u_email='$user_email_user' WHERE u_id=$u_id";
    $result2 = mysqli_query($conn, $sqli);
  }

  if (isset($_POST['update-user-password'])) {
    $user_password_user = $_POST['user_user_password'];
    $sqli = "UPDATE users SET u_password='$user_password_user' WHERE u_id=$u_id";
    $result2 = mysqli_query($conn, $sqli);
  }

  if (isset($_POST['update-user-picture'])) {
    if (isset($_FILES['u_picture']['name']) && ($_FILES['u_picture']['name'] !="")) {
      $size = $_FILES['u_picture']['size'];
      $temp = $_FILES['u_picture']['tmp_name'];
      $type = $_FILES['u_picture']['type'];
      $profile_name = $_FILES['u_picture']['name'];
      $img_name = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$img_name");
    }
    else {
      $img_name = $pic;
    }

    $update = mysqli_query($conn, "UPDATE users JOIN p_recipe ON (users.u_name = p_recipe.p_author) SET users.u_picture='$img_name', p_recipe.p_image='$img_name' WHERE users.u_id=$u_id");


    header( "Refresh:0.5;");



  }

  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section-->

</section>

<!-- USER INFO SECTION -->
<section id="recipe-details">
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg" id="widh">
      <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h3>User Profile</h3>
          </div>
          <hr>
        </div>
        <div class="" id="user-info">
          <div class="submit-form" style="padding-top: 20px; padding-bottom: 30px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="user-user-picture">
              <label>Your Picture</label>
              <?php echo '
              <img src="../wp-content/uploads/2018/04/'.$getname2['u_picture'].'" class="user-user-picture" style="width:100%;"/>
              '; ?>
              <button type="button" name="button" id="update-user-image" class="btn-change-picture">Change</button>
              <form id="user-image" class="user-info-form" method="post" enctype="multipart/form-data">
                <div id="step-image-upload" style="width: 90%; margin-top: 20px;"><label style="font-weight: 300; padding-left: 5px; padding-top: 5px;" for="change-content3"><span id="label-spannn">
                  Select User Image</span></label>
                  <input type="file" name="u_picture" id="change-content3" value=""></div><button type="submit" name="update-user-picture">Update</button></form>
                </div>
                <label>Your Name</label>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="user-user-name">
                  <p class="user-user-name"><?php echo $getname2['u_name']; ?><button type="button" name="button" class="btn-change-user-name">Change</button></p>
                </div>
                <label>About You</label>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="user-about-you">
                  <p class="user-about-you"><?php echo $getname2['u_about']; ?><button type="button" name="button" class="btn-change-about-you">Change</button></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="user-email">
                  <label>Your Email</label>
                  <p class="user-email"><?php echo $getname2['u_email']; ?><button type="button" name="button" class="btn-change-email">Change</button></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="user-password">
                  <label>Your Password</label>
                  <p class="user-password"><?php echo $getname2['u_password']; ?><button type="button" name="button" class="btn-change-password">Change</button></p>
                </div>
              </div>
            </div>
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
    <!-- /USER INFO SECTION -->

    <?php the_content(); ?>

  <?php endwhile;

  else :
    echo '<p> No content found</p>';

  endif;

  get_footer();
  ?>
