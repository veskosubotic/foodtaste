<?php

// SESSION START
session_start();

get_header();

// DATABASE CONNECT
require 'connect.php';

// Latest Recipes
$query = 'SELECT * FROM p_recipe ORDER BY p_date DESC LIMIT 0,2';

// get results
$result = mysqli_query($conn, $query);

// fetch data
$recipes1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);

$query = 'SELECT * FROM p_recipe ORDER BY p_date DESC LIMIT 2,2';

// get results
$result = mysqli_query($conn, $query);

// fetch data
$recipes2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);
// /Latest Recipes

// Popular Recipes
$query = 'SELECT * FROM p_recipe ORDER BY views DESC LIMIT 0,2';

// get results
$result = mysqli_query($conn, $query);

// fetch data
$recipes3 = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);

$query = 'SELECT * FROM p_recipe ORDER BY views DESC LIMIT 2,2';

// get results
$result = mysqli_query($conn, $query);

// fetch data
$recipes4 = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);
// /Popular Recipes

// Showcase Recipes
$query = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, p_recipe.image_upload, p_recipe.p_short, p_recipe.p_date, p_recipe.p_author, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article GROUP BY p_recipe.p_id ORDER BY AVG(article_ratings.rating) DESC LIMIT 0,3");
while ($rows = $query->fetch_object()) {
  $articles[] = $rows;
}
// /Showcase Recipes

// Popular Recipes Box
// select results
$addquery = 'SELECT * FROM p_recipe ORDER BY views DESC LIMIT 0,3';

// get results
$result = mysqli_query($conn, $addquery);

// fetch data
$popular_recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);
// /Popular Recipes Box

// Random Recipes Box
$query = 'SELECT * FROM p_recipe ORDER BY rand() LIMIT 3';

$result = mysqli_query($conn, $query);

$random_recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
// /Random Recipes Box

// Most Rated Recipes Box
$query = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, p_recipe.image_upload, p_recipe.p_short, p_recipe.p_date, p_recipe.p_author, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article GROUP BY p_recipe.p_id ORDER BY p_recipe.p_date LIMIT 3");
while ($rows = $query->fetch_object()) {
  $showcases[] = $rows;
}
// /Most Rated Recipes Box

?>
<!-- showcase -->
<section id="showcase">
  <div class="showcase-recipes">
    <?php
    foreach ($showcases as $showcase) {
      $p_short = $showcase->p_short;
      $strCut = substr($p_short,0,110);
      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
      $img = $showcase->image_upload;
      $p_id = $showcase->p_id;
      echo '
      <div class="index-slider">
      <img src="wp-content/uploads/2018/04/'.$img.'">
      <div class="container">
      <div class="description">
      <div class="description2">
      <h2>'.$showcase->p_title.'</h2>
      <hr>';
      if (round($showcase->rating) == 0) {
        echo '
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <p style="display: inline;">('.round($showcase->rating).'/5)</p>';
      }
      if (round($showcase->rating) == 1) {
        echo '
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <p style="display: inline;">('.round($showcase->rating).'/5)</p>';
      }
      if (round($showcase->rating) == 2) {
        echo '
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <p style="display: inline;">('.round($showcase->rating).'/5)</p>';
      }
      if (round($showcase->rating) == 3) {
        echo '
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <p style="display: inline;">('.round($showcase->rating).'/5)</p>';
      }
      if (round($showcase->rating) == 4) {
        echo '
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
        <p style="display: inline;">('.round($showcase->rating).'/5)</p>';
      }
      if (round($showcase->rating) == 5) {
        echo '
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
        <p style="display: inline;">('.round($showcase->rating).'/5)</p>';
      }
      echo '
      <p>'.$p_short.'</p>
      <a href="recipe-details?p_id='.$p_id.'"><span>Read More</span></a>
      </div>
      </div>
      </div>
      </div>
      ';
    }
    ?>
  </div>
</section>

