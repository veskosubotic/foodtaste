<?php

/*
Template Name: Special Layout
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
  $sql = "SELECT * FROM p_recipe";
  $result = mysqli_query($conn, $sql);
  $number_of_results = mysqli_num_rows($result);

  // number of results per page
  $per_page = 8;
  $start = isset($_GET['start']) ? $_GET['start']: '';
  $max_pages = ceil($number_of_results / $per_page);
  if(!$start)
  $start=0;

  // fetch results
  if (is_page('most-rated-recipes')) {
    $query = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, p_recipe.image_upload, p_recipe.p_short, p_recipe.p_date, p_recipe.p_author, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article GROUP BY p_recipe.p_id ORDER BY AVG(article_ratings.rating) DESC LIMIT $start, $per_page");
    while ($rows = $query->fetch_object()) {
      $articles[] = $rows;
    }
  }

  if (is_page('popular-recipes')) {
    $query = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, p_recipe.image_upload, p_recipe.p_short, p_recipe.p_date, p_recipe.p_author, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article GROUP BY p_recipe.p_id ORDER BY views DESC LIMIT $start, $per_page");
    while ($rows = $query->fetch_object()) {
      $articles[] = $rows;
    }
  }

  if (is_page('recent-recipes')) {
    $query = $conn->query("SELECT p_recipe.p_id, p_recipe.p_title, p_recipe.image_upload, p_recipe.p_short, p_recipe.p_date, p_recipe.p_author, AVG(article_ratings.rating) AS rating FROM p_recipe LEFT JOIN article_ratings ON p_recipe.p_id = article_ratings.article GROUP BY p_recipe.p_id ORDER BY p_recipe.p_date DESC LIMIT $start, $per_page");
    while ($rows = $query->fetch_object()) {
      $articles[] = $rows;
    }
  }

  // close connection
  mysqli_close($conn);
  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section-->

</section>
<section id="recipe-details">
  <div class="container">
    <div class="row center-xs around-sm start-md start-lg" id="widh">
      <!-- most rated recepes -->
      <div class="col-xs-8 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
        <!-- page subtitle -->
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h3><?php the_title(); ?></h3>
          </div>
          <hr>
        </div>
        <!-- /page subtitle -->
        <?php
        // most rated recipes results
        define('recipe-results', TRUE);
        foreach ($articles as $article) {
          $strCut = substr($article->p_short,0,150);
          $article->p_short = substr($strCut,0,strrpos($strCut, ' ')).'...';
          $date = new dateTime($article->p_date);
          $date = date_format($date, 'd/m/Y');
          require 'recipe-results.php';
        };
        ?>
        <!-- /most rated recipes results -->

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
