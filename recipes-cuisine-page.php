<?php

/*
Template Name: Recipes Cuisine Template
*/

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <?php

  // DATABASE CONNECT
  require 'connect.php';

  // SIDEBAR RECIPES
  require 'sidebar-recipes.php';

  // PAGINATION

  // number of results
  if (is_page('lunch')) {
    $sql = "SELECT * FROM p_recipe WHERE p_type='Lunch'";
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);
  }

  if (is_page('breakfast')) {
    $sql = "SELECT * FROM p_recipe WHERE p_type='Breakfast'";
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);
  }

  if (is_page('starter')) {
    $sql = "SELECT * FROM p_recipe WHERE p_type='Starter'";
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);
  }

  if (is_page('dinner')) {
    $sql = "SELECT * FROM p_recipe WHERE p_type='Dinner'";
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);
  }

  if (is_page('desert')) {
    $sql = "SELECT * FROM p_recipe WHERE p_type='Desert'";
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);
  }

  if (is_page('my-recipes')) {
    // SELECT USER NAME FROM DATABASE
    if (!isset($_SESSION['u_id'])) {
      exit();
    }

    $u_id = $_SESSION['u_id'];
    $user = "SELECT u_name FROM users WHERE u_id='$u_id'";
    $resulti = mysqli_query($conn, $user);
    $username = mysqli_fetch_assoc($resulti);
    $user_name = $username['u_name'];

    $sql = "SELECT * FROM p_recipe WHERE p_author='$user_name'";
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);
  }

  // number of results per page
  $per_page = 8;
  $start = isset($_GET['start']) ? $_GET['start']: '';
  $max_pages = ceil($number_of_results / $per_page);
  if(!$start)
  $start=0;

  // fetch results
  if (is_page('lunch')) {
    $query = "SELECT * FROM p_recipe WHERE p_type='Lunch' ORDER BY p_date DESC LIMIT $start, $per_page";
    $result = mysqli_query($conn, $query);
    $p_cuisines = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  if (is_page('breakfast')) {
    $query = "SELECT * FROM p_recipe WHERE p_type='Breakfast' ORDER BY p_date DESC LIMIT $start, $per_page";
    $result = mysqli_query($conn, $query);
    $p_cuisines = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  if (is_page('starter')) {
    $query = "SELECT * FROM p_recipe WHERE p_type='Starter' ORDER BY p_date DESC LIMIT $start, $per_page";
    $result = mysqli_query($conn, $query);
    $p_cuisines = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  if (is_page('dinner')) {
    $query = "SELECT * FROM p_recipe WHERE p_type='Dinner' ORDER BY p_date DESC LIMIT $start, $per_page";
    $result = mysqli_query($conn, $query);
    $p_cuisines = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  if (is_page('desert')) {
    $query = "SELECT * FROM p_recipe WHERE p_type='Desert' ORDER BY p_date DESC LIMIT $start, $per_page";
    $result = mysqli_query($conn, $query);
    $p_cuisines = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  // close connection
  mysqli_close($conn);
  ?>

  <div class="container">
    <div id="remove-padding" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      <div id="page-title-responsive" class="desc">
        <div class="desc2">
          <?php if (!is_page('my-recipes')): ?>
            <h3 id="page-title"><?php the_title(); ?> Recipes Page</h3>
          <?php else: ?>
            <h3 id="page-title"><?php the_title(); ?> Page</h3>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="find-recipes-button-padding" class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><button id="find-recipes" class="" name="button" type="button">Find Recipes &gt;</button></div>
  </div>
  <form class="submit-form" action="search" method="get">
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
        <section id="recipe-details">
          <div class="container">
            <div class="row center-xs around-sm start-md start-lg" id="widh">
              <!-- most rated recepes -->
              <div class="col-xs-8 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
                <!-- page subtitle -->
                <div class="recipe-title-content">
                  <div class="recipe-title">
                    <?php if (!is_page('my-recipes')): ?>
                      <h3><?php the_title(); ?> Recipes</h3>
                    <?php else: ?>
                      <h3><?php the_title(); ?></h3>
                    <?php endif; ?>
                  </div>
                  <hr>
                </div>
                <!-- /page subtitle -->

                <?php
                // my recipes results
                if (!is_page('my-recipes')) {
                  require 'connect.php';
                  define('recipe-type-results', TRUE);
                  foreach ($p_cuisines as $p_cuisine) {
                    $p_id = $p_cuisine['p_id'];
                    $p_short = $p_cuisine['p_short'];
                    $image_upload = $p_cuisine['image_upload'];
                    $p_title = $p_cuisine['p_title'];
                    $p_author = $p_cuisine['p_author'];
                    $p_date = $p_cuisine['p_date'];
                    $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id'")->fetch_object();
                    $strCut = substr($p_short,0,150);
                    $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                    $date = new dateTime($p_date);
                    $date = date_format($date, 'd/m/Y');
                    require 'recipe-type-results.php';
                  }
                }

                if (is_page('my-recipes')) {
                  require 'connect.php';
                  define('recipe-type-results', TRUE);
                  $query = "SELECT * FROM p_recipe WHERE p_author='$user_name' ORDER BY p_date DESC LIMIT $start, $per_page";
                  $result = mysqli_query($conn, $query);
                  while($rows = mysqli_fetch_assoc($result))
                  {
                    $p_id = $rows['p_id'];
                    $p_title = $rows['p_title'];
                    $p_short = $rows['p_short'];
                    $image_upload = $rows['image_upload'];
                    $p_date = $rows['p_date'];
                    $date = new dateTime($rows['p_date']);
                    $date = date_format($date, 'd/m/Y');
                    $p_author = $rows['p_author'];
                    $strCut = substr($p_short,0,150);
                    $p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
                    $article = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article WHERE p_recipe.p_id ='$p_id'")->fetch_object();
                    require 'recipe-type-results.php';
                    echo '<div class="row center-xs end-sm end-md end-lg" id="edit-delete"><a href="edit-recipe?p_id='.$p_id.'" style="display: flex; justify-content: right; text-decoration: none; color: #000; margin-bottom: 20px;">Edit Recipe</a>
                    <button type="submit" id="'.$p_id.'" class="delete-recipe" style="color: #000; height: 25px; background: transparent; font-size: 14px; font-family: Lora, serif; padding-right: none; margin-bottom: 20px;">Delete Recipe</button>
                    </div>';
                  }
                }
                ?>
                <!-- /my recipes results -->

                <!-- PAGINATION -->
                <div id="pages" class="row center-xs center-sm center-md center-lg">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                      echo " <div class='bg'><a href='?start=$prev'>Prev</a></div> ";

                      //pages
                      if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
                      {
                        $i = 0;
                        for ($counter = 1; $counter <= $max_pages; $counter++)
                        {
                          if ($i == $start){
                            echo " <div class='bg'><a href='?start=$i'><b>$counter</b></a></div> ";
                          }
                          else {
                            echo " <div class='bg'><a href='?start=$i'>$counter</a></div> ";
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
                              echo " <div class='bg'><a href='?start=$i'><b>$counter</b></a></div> ";
                            }
                            else {
                              echo " <div class='bg'><a href='?start=$i'>$counter</a></div> ";
                            }
                            $i = $i + $per_page;
                          }

                        }
                        //in middle; hide some front and some back
                        elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
                        {
                          echo " <div class='bg'><a href='?start=0'>1</a></div> ";
                          echo " <div class='bg'><a href='?start=$per_page'>2</a></div> .... ";

                          $i = $start;
                          for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
                          {
                            if ($i == $start){
                              echo " <div class='bg'><a href='?start=$i'><b>$counter</b></a></div> ";
                            }
                            else {
                              echo " <div class='bg'><a href='?start=$i'>$counter</a></div> ";
                            }
                            $i = $i + $per_page;
                          }

                        }
                        //close to end; only hide early pages
                        else
                        {
                          echo " <div class='bg'><a href='?start=0'>1</a></div> ";
                          echo " <div class='bg'><a href='?start=$per_page'>2</a></div> .... ";

                          $i = $start;
                          for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
                          {
                            if ($i == $start){
                              echo " <div class='bg'><a href='?start=$i'><b>$counter</b></a></div> ";
                            }
                            else {
                              echo " <div class='bg'><a href='?start=$i'>$counter</a></div> ";
                            }
                            $i = $i + $per_page;
                          }
                        }
                      }

                      //next button
                      if (!($start >=$number_of_results-$per_page))
                      echo " <div class='bg'><a href='?start=$next'>Next</a></div> ";
                    }
                    echo "</center>";
                    // }

                    ?>

                  </div>
                </div>
                <!-- /PAGINATION -->
              </div>
              <!-- most rated recipes -->

              <!-- SIDEBAR -->
              <?php
              define('sidebar', TRUE);
              require 'sidebar.php';
              ?>
              <!-- /SIDEBAR -->

            </div>
          </div>
        </section>
        <!-- /MOST RATED RECIPES SECTION -->

      <?php endwhile;

      else :
        echo '<p> No content found</p>';

      endif;

      get_footer();
      ?>
