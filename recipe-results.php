<?php
if (!defined('recipe-results')) {
  exit();
}
?>
<?php
if (round($article->rating) == 0) {
  echo '
  <div class="row center-xs around-sm start-md start-lg" id="recent-recipes-row">
  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 snip1190" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/'.$article->image_upload.'" style="width: 100%; height: 100%;" alt=""></a>
  <a href="recipe-details?p_id='.$article->p_id.'"><figcaption>
  <h2>See Recipe</h2>
  </figcaption></a>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9" style="padding: 0;">
  <div class="description1">
  <div class="description3" id="recent-recipes-description3">
  <h2 style="margin-top: 0;">'. $article->p_title .'</h2>
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" style="padding: 0;">
  <hr id="line-recent-recipes">
  </div>
  <p style="padding-right: 1px;">'. $article->p_short .'</p>
  <div class="row center-xs around-sm start-md start-lg">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" style="padding: 0;">
  <p id="user-p-recent-recipes" style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$article->p_author.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding: 0;">
  <p id="date-p-recent-recipes"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$date.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="recent-recipes-rating" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <p style="display: inline;">('.round($article->rating).'/5)</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  ';
}

if (round($article->rating) == 1) {
  echo '
  <div class="row center-xs around-sm start-md start-lg" id="recent-recipes-row">
  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 snip1190" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/'.$article->image_upload.'" style="width: 100%; height: 100%;" alt=""></a>
  <a href="recipe-details?p_id='.$article->p_id.'"><figcaption>
  <h2>See Recipe</h2>
  </figcaption></a>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9" style="padding: 0;">
  <div class="description1">
  <div class="description3" id="recent-recipes-description3">
  <h2 style="margin-top: 0;">'. $article->p_title .'</h2>
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" style="padding: 0;">
  <hr id="line-recent-recipes">
  </div>
  <p style="padding-right: 1px;">'. $article->p_short .'</p>
  <div class="row center-xs around-sm start-md start-lg">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" style="padding: 0;">
  <p id="user-p-recent-recipes" style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$article->p_author.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding: 0;">
  <p id="date-p-recent-recipes"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$date.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="recent-recipes-rating" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <p style="display: inline;">('.round($article->rating).'/5)</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  ';
}
if (round($article->rating) == 2) {
  echo '
  <div class="row center-xs around-sm start-md start-lg" id="recent-recipes-row">
  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 snip1190" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/'.$article->image_upload.'" style="width: 100%; height: 100%;" alt=""></a>
  <a href="recipe-details?p_id='.$article->p_id.'"><figcaption>
  <h2>See Recipe</h2>
  </figcaption></a>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9" style="padding: 0;">
  <div class="description1">
  <div class="description3" id="recent-recipes-description3">
  <h2 style="margin-top: 0;">'. $article->p_title .'</h2>
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" style="padding: 0;">
  <hr id="line-recent-recipes">
  </div>
  <p style="padding-right: 1px;">'. $article->p_short .'</p>
  <div class="row center-xs around-sm start-md start-lg">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" style="padding: 0;">
  <p id="user-p-recent-recipes" style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$article->p_author.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding: 0;">
  <p id="date-p-recent-recipes"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$date.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="recent-recipes-rating" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <p style="display: inline;">('.round($article->rating).'/5)</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  ';
}
if (round($article->rating) == 3) {
  echo '
  <div class="row center-xs around-sm start-md start-lg" id="recent-recipes-row">
  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 snip1190" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/'.$article->image_upload.'" style="width: 100%; height: 100%;" alt=""></a>
  <a href="recipe-details?p_id='.$article->p_id.'"><figcaption>
  <h2>See Recipe</h2>
  </figcaption></a>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9" style="padding: 0;">
  <div class="description1">
  <div class="description3" id="recent-recipes-description3">
  <h2 style="margin-top: 0;">'. $article->p_title .'</h2>
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" style="padding: 0;">
  <hr id="line-recent-recipes">
  </div>
  <p style="padding-right: 1px;">'. $article->p_short .'</p>
  <div class="row center-xs around-sm start-md start-lg">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" style="padding: 0;">
  <p id="user-p-recent-recipes" style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$article->p_author.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding: 0;">
  <p id="date-p-recent-recipes"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$date.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="recent-recipes-rating" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <p style="display: inline;">('.round($article->rating).'/5)</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  ';
}
if (round($article->rating) == 4) {
  echo '
  <div class="row center-xs around-sm start-md start-lg" id="recent-recipes-row">
  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 snip1190" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/'.$article->image_upload.'" style="width: 100%; height: 100%;" alt=""></a>
  <a href="recipe-details?p_id='.$article->p_id.'"><figcaption>
  <h2>See Recipe</h2>
  </figcaption></a>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9" style="padding: 0;">
  <div class="description1">
  <div class="description3" id="recent-recipes-description3">
  <h2 style="margin-top: 0;">'. $article->p_title .'</h2>
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" style="padding: 0;">
  <hr id="line-recent-recipes">
  </div>
  <p style="padding-right: 1px;">'. $article->p_short .'</p>
  <div class="row center-xs around-sm start-md start-lg">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" style="padding: 0;">
  <p id="user-p-recent-recipes" style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$article->p_author.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding: 0;">
  <p id="date-p-recent-recipes"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$date.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="recent-recipes-rating" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish3.png" alt="" style="width: 20px;">
  <p style="display: inline;">('.round($article->rating).'/5)</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  ';
}
if (round($article->rating) == 5) {
  echo '
  <div class="row center-xs around-sm start-md start-lg" id="recent-recipes-row">
  <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 snip1190" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/'.$article->image_upload.'" style="width: 100%; height: 100%;" alt=""></a>
  <a href="recipe-details?p_id='.$article->p_id.'"><figcaption>
  <h2>See Recipe</h2>
  </figcaption></a>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9" style="padding: 0;">
  <div class="description1">
  <div class="description3" id="recent-recipes-description3">
  <h2 style="margin-top: 0;">'. $article->p_title .'</h2>
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" style="padding: 0;">
  <hr id="line-recent-recipes">
  </div>
  <p style="padding-right: 1px;">'. $article->p_short .'</p>
  <div class="row center-xs around-sm start-md start-lg">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" style="padding: 0;">
  <p id="user-p-recent-recipes" style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;'.$article->p_author.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding: 0;">
  <p id="date-p-recent-recipes"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$date.'</p>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="recent-recipes-rating" style="padding: 0;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <img src="../wp-content/uploads/2018/04/dish.png" alt="" style="width: 20px;">
  <p style="display: inline;">('.round($article->rating).'/5)</p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  ';
}
?>
