<?php

/*
Template Name: Confirm Registration Template
*/

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  // DATABASE CONNECT
  require 'connect.php';

  // SIDEBAR RECIPES
  require 'sidebar-recipes.php';

  $u_email= mysqli_real_escape_string($conn, $_GET['u_email']);
  $token = mysqli_real_escape_string($conn, $_GET['token']);

  $confim = mysqli_query($conn, "UPDATE users SET u_email_confirmed='1' WHERE u_email='$u_email' AND token='$token'");
  header("Refresh:2; url='http://localhost/wordpress/wordpress/login/'");

  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section-->

</section>

<?php if (is_page('confirm')): ?>
  <!-- CONFIRM SECTION -->
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg" id="widh">
      <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h3>User Registration Confirm</h3>
          </div>
          <hr>
        </div>
        <div class="submit-recipe-form">
          <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
            <p>You successfully confirmed your registration. Now you will be automatically redirect to login page!</p>
          </form>
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
  <!-- /CONFIRM SECTION -->

<?php endif; ?>

<?php the_content(); ?>

<?php endwhile;

else :
  echo '<p> No content found</p>';

endif;

get_footer();
?>
