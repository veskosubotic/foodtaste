<?php

/*
Template Name: Submit Recipe Templat
*/

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  // DATABASE CONNECT
  require 'connect.php';

  // SIDEBAR RECIPES
  require 'sidebar-recipes.php';

  // SUBMIT RECIPE BUTTON
  if (isset($_POST['submit-your-recipe'])) {

    require 'insert.php';

  }

  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section-->
</section>

<!-- SUBMIT RECIPE SECTION -->
<section id="recipe-submit">
  <div class="container">
    <div class="cont">
      <div class="row center-xs center-sm start-md start-lg" id="widh">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <!-- page subtitle -->
          <div class="recipe-title-content">
            <div class="recipe-title">
              <h3>Submit Your Recipe</h3>
            </div>
            <hr>
          </div>
          <!-- page description -->
          <p class="font-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <!-- /page description -->
          <!-- submit recipe form -->
          <?php
          if (isset($_SESSION['u_id'])) {
            define('submit-recipe-form', TRUE);
            require 'submit-recipe-form.php';
          } else {
            echo "<b>You need to be logged in to submit recipe!</b>";
          }
          ?>
          <!-- /submit recipe form -->
        </div>
        <!-- SIDEBAR -->
        <?php
        define('sidebar', TRUE);
        require 'sidebar.php';
        ?>
        <!-- /SIDEBAR -->
      </div>
    </div>
  </div>
</section>
<!-- /SUBMIT RECIPE SECTION -->

<?php the_content(); ?>

<?php endwhile;

else :
  echo '<p> No content found</p>';

endif;

get_footer();
?>
