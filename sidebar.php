<?php
if (!defined('sidebar')) {
  exit();
}
?>
<div class="col-xs-8 col-sm-12 col-md-3 col-lg-3" id="sidebar">
  <!-- browse recipes -->
  <div class="recipe-title-content">
    <div class="recipe-title">
      <p>Browse Recipes</p>
    </div>
    <hr>
  </div>
  <div class="searchbox">
    <div class="serarchcontent">
      <input type="submit" id="breakfast-bread" name="" onclick="location.href='http://localhost/wordpress/wordpress/breakfast/';" value="Breakfast"><br><hr>
      <input type="submit" id="starter-dish" name="" onclick="location.href='http://localhost/wordpress/wordpress/starter/';" value="Starter"><br><hr>
      <input type="submit" id="lunch-rice" name="" onclick="location.href='http://localhost/wordpress/wordpress/lunch/';" value="Lunch"><br><hr>
      <input type="submit" id="dinner-pizza" name="" onclick="location.href='http://localhost/wordpress/wordpress/dinner/';" value="Dinner"><br><hr>
      <input type="submit" id="desert-cake" name="" onclick="location.href='http://localhost/wordpress/wordpress/desert/';" value="Desert">
    </div>
  </div>
  <!-- /browse recipes -->
  <?php if (!is_page('login') and !is_page('forgot-password')): ?>
    <!-- popular recipes -->
    <div class="recipe-title-content" style="margin-top: 25px;">
      <div class="recipe-title">
        <p>Popular Recipes</p>
      </div>
      <hr>
    </div>
    <?php
    // popular recipes results
    $last_key = array_search(end($recipes), $recipes);
    foreach ($recipes as $recipe => $recipee){
      $date = new dateTime($recipee['p_date']);
      $date = date_format($date, 'F j, Y');
      if ($recipe == $last_key) {
        echo '
        <div class="wid">
        <a href="http://localhost/wordpress/wordpress/recipe-details?p_id='.$recipee['p_id'].'"><img src="../wp-content/uploads/2018/04/'.$recipee['image_upload'].'" /> </a>
        <div class="col-xs-8 col-sm-7 col-md-7 col-lg-7" style="padding-right: 0;">
        <h4>'.$recipee['p_title'].'</h4>
        <p>'.$date.'</p>
        </div>
        </div>
        ';
      }
      else {
        echo '
        <div class="wid">
        <a href="http://localhost/wordpress/wordpress/recipe-details?p_id='.$recipee['p_id'].'"><img src="../wp-content/uploads/2018/04/'.$recipee['image_upload'].'" /> </a>
        <div class="col-xs-8 col-sm-7 col-md-7 col-lg-7" style="padding-right: 0;">
        <h4>'.$recipee['p_title'].'</h4>
        <p>'.$date.'</p>
        </div>
        </div>
        <hr class="margin-hr">
        ';
      }
    }
    // /popular recipes results
    // /popular recipes
    ?>
    <!-- latest recipes -->
    <div class="recipe-title-content" style="margin-top: 25px;">
      <div class="recipe-title">
        <p>Latest Recipes</p>
      </div>
      <hr>
    </div>
    <?php
    // latest recipes results
    $last_key = array_search(end($latest_recipes), $latest_recipes);
    foreach ($latest_recipes as $latest_recipe => $latest_recipee){
      $date = new dateTime($latest_recipee['p_date']);
      $date = date_format($date, 'F j, Y');
      if ($latest_recipe == $last_key) {
        echo '
        <div class="wid">
        <a href="http://localhost/wordpress/wordpress/recipe-details?p_id='.$latest_recipee['p_id'].'"><img src="../wp-content/uploads/2018/04/'.$latest_recipee['image_upload'].'" /> </a>
        <div class="col-xs-8 col-sm-7 col-md-7 col-lg-7" style="padding-right: 0;">
        <h4>'.$latest_recipee['p_title'].'</h4>
        <p>'.$date.'</p>
        </div>
        </div>
        ';
      }
      else {
        echo '
        <div class="wid">
        <a href="http://localhost/wordpress/wordpress/recipe-details?p_id='.$latest_recipee['p_id'].'"><img src="../wp-content/uploads/2018/04/'.$latest_recipee['image_upload'].'" /> </a>
        <div class="col-xs-8 col-sm-7 col-md-7 col-lg-7" style="padding-right: 0;">
        <h4>'.$latest_recipee['p_title'].'</h4>
        <p>'.$date.'</p>
        </div>
        </div>
        <hr class="margin-hr">
        ';
      }
    }
    // /latest recipes results
    // /latest recipes
    ?>
  <?php endif; ?>
</div>