<!-- find recipes button -->
<div class="find-recipes-background">
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg">
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" id="find-recipes-button-padding" style="padding-top: 0;">
        <button type="button" class="" id="find-recipes" name="button">Find Recipes ></button>
      </div>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <button type="button" class="browse-recipes-home" onclick="location.href='breakfast';" style="background-image: url('wp-content/uploads/2018/04/bread.png'); background-repeat: no-repeat; background-position: 20%; background-size: 40px;" name="button">Breakfast</button>
      </div>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <button type="button" class="browse-recipes-home" onclick="location.href='starter';" style="background-image: url('wp-content/uploads/2018/04/soup.png'); background-repeat: no-repeat; background-position: 30%; background-size: 35px;" name="button">Starter</button>
      </div>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <button type="button" class="browse-recipes-home" onclick="location.href='lunch';" style="background-image: url('wp-content/uploads/2018/04/rice.png'); background-repeat: no-repeat; background-position: 30%; background-size: 35px;" name="button">Lunch</button>
      </div>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <button type="button" class="browse-recipes-home" onclick="location.href='dinner';" style="background-image: url('wp-content/uploads/2018/04/pizza.png'); background-repeat: no-repeat; background-position: 30%; background-size: 35px;" name="button">Dinner</button>
      </div>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <button type="button" class="browse-recipes-home" onclick="location.href='desert';" style="background-image: url('wp-content/uploads/2018/04/muffin.png'); background-repeat: no-repeat; background-position: 30%; background-size: 35px;" name="button">Desert</button>
      </div>
    </div>
  </div>
</div>
<!-- /find recipes button -->
<!-- find recipes form -->
<form class="search-form" action="search" method="get">
  <div class="search-recipe-fields">
    <div class="container">
      <div class="row" id="search-recipe-fields-row">
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" id="ingredient-xs">
          <label>Ingredient</label><br>
          <input type="text" class="search-img" name="search" value="" placeholder="Any Ingredient">
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" id="course-xs">
          <label>Course</label><br>
          <select class="basic" name="search_course">
            <option value="">Any Course</option>
            <option value="MainCourse">Main Course</option>
            <option value="SideDish">Side Dish</option>
            <option value="Soup">Soup</option>
            <option value="Salad">Salad</option>
            <option value="Dessert">Dessert</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" id="cuisine-xs">
          <label>Cuisine</label><br>
          <select class="basic" name="search_cuisine">
            <option value="">Any Cuisine</option>
            <option value="Italian">Italian</option>
            <option value="Mexican">Mexican</option>
            <option value="Greek">Greek</option>
            <option value="Chinese">Chinese</option>
            <option value="Balcanian">Balcanian</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" id="skill-xs">
          <label>Skill Level</label><br>
          <select class="basic" name="search_time">
            <option value="">Any Skill Level</option>
            <option value="Basic">Basic</option>
            <option value="Medium">Medium</option>
            <option value="Advance">Advance</option>
          </select>
        </div>
        <button type="submit" id="search-recipes" name="submit-search" value="Search source code">Search</button>
      </div>
    </div>
  </div>
</form>
<!-- /find recipes form -->


<!-- latest recipes -->

