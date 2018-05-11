<?php

/*
Template Name: Search Recipes Template
*/

// SESSION START
session_start();

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  // DATABASE CONNECT
  require 'connect.php';

  // SIDEBAR RECIPES
  require 'sidebar-recipes.php';

  
  $button = $_GET ['submit-search'];
  $search = $_GET ['search'];
  $search_cuisine = $_GET['search_cuisine'];
  $search_course = $_GET['search_course'];
  $search_time = $_GET['search_time'];

  $search_exploded = explode (" ", $search);

  $x = "";
  $construct = "";

  foreach($search_exploded as $search_each)
  {
    $x++;
    if($x==1)
    $construct .="p_title LIKE '%$search_each%'";
    else
    $construct .="AND p_title LIKE '%$search_each%'";

  }

  $constructs ="SELECT * FROM p_recipe WHERE p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%'";
  $run = mysqli_query($conn, $constructs);

  $foundnum = mysqli_num_rows($run);

  if ($foundnum==0)
  $not_results = "Sorry, there are no matching result for <b>$search</b>.</br></br>1.
  Try more general words. for example: If you want to search 'how to create a website'
  then use general keyword like 'create' 'website'</br>2. Try different words with similar
  meaning</br>3. Please check your spelling";
  else
  {

  }

  $number_one = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%'");
  $one = mysqli_num_rows($number_one);

  $number_two = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%'");
  $two = mysqli_num_rows($number_two);

  $number_three = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' AND p_skill LIKE '%$search_time%'");
  $three = mysqli_num_rows($number_three);

  $number_four = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%')  AND p_cuisine LIKE '%$search_cuisine%'");
  $four = mysqli_num_rows($number_four);

  $number_five = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%'");
  $five = mysqli_num_rows($number_five);

  $number_six = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%'");
  $six = mysqli_num_rows($number_six);

  $number_seven = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%'");
  $seven = mysqli_num_rows($number_seven);

  $number_eight = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_skill LIKE '%$search_time%'");
  $eight = mysqli_num_rows($number_eight);

  $number_nine = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%'");
  $nine = mysqli_num_rows($number_nine);

  $number_ten = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_skill LIKE '%$search_time%'");
  $ten = mysqli_num_rows($number_ten);

  $number_eleven = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' AND p_skill LIKE '%$search_time%'");
  $eleven = mysqli_num_rows($number_eleven);

  $number_twelve = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%'");
  $twelve = mysqli_num_rows($number_twelve);

  $number_thirteen = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%'");
  $thirteen = mysqli_num_rows($number_thirteen);

  $number_fourteen = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%'");
  $fourteen = mysqli_num_rows($number_fourteen);

  $number_fifteen = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_cuisine LIKE '%$search_cuisine%'");
  $fifteen = mysqli_num_rows($number_fifteen);

  $query = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, p_recipe.image_upload, p_recipe.p_short, p_recipe.p_date, p_recipe.p_author, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article GROUP BY p_recipe.p_id");
  while ($rows = $query->fetch_object()) {
    $articles[] = $rows;
  }

  ?>

  <div class="container">
    <div id="remove-padding" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      <div id="page-title-responsive" class="desc">
        <div class="desc2">
          <h3 id="page-title" style="text-transform: uppercase;"><?php the_title(); ?> Page</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="find-recipes-button-padding" class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><button id="find-recipes" class="" name="button" type="button">Find Recipes &gt;</button></div>
  </div>
  <form class="" method="get">
    <div class="search-recipe-fields">
      <div class="container">
        <div id="search-recipe-fields-row" class="row">
          <div id="ingredient-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Ingredient</label>
            <input class="search-img" name="search" type="text" value="" placeholder="Any Ingredient" /></div>
            <div id="course-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Course</label>
              <select class="basic" name="search_course">
                <option value="">Any Course</option>
                <option value="MainCourse">Main Course</option>
                <option value="SideDish">Side Dish</option>
                <option value="Soup">Soup</option>
                <option value="Salad">Salad</option>
                <option value="Dessert">Dessert</option>
                <option value="Other">Other</option>
              </select></div>
              <div id="cuisine-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Cuisine</label>
                <select class="basic" name="search_cuisine">
                  <option value="">Any Cuisine</option>
                  <option value="Italian">Italian</option>
                  <option value="Mexican">Mexican</option>
                  <option value="Greek">Greek</option>
                  <option value="Chinese">Chinese</option>
                  <option value="Balcanian">Balcanian</option>
                  <option value="Other">Other</option>
                </select></div>
                <div id="skill-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Skill Level</label>
                  <select class="basic" name="search_time">
                    <option value="">Any Skill Level</option>
                    <option value="Basic">Basic</option>
                    <option value="Medium">Medium</option>
                    <option value="Advance">Advance</option>
                  </select></div>
                  <button id="search-recipes" name="submit-search" type="submit" value="Search source code">Search</button>
                </div>
              </div>
            </div>
          </form>
        </section>

        <!-- SEARCH RESULTS SECTION -->
        <section id="recipe-details">
          <div class="container">
            <div class="row center-xs around-sm start-md start-lg" id="widh">
              <div class="col-xs-8 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
                <div class="recipe-title-content">
                  <div class="recipe-title">
                    <h3>Search Result ( <?php if(empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])){
                      echo $one;
                    } else {
                    }
                    if(!empty($_GET['search']) and empty($_GET['search_course']) and empty($_GET['search_cuisine']) and empty($_GET['search_time'])){
                      echo $two;
                    } else {
                    }
                    if(empty($_GET['search']) and empty($_GET['search_cuisine']) and !empty($_GET['search_course']) and !empty($_GET['search_time'])){
                      echo $three;
                    } else {
                    }
                    if(!empty($_GET['search']) and !empty($_GET['search_cuisine']) and empty($_GET['search_course']) and empty($_GET['search_time'])){
                      echo $four;
                    }else {
                    }
                    if(empty($_GET['search']) and empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])){
                      echo $five;
                    }else {
                    }
                    if(empty($_GET['search']) and !empty($_GET['search_course'] and empty($_GET['search_cuisine']) and empty($_GET['search_time']))){
                      echo $six;
                    }else {
                    }
                    if(!empty($_GET['search']) and !empty($_GET['search_course']) and empty($_GET['search_cuisine']) and empty($_GET['search_time'])){
                      echo $seven;
                    }else {
                    }
                    if(empty($_GET['search']) and empty($_GET['search_cuisine']) and empty($_GET['search_course']) and !empty($_GET['search_time'])){
                      echo $eight;
                    }else {
                    }
                    if(!empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and empty($_GET['search_time'])){
                      echo $nine;
                    }else {
                    }
                    if(!empty($_GET['search']) and empty($_GET['search_course']) and empty($_GET['search_cuisine']) and !empty($_GET['search_time'])){
                      echo $ten;
                    }else {
                    }
                    if(!empty($_GET['search']) and !empty($_GET['search_course']) and empty($_GET['search_cuisine']) and !empty($_GET['search_time'])){
                      echo $eleven;
                    }else {
                    }
                    if(!empty($_GET['search']) and empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])){
                      echo $twelve;
                    }else {
                    }
                    if(!empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])){
                      echo $thirteen;
                    }else {
                    }
                    if(empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and empty($_GET['search_time'])){
                      echo $fourteen;
                    }else {
                    }
                    if(empty($_GET['search']) and empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and empty($_GET['search_time'])){
                      echo $fifteen;
                    }else {
                    }?> )</h3>
                  </div>
                  <hr>
                </div>
                <?php echo $not_results; ?>
                <?php
                define('recipe-type-results', TRUE);
                if (empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])) {
                  $per_page = 8;
                  $start = isset($_GET['start']) ? $_GET['start']: '';
                  $max_pages = ceil($one / $per_page);
                  if(!$start)
                  $start=0;
                  $getquerys = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                  while($runrows = mysqli_fetch_assoc($getquerys))
                  {
                    $p_id = $runrows ['p_id'];
                    $p_title = $runrows ['p_title'];
                    $p_short = $runrows ['p_short'];
                    $image_upload = $runrows ['image_upload'];
                    $p_date = $runrows ['p_date'];
                    $date = new dateTime($runrows['p_date']);
                    $date = date_format($date, 'd/m/Y');
                    $p_author = $runrows['p_author'];
                    $strCut = substr($p_short,0,150);
                    $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                    $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                    require 'recipe-type-results.php';
                  }
                }
                else {
                  if (!empty($_GET['search']) and empty($_GET['search_course']) and empty($_GET['search_cuisine']) and empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($two / $per_page);
                    if(!$start)
                    $start=0;
                    $getqueryssss = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($getqueryssss))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                  if (empty($_GET['search']) and empty($_GET['search_cuisine']) and !empty($_GET['search_course']) and !empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($three / $per_page);
                    if(!$start)
                    $start=0;
                    $getqueryss = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' AND p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($getqueryss))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }

                  else {
                    if (!empty($_GET['search']) and !empty($_GET['search_cuisine']) and empty($_GET['search_course']) and empty($_GET['search_time'])) {
                      $per_page = 8;
                      $start = isset($_GET['start']) ? $_GET['start']: '';
                      $max_pages = ceil($four / $per_page);
                      if(!$start)
                      $start=0;
                      $getquerysssss = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%')  AND p_cuisine LIKE '%$search_cuisine%' LIMIT $start, $per_page");
                      while($runrows = mysqli_fetch_assoc($getquerysssss))
                      {
                        $p_id = $runrows ['p_id'];
                        $p_title = $runrows ['p_title'];
                        $p_short = $runrows ['p_short'];
                        $image_upload = $runrows ['image_upload'];
                        $p_date = $runrows ['p_date'];
                        $date = new dateTime($runrows['p_date']);
                        $date = date_format($date, 'd/m/Y');
                        $p_author = $runrows['p_author'];
                        $strCut = substr($p_short,0,150);
                        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                        $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                        require 'recipe-type-results.php';
                      }
                    } else {
                      if (empty($_GET['search']) and empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])) {
                        $per_page = 8;
                        $start = isset($_GET['start']) ? $_GET['start']: '';
                        $max_pages = ceil($five / $per_page);
                        if(!$start)
                        $start=0;
                        $gi = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                        while($runrows = mysqli_fetch_assoc($gi))
                        {
                          $p_id = $runrows ['p_id'];
                          $p_title = $runrows ['p_title'];
                          $p_short = $runrows ['p_short'];
                          $image_upload = $runrows ['image_upload'];
                          $p_date = $runrows ['p_date'];
                          $date = new dateTime($runrows['p_date']);
                          $date = date_format($date, 'd/m/Y');
                          $p_author = $runrows['p_author'];
                          $strCut = substr($p_short,0,150);
                          $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                          $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                          require 'recipe-type-results.php';
                        }
                      }
                    }
                  }
                  if (empty($_GET['search']) and !empty($_GET['search_course'] and empty($_GET['search_cuisine']) and empty($_GET['search_time']))) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($six / $per_page);
                    if(!$start)
                    $start=0;
                    $getqueryssss = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($getqueryssss))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }

                  else {
                    if (!empty($_GET['search']) and !empty($_GET['search_course']) and empty($_GET['search_cuisine']) and empty($_GET['search_time'])) {
                      $per_page = 8;
                      $start = isset($_GET['start']) ? $_GET['start']: '';
                      $max_pages = ceil($seven / $per_page);
                      if(!$start)
                      $start=0;
                      $getquerysssss = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' LIMIT $start, $per_page");
                      while($runrows = mysqli_fetch_assoc($getquerysssss))
                      {
                        $p_id = $runrows ['p_id'];
                        $p_title = $runrows ['p_title'];
                        $p_short = $runrows ['p_short'];
                        $image_upload = $runrows ['image_upload'];
                        $p_date = $runrows ['p_date'];
                        $date = new dateTime($runrows['p_date']);
                        $date = date_format($date, 'd/m/Y');
                        $p_author = $runrows['p_author'];
                        $strCut = substr($p_short,0,150);
                        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                        $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                        require 'recipe-type-results.php';
                      }
                    }
                  }
                  if (empty($_GET['search']) and empty($_GET['search_cuisine']) and empty($_GET['search_course']) and !empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($eight / $per_page);
                    if(!$start)
                    $start=0;
                    $getquerysss = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($getquerysss))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  } else {
                    if (!empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and empty($_GET['search_time'])) {
                      $per_page = 8;
                      $start = isset($_GET['start']) ? $_GET['start']: '';
                      $max_pages = ceil($nine / $per_page);
                      if(!$start)
                      $start=0;
                      $gis = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%' LIMIT $start, $per_page");
                      while($runrows = mysqli_fetch_assoc($gis))
                      {
                        $p_id = $runrows ['p_id'];
                        $p_title = $runrows ['p_title'];
                        $p_short = $runrows ['p_short'];
                        $image_upload = $runrows ['image_upload'];
                        $p_date = $runrows ['p_date'];
                        $date = new dateTime($runrows['p_date']);
                        $date = date_format($date, 'd/m/Y');
                        $p_author = $runrows['p_author'];
                        $strCut = substr($p_short,0,150);
                        $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                        $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                        require 'recipe-type-results.php';
                      }
                    }
                  }
                  if (!empty($_GET['search']) and empty($_GET['search_course']) and empty($_GET['search_cuisine']) and !empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($ten / $per_page);
                    if(!$start)
                    $start=0;
                    $giso = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($giso))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                  if (!empty($_GET['search']) and !empty($_GET['search_course']) and empty($_GET['search_cuisine']) and !empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($eleven / $per_page);
                    if(!$start)
                    $start=0;
                    $fis = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' AND p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($fis))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                  if (!empty($_GET['search']) and empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($twelve / $per_page);
                    if(!$start)
                    $start=0;
                    $sis = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($sis))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                  if (!empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and !empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($thirteen / $per_page);
                    if(!$start)
                    $start=0;
                    $gisi = mysqli_query($conn, "SELECT * FROM p_recipe WHERE (p_title LIKE '%$search%' OR p_short LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%') AND p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%' AND p_skill LIKE '%$search_time%' LIMIT
                    $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($gisi))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                  if (empty($_GET['search']) and !empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($fourteen / $per_page);
                    if(!$start)
                    $start=0;
                    $vsa = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_course LIKE '%$search_course%' AND p_cuisine LIKE '%$search_cuisine%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($vsa))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                  if (empty($_GET['search']) and empty($_GET['search_course']) and !empty($_GET['search_cuisine']) and empty($_GET['search_time'])) {
                    $per_page = 8;
                    $start = isset($_GET['start']) ? $_GET['start']: '';
                    $max_pages = ceil($fifteen / $per_page);
                    if(!$start)
                    $start=0;
                    $vsb = mysqli_query($conn, "SELECT * FROM p_recipe WHERE p_cuisine LIKE '%$search_cuisine%' LIMIT $start, $per_page");
                    while($runrows = mysqli_fetch_assoc($vsb))
                    {
                      $p_id = $runrows ['p_id'];
                      $p_title = $runrows ['p_title'];
                      $p_short = $runrows ['p_short'];
                      $image_upload = $runrows ['image_upload'];
                      $p_date = $runrows ['p_date'];
                      $date = new dateTime($runrows['p_date']);
                      $date = date_format($date, 'd/m/Y');
                      $p_author = $runrows['p_author'];
                      $strCut = substr($p_short,0,150);
                      $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                      $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id' LIMIT $per_page")->fetch_object();
                      require 'recipe-type-results.php';
                    }
                  }
                }
                ?>

                <?php

                //Pagination Starts
                echo "<center>";

                $prev = $start - $per_page;
                $next = $start + $per_page;

                $adjacents = 3;
                $last = $max_pages - 1;

                if($max_pages > 1)
                {
                  //previous button
                  if (!($start<=0))
                  echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$prev'>Prev</a></div> ";

                  //pages
                  if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
                  {
                    $i = 0;
                    for ($counter = 1; $counter <= $max_pages; $counter++)
                    {
                      if ($i == $start){
                        echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'><b>$counter</b></a></div> ";
                      }
                      else {
                        echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'>$counter</a></div> ";
                      }
                      $i = $i + $per_page;
                    }
                  }
                  elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
                  {
                    //close to beginning; only hide later pages
                    if(($start/$per_page) < 1 + ($adjacents * 2))
                    {
                      $i = 0;
                      for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                      {
                        if ($i == $start){
                          echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'><b>$counter</b></a> ";
                        }
                        else {
                          echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'>$counter</a> ";
                        }
                        $i = $i + $per_page;
                      }

                    }
                    //in middle; hide some front and some back
                    elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
                    {
                      echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=0'>1</a> ";
                      echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$per_page'>2</a> .... ";

                      $i = $start;
                      for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
                      {
                        if ($i == $start){
                          echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'><b>$counter</b></a> ";
                        }
                        else {
                          echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'>$counter</a> ";
                        }
                        $i = $i + $per_page;
                      }

                    }
                    //close to end; only hide early pages
                    else
                    {
                      echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=0'>1</a> ";
                      echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$per_page'>2</a> .... ";

                      $i = $start;
                      for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
                      {
                        if ($i == $start){
                          echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'><b>$counter</b></a> ";
                        }
                        else {
                          echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$i'>$counter</a> ";
                        }
                        $i = $i + $per_page;
                      }
                    }
                  }

                  //next button
                  if (!($start >=$foundnum-$per_page))
                  echo " <div class='bg'><a href='?search=$search&search_course=$search_course&search_cuisine=$search_cuisine&search_time=$search_time&submit-search=Search+source+code&start=$next'>Next</a> ";
                }
                echo "</center>";
                // }
                ?>
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
        <!-- /SEARCH RESULTS SECTION -->


        <?php the_content(); ?>

      <?php endwhile;

      else :
        echo '<p> No content found</p>';

      endif;

      get_footer();
      ?>
