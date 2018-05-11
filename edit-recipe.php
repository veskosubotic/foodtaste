<?php

/*
Template Name: Edit Recipe Template
*/

// SESSION START
session_start();

// DATABASE CONNECT
require 'connect.php';

// SIDEBAR RECIPES
require 'sidebar-recipes.php';

define('edit-recipe-load', TRUE);
require 'edit-recipe-load.php';

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();
  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section -->

</section>

<!-- EDIT RECIPE SECTION -->
<section id="recipe-submit">
  <div class="container">
    <div class="cont">
      <div class="row center-xs center-sm start-md start-lg" id="widh">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <!-- page subtitle -->
          <div class="recipe-title-content">
            <div class="recipe-title">
              <h3>Edit Your Recipe</h3>
            </div>
            <hr>
          </div>
          <!-- page description -->
          <p class="font-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <!-- /page description -->
          <!-- edit recipe form -->
          <div class="submit-recipe-form">
            <?php
            foreach ($edit_p_recipes as $edit_p_recipe) {
              echo'
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
              <input type="hidden" name="p_author" value="'.$edit_p_recipe['p_author'].'">
              <label>Recipe Title</label><br>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
              <textarea id="p_title" name="p_title" value="">'.$edit_p_recipe['p_title'].'</textarea>
              </div>
              <button type="submit" name="update_title">Update</button>
              </form>
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <label>Short Description</label><br>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
              <textarea id="p_short" name="p_short">'.$edit_p_recipe['p_short'].'</textarea>
              </div>
              <button type="submit" name="update_short">Update</button>
              </form>
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <label>Recipe Image</label>
              <div class="upload">
              <label style="position: absolute; left: 0; right: 0; bottom: 70px;" for="file"><span id="label-span">'.$edit_p_recipe['image_upload'].'</span></label><br>
              <label style="position: absolute; left:0; right: 0; bottom: 40px; font-weight: 300;" for="file"><span id="label-span">Upload Recipe Image</span></label><br>
              <input type="file" name="image_upload" id="file" value="">
              </div>
              <button type="submit" style="margin-bottom: 20px;" name="update_image">Update</button>
              </form>
              ';
            }
            ?>
            <div class="txt">
              <form class="" id="submit-form" method="post">
                <label>Ingredients</label>
              </form>
              <div class="row center-xs start-sm start-md start-lg">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
                  <?php
                  $i=0;
                  $x='';
                  $x++;
                  foreach ($edit_p_recipe_ingredients as $edit_p_recipe_ingredient) {
                    if (empty($edit_p_recipe_ingredient)) {
                      echo '<textarea class="ingredient-step" name="p_ingredients" value="" style="display: none;"></textarea>';
                    } else if($i > 0){
                      echo '
                      <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
                      <textarea class="ingredient-step" name="p_ingredients'.$x++.'" value="">'.$edit_p_recipe_ingredient.'</textarea>
                      <button type="submit" name="update_ingredients'.$i++.'">Update</button>
                      </form>
                      ';
                    }
                    else {
                      echo '
                      <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
                      <textarea class="ingredient-step" name="p_ingredients" value="">'.$edit_p_recipe_ingredient.'</textarea>
                      <button type="submit" name="update_ingredients">Update</button>
                      </form>
                      ';
                    }
                    $i++;
                  }
                  ?>
                </div>
              </div>
            </div>
            <?php
            $b=1;
            $b++;
            $y=1;
            $y++;
            $i=0;
            $x='';
            $x++;
            $z=1;
            $z++;
            $f=1;
            $f++;
            foreach ($edit_p_recipe_steps as $edit_p_recipe_step) {
              if (empty($edit_p_recipe_step)) {
                echo '<textarea class="ingredient-step" name="p_steps" id="txta" style="display: none;"></textarea>';
              } else if($i > 0){
                echo '
                <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
                <label>Step '.$y++.'</label><br>
                <div class="txta">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
                <textarea class="ingredient-step" name="p_steps'.$x++.'" id="txta">'.$edit_p_recipe_step.'</textarea>
                <button type="submit" name="update_step'.$i++.'">Update</button>
                </div>
                </div>
                </form>
                <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
                <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5" id="step-image-upload">
                <label style="font-weight: 300;" for="upload-step-image-input"><span id="label-spann">'.$edit_p_recipe_images['image_upload'.$f++.''].'</span></label>
                <input type="file" name="image_upload'.$b++.'" value="" id="upload-step-image-input">
                </div>
                <button type="submit" name="update_step_image'.$z++.'">Update</button>
                </form>
                ';
              }
              else {
                echo '
                <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
                <label>Step 1</label><br>
                <div class="txta">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
                <textarea class="ingredient-step" name="p_steps" id="txta">'.$edit_p_recipe_step.'</textarea>
                <button type="submit" name="update_step">Update</button>
                </div>
                </div>
                </form>
                <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
                <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5" id="step-image-upload">
                <label style="font-weight: 300;" for="upload-step-image-input"><span id="label-spann">'.$edit_p_recipe_images['image_upload1'].'</span></label>
                <input type="file" name="image_upload1" value="" id="upload-step-image-input">
                </div>
                <button type="submit" name="update_step_image1">Update</button>
                </form>';
              }
              $i++;
            }
            ?>

            <?php
            foreach ($edit_p_recipes as $edit_p_recipe) {
              echo '
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="servings">
              <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="left-padding">
              <label>Yield</label><br>
              <textarea name="p_yield" value="">'.$edit_p_recipe['p_yield'].'</textarea>
              </div>
              <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="right-padding">
              <label>Servings</label>
              <textarea name="p_servings" value="">'.$edit_p_recipe['p_servings'].'</textarea>
              </div>
              </div>
              <button type="submit" name="update_yield_servings">Update</button>
              </form>
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="time">
              <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3">
              <label>Preparation Time</label>
              <textarea name="p_prepare" value="">'.$edit_p_recipe['p_prepare'].'</textarea>
              </div>
              <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3">
              <label>Cook Time</label>
              <textarea name="p_cook" value="">'.$edit_p_recipe['p_cook'].'</textarea>
              </div>
              <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3">
              <label>Ready In</label><br>
              <textarea name="p_ready" value="">'.$edit_p_recipe['p_ready'].'</textarea>
              </div>
              </div>
              <button type="submit" name="update_time">Update</button>
              </form>
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <label>Tags</label><br>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
              <textarea id="tags" name="p_tags" value="" onkeyup="checkWordLen(this);">'.$edit_p_recipe['p_tags'].'</textarea>
              </div>
              <button type="submit" name="update_tags">Update</button>
              </form>
              <form class="" id="submit-form" action="?p_id='.$p_id.'" method="post" enctype="multipart/form-data"><br>
              <div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="select">
              <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="left-padding">
              <label>Cuisine</label><br>
              <select class="basic" name="p_cuisine">
              <option value="'.$edit_p_recipe['p_cuisine'].'">'.$edit_p_recipe['p_cuisine'].'</option>
              <option value="Italian">Italian</option>
              <option value="Mexican">Mexican</option>
              <option value="Greek">Greek</option>
              <option value="Chinese">Chinese</option>
              <option value="Balcanian">Balcanian</option>
              <option value="Other">Other</option>
              </select>
              </div>
              <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="right-padding">
              <label>Course</label><br>
              <select class="basic" name="p_course">
              <option value="'.$edit_p_recipe['p_course'].'">'.$edit_p_recipe['p_course'].'</option>
              <option value="MainCourse">Main Course</option>
              <option value="SideDish">Side Dish</option>
              <option value="Soup">Soup</option>
              <option value="Salad">Salad</option>
              <option value="Dessert">Dessert</option>
              <option value="Other">Other</option>
              </select>
              </div>
              </div>
              <div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="select">
              <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="left-padding">
              <label>Skill Level</label><br>
              <select class="basic" name="p_skill">
              <option value="'.$edit_p_recipe['p_skill'].'">'.$edit_p_recipe['p_skill'].'</option>
              <option value="Basic">Basic</option>
              <option value="Medium">Medium</option>
              <option value="Advance">Advance</option>
              </select>
              </div>
              <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="right-padding">
              <label>Type</label><br>
              <select class="basic" name="p_type">
              <option value="'.$edit_p_recipe['p_type'].'">'.$edit_p_recipe['p_type'].'</option>
              <option value="Breakfast">Breakfast</option>
              <option value="Starter">Starter</option>
              <option value="Lunch">Lunch</option>
              <option value="Dinner">Dinner</option>
              <option value="Desert">Desert</option>
              </select>
              </div>
              </div>
              <button type="submit" style="margin-bottom: 20px; margin-top: 20px;" name="update_select">Update</button>
              </form>
              ';
            }
            ?>

          </div>
          <!-- /edit recipe form -->
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
<!-- /EDIT RECIPE SECTION -->

<?php the_content(); ?>

<?php endwhile;

else :
  echo '<p> No content found</p>';

endif;

get_footer();
?>