<section id="latest-recipes">
  <div class="container">
    <div class="row center-xs center-sm center-md center-lg">
      <div class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
        <h2>Latest Recipes</h2>
        <div class="line" style="margin-bottom:20px;"></div>
      </div>
    </div>
    <div class="row start-sm start-md start-lg center-xs" style="margin:0; box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);">
      <?php
      foreach ($recipes1 as $recipe1) {
        $p_id = $recipe1['p_id'];
        $p_short = $recipe1['p_short'];
        $strCut = substr($p_short,0,110);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
        $strCut2 = substr($p_short,0,50);
        $p_short2 = substr($strCut2,0,strrpos($strCut2, ' ')).'...';

        echo '
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 snip1190" style="padding:0;">
        <div class="image-latest">
        <img src="wp-content/uploads/2018/04/'.$recipe1['image_upload'].'" style="width: 100%; height: 100%;" alt="">
        <a href="recipe-details?p_id='.$p_id.'"><figcaption>
        <h2>See Recipe</h2>
        </figcaption></a>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="padding: 0;">
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe1['p_title'].'</h2>
        <hr>
        <p class="short-desc-lg">'.$p_short.'</p>
        <p class="short-desc-xs">'.$p_short2.'</p>
        </div>
        </div>
        </div>
        ';
      }
      ?>
    </div>
    <div class="row start-sm start-md start-lg center-xs" style="margin: 0; box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);">
      <?php
      foreach ($recipes2 as $recipe2) {
        $p_id = $recipe2['p_id'];
        $p_short = $recipe2['p_short'];
        $strCut = substr($p_short,0,110);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
        $strCut2 = substr($p_short,0,50);
        $p_short2 = substr($strCut2,0,strrpos($strCut2, ' ')).'...';

        echo '
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="lg-popular" style="padding:0;">
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe2['p_title'].'</h2>
        <hr>
        <p class="short-desc-lg">'.$p_short.'</p>
        <p class="short-desc-xs">'.$p_short2.'</p>
        </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 snip1190" id="lg-popular" style="padding: 0;">
        <div class="image-latest">
        <img src="wp-content/uploads/2018/04/'.$recipe2['image_upload'].'" style="width: 100%; height: 100%;" alt="">
        <a href="recipe-details?p_id='.$p_id.'"><figcaption>
        <h2>See Recipe</h2>
        </figcaption></a>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 snip1190" id="xs-popular" style="padding:0;">
        <div class="image-latest">
        <img src="wp-content/uploads/2018/04/'.$recipe2['image_upload'].'" style="width: 100%; height: 100%;" alt="">
        <a href="recipe-details?p_id='.$p_id.'"><figcaption>
        <h2>See Recipe</h2>
        </figcaption></a>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="xs-popular" style="padding: 0;">
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe2['p_title'].'</h2>
        <hr>
        <p class="short-desc-lg">'.$p_short.'</p>
        <p class="short-desc-xs">'.$p_short2.'</p>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- latest recipes xs -->

<section id="latest2" class="latest2-xs">
  <div class="container">
    <div class="row center-xs center-sm center-md center-lg">
      <div class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
        <h2>Latest Recipes</h2>
        <div class="line" style="margin-bottom:20px;"></div>
      </div>
    </div>
    <div class="row center-xs around-sm center-md center-lg">
      <?php
      foreach ($recipes1 as $recipe1) {
        $p_id = $recipe1['p_id'];
        $p_short = $recipe1['p_short'];
        $strCut = substr($p_short,0,130);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';

        echo '<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
        <div class="image-latest2">
        <a href="recipe-details?p_id='.$p_id.'">
        <img src="wp-content/uploads/2018/04/'.$recipe1['image_upload'].'" alt="">
        </a>
        </div>
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe1['p_title'].'</h2>
        <hr>
        <p>'.$p_short.'</p>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
    <div class="row center-xs around-sm center-md center-lg" id="latest-recipes-row2-xs" >
      <?php
      foreach ($recipes2 as $recipe2) {
        $p_id = $recipe2['p_id'];
        $p_short = $recipe2['p_short'];
        $strCut = substr($p_short,0,130);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';

        echo '<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
        <div class="image-latest2">
        <a href="recipe-details?p_id='.$p_id.'">
        <img src="wp-content/uploads/2018/04/'.$recipe2['image_upload'].'" alt="">
        </a>
        </div>
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe2['p_title'].'</h2>
        <hr>
        <p>'.$p_short.'</p>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- chefs -->

<section id="chefs">
  <div class="container">
    <div class="description">
      <div class="description2">
        <h2>We love our chefs join us now</h2>
        <hr>
        <img src="wp-content/uploads/2018/04/cap.png" alt="">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <button type="button" onclick="window.location.href='register'" name="button">Register</button>
      </div>
    </div>
  </div>
</section>

<!-- popular recipes -->

<section id="latest-recipes" style="background: #F8F7F5 url('wp-content/uploads/2018/04/prosciutto.png') no-repeat; background-position: 7% 5%; background-size: 300px;">
  <div class="container">
    <div class="row center-xs center-sm center-md center-lg">
      <div class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
        <h2>Popular Recipes</h2>
        <div class="line" style="margin-bottom:20px;"></div>
      </div>
    </div>
    <div class="row start-sm start-md start-lg center-xs" style="margin:0; box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2)">
      <?php
      foreach ($recipes3 as $recipe3) {
        $p_id = $recipe3['p_id'];
        $p_short = $recipe3['p_short'];
        $strCut = substr($p_short,0,110);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
        $strCut2 = substr($p_short,0,50);
        $p_short2 = substr($strCut2,0,strrpos($strCut2, ' ')).'...';

        echo '
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="lg-popular" style="padding:0;">
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe3['p_title'].'</h2>
        <hr>
        <p class="short-desc-lg">'.$p_short.'</p>
        <p class="short-desc-xs">'.$p_short2.'</p>
        </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 snip1190" id="lg-popular" style="padding: 0;">
        <div class="image-latest">
        <img src="wp-content/uploads/2018/04/'.$recipe3['image_upload'].'" style="width: 100%; height: 100%;" alt="">
        <a href="recipe-details?p_id='.$p_id.'"><figcaption>
        <h2>See Recipe</h2>
        </figcaption></a>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 snip1190" id="xs-popular" style="padding: 0;">
        <div class="image-latest">
        <img src="wp-content/uploads/2018/04/'.$recipe3['image_upload'].'" style="width: 100%; height: 100%;" alt="">
        <a href="recipe-details?p_id='.$p_id.'"><figcaption>
        <h2>See Recipe</h2>
        </figcaption></a>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="xs-popular" style="padding:0;">
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe3['p_title'].'</h2>
        <hr>
        <p class="short-desc-lg">'.$p_short.'</p>
        <p class="short-desc-xs">'.$p_short2.'</p>
        </div>
        </div>
        </div>
        ';
      }
      ?>
    </div>
    <div class="row start-sm start-md start-lg center-xs" style="margin: 0; box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);">
      <?php
      foreach ($recipes4 as $recipe4) {
        $p_id = $recipe4['p_id'];
        $p_short = $recipe4['p_short'];
        $strCut = substr($p_short,0,110);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
        $strCut2 = substr($p_short,0,50);
        $p_short2 = substr($strCut2,0,strrpos($strCut2, ' ')).'...';

        echo '
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 snip1190" style="padding: 0;">
        <div class="image-latest">
        <img src="wp-content/uploads/2018/04/'.$recipe4['image_upload'].'" style="width: 100%; height: 100%;" alt="">
        <a href="recipe-details?p_id='.$p_id.'"><figcaption>
        <h2>See Recipe</h2>
        </figcaption></a>
        </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="padding:0;">
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe4['p_title'].'</h2>
        <hr>
        <p class="short-desc-lg">'.$p_short.'</p>
        <p class="short-desc-xs">'.$p_short2.'</p>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- popular recipes xs -->

<section id="latest2" class="latest2-xs">
  <div class="container">
    <div class="row center-xs center-sm center-md center-lg">
      <div class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
        <h2>Popular Recipes</h2>
        <div class="line" style="margin-bottom:20px;"></div>
      </div>
    </div>
    <div class="row center-xs around-sm center-md center-lg">
      <?php
      foreach ($recipes3 as $recipe3) {
        $p_id = $recipe3['p_id'];
        $p_short = $recipe3['p_short'];
        $strCut = substr($p_short,0,130);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';

        echo '<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
        <div class="image-latest2">
        <a href="recipe-details?p_id='.$p_id.'">
        <img src="wp-content/uploads/2018/04/'.$recipe3['image_upload'].'" alt="">
        </a>
        </div>
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe3['p_title'].'</h2>
        <hr>
        <p>'.$p_short.'</p>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
    <div class="row center-xs around-sm center-md center-lg" id="latest-recipes-row2-xs" >
      <?php
      foreach ($recipes4 as $recipe4) {
        $p_id = $recipe4['p_id'];
        $p_short = $recipe4['p_short'];
        $strCut = substr($p_short,0,130);
        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';

        echo '<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
        <div class="image-latest2">
        <a href="recipe-details?p_id='.$p_id.'">
        <img src="wp-content/uploads/2018/04/'.$recipe4['image_upload'].'" alt="">
        </a>
        </div>
        <div class="description1">
        <div class="description3">
        <h2>'.$recipe4['p_title'].'</h2>
        <hr>
        <p>'.$p_short.'</p>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- showcase -->

<section id="showcase-contact-us">
  <div class="container">
    <div class="description">
      <div class="description2">
        <h2>You have a question? Contact Us</h2>
        <hr>
        <i class="fa fa-envelope" aria-hidden="true" style="font-size: 30px;"></i>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <button type="button" onclick="window.location.href='contact'" name="button">Contact Us</button>
      </div>
    </div>
  </div>
</section>


<!-- recipe of the day -->

<section id="recipes">
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg" style="margin: 0;">
      <?php if (get_theme_mod('ft-recipe-of-day-display') == 'Yes'){ ?>
        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8" id="recipe-of-day-col" style="background: url(<?php echo wp_get_attachment_url(get_theme_mod('ft-recipe-of-day-image')); ?>); background-size:cover;">
          <div class="description-recipe-of-day">
            <div id="description2-recipes-of-day" class="description2">
              <button type="button" style="width: auto;" name="button">Recipe of the Day</button>
              <h2 style="font-size:15px;"><?php echo get_theme_mod('ft-recipe-of-day-headline'); ?></h2>
              <hr>
              <p><?php echo get_theme_mod('ft-recipe-of-day-text'); ?></p>
              <button type="button" name="button" onclick="window.location.href='<?php echo get_permalink(get_theme_mod('ft-recipe-of-day-link')); ?>';">Read More</button>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4" id="recipe-of-day-recipes" style="padding-right: 0;">
        <div class="class">
          <div class="row" style="margin: 0;">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-right: 0; padding-left: 0;">
              <button type="button" style="border-right: 1px solid #fff;" id="most-rated"><span>Most Rated</span></button>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0; padding-right: 0;">
              <button type="button" style="border-right: 1px solid #fff;" id="popular"><span>Popular</span></button>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left:0; padding-right: 0;">
              <button type="button" id="random"><span>Random</span></button>
            </div>
          </div>
          <div class="recipes-day">
            <div class="recipes-day1">
              <?php
              $last_key = array_search(end($articles), $articles);
              foreach ($articles as $articlee => $article) {
                $p_id = $article->p_id;
                echo '<div class="wid">
                <a href="recipe-details?p_id='.$p_id.'"><img src="wp-content/uploads/2018/04/'.$article->image_upload.'" alt=""></a>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <h4>'.$article->p_title.'</h4>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="recipes-day" style="padding: 0;">
                ';
                if (round($article->rating) == 0) {
                  echo '
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <p style="display: inline;">('.round($article->rating).'/5)</p>
                  </div>
                  </div>
                  </div>
                  ';
                  if ($articlee == $last_key) {
                    echo '';
                  }
                  else {
                    echo '<hr>';
                  }
                }
                if (round($article->rating) == 1) {
                  echo '
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <p style="display: inline;">('.round($article->rating).'/5)</p>
                  </div>
                  </div>
                  </div>
                  ';
                  if ($articlee == $last_key) {
                    echo '';
                  }
                  else {
                    echo '<hr>';
                  }
                }
                if (round($article->rating) == 2) {
                  echo '
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <p style="display: inline;">('.round($article->rating).'/5)</p>
                  </div>
                  </div>
                  </div>
                  ';
                  if ($articlee == $last_key) {
                    echo '';
                  }
                  else {
                    echo '<hr>';
                  }
                }
                if (round($article->rating) == 3) {
                  echo '
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <p style="display: inline;">('.round($article->rating).'/5)</p>
                  </div>
                  </div>
                  </div>
                  ';
                  if ($articlee == $last_key) {
                    echo '';
                  }
                  else {
                    echo '<hr>';
                  }
                }
                if (round($article->rating) == 4) {
                  echo '
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
                  <p style="display: inline;">('.round($article->rating).'/5)</p>
                  </div>
                  </div>
                  </div>
                  ';
                  if ($articlee == $last_key) {
                    echo '';
                  }
                  else {
                    echo '<hr>';
                  }
                }

                if (round($article->rating) == 5) {
                  echo '
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <img src="wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
                  <p style="display: inline;">('.round($article->rating).'/5)</p>
                  </div>
                  </div>
                  </div>
                  ';
                  if ($articlee == $last_key) {
                    echo '';
                  }
                  else {
                    echo '<hr>';
                  }
                }
              }
              ?>
            </div>
            <div class="recipes-day2">
              <?php
              $last_key = array_search(end($popular_recipes), $popular_recipes);
              foreach ($popular_recipes as $popular_recipee => $popular_recipe) {
                $p_id = $popular_recipe['p_id'];
                echo '<div class="wid">
                <a href="recipe-details?p_id='.$p_id.'"><img src="wp-content/uploads/2018/04/'.$popular_recipe['image_upload'].'" alt=""></a>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <h4>'.$popular_recipe['p_title'].'</h4>
                <p>'.$popular_recipe['views'].' views</p>
                </div>
                </div>
                ';
                if ($popular_recipee == $last_key) {
                  echo '';
                }
                else {
                  echo '<hr>';
                }
              }
              ?>
            </div>
            <div class="recipes-day3">
              <?php
              $last_key = array_search(end($random_recipes), $random_recipes);
              foreach ($random_recipes as $random_recipee => $random_recipe) {
                $p_id = $random_recipe['p_id'];
                $date = new dateTime($random_recipe['p_date']);
                $date = date_format($date, 'F j, Y');
                echo '
                <div class="wid">
                <a href="recipe-details?p_id='.$p_id.'"><img src="wp-content/uploads/2018/04/'.$random_recipe['image_upload'].'" alt=""></a>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <h4>'.$random_recipe['p_title'].'</h4>
                <p>'.$date.'</p>
                </div>
                </div>
                ';
                if ($random_recipee == $last_key) {
                  echo '';
                }
                else {
                  echo '<hr>';
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php

get_footer();
?>
