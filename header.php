<?php
session_start();
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name') ?></title>
    <link href="css/flexboxgrid.css">
    <link href="/css/fancySelect.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:i" rel="stylesheet">
    <?php wp_head(); ?>
    <?php require 'connect.php'; $p_id = mysqli_real_escape_string($conn, $_GET['p_id']); ?>
    <script language="javascript" type="text/javascript">
	// <![CDATA[
  var p_id = '<?php echo $p_id; ?>';
        // ]]>
	</script>
  </head>

  <body <?php body_class(); ?>>
    <!-- LEFT SIDE NAVIGATION FOR MOBILE -->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="http://localhost/wordpress/wordpress/">Home</a>
  <a href="http://localhost/wordpress/wordpress/recent-recipes">Recent Recipes</a>
  <a href="http://localhost/wordpress/wordpress/popular-recipes">Popular Recipes</a>
  <a href="http://localhost/wordpress/wordpress/most_rated-recipes">Most Rated Recipes</a>
  <a href="http://localhost/wordpress/wordpress/contact">Contact Us</a>
  </div>

  <!-- RIGHT SIDE NAVIGATION FOR MOBILE -->
  <div id="mySidenav2" class="sidenav2">
  <a href="javascript:void(0)" class="closebtn" onclick="closeProfile()">&times;</a>
  <?php if (isset($_SESSION['u_id'])) {
  echo '<a href="http://localhost/wordpress/wordpress/user">My Profile</a>
  <a href="http://localhost/wordpress/wordpress/my-recipes">My Recipes</a>
  <a href="http://localhost/wordpress/wordpress/logout">Logout</a>';
  } else {
  echo '<a href="http://localhost/wordpress/wordpress/login">Login</a>
  <a href="http://localhost/wordpress/wordpress/register">Register</a>';
  }
  ?>
  </div>

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>

    <div id="immage">
    <header>
    <div class="container">
      <div class="row  center-xs start-sm start-md start-lg middle-xs middle-sm middle-md middle-lg">
        <!-- login/register section -->
        <?php if (!isset($_SESSION['u_id'])) {
          echo'
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="remove-padding">
          ';
          if (is_page('')) {
          echo '<img src="../wp-content/uploads/2018/04/logo.png" width="150px" alt="Food Taste">';
        } else {
          echo '<img src="wp-content/uploads/2018/04/logo.png" width="150px" alt="Food Taste">';
        }
        echo'
          </div>
          <div class="col-xs-7 col-sm-5 col-md-6 col-lg-5" style="padding-left: 0;">
          <div class="welcome-line" style="text-align:center;">
          <h2>Welcome To Food and Taste</h2>
          <hr>
          </div>
          </div>
          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
          </div>
          <div class="col-xs-12 col-sm-3 col-md-2 col-lg-3" style="padding-right: 0; text-align: right;">
          <div class="soci">
          <p style="display: inline;">Follow Us:&nbsp;&nbsp;</p>
          <li><a href="http://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="http://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          </div>
          <input type="button" name="login" id="login" value="Login">
          <input type="button" name="register" id="register" value="Register">
          </div>
          ';
          // /login/register section
        } else {
          // user section
          require 'connect.php';
          $u_id = $_SESSION['u_id'];
          $getnamenow = mysqli_query($conn, "SELECT u_name FROM users WHERE u_id=$u_id");
          while ($getnamenow2 = mysqli_fetch_assoc($getnamenow)) {
            $u_name = $getnamenow2['u_name'];
            echo '
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2" id="remove-padding">
            ';
            if (is_page('')) {
              echo'
            <img src="../wp-content/uploads/2018/04/logo.png" width="150px" alt="Food Taste">
            ';
          } else {
            echo '<img src="wp-content/uploads/2018/04/logo.png" width="150px" alt="Food Taste">';
          }
          echo '
            </div>
            <div class="col-xs-7 col-sm-5 col-md-6 col-lg-7" id="remove-padding">
            <div class="welcome-line" style="text-align:center;">
            <h2>Welcome To Food and Taste</h2>
            <hr>
            </div>
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" id="remove-padding">
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2" style="padding-right: 0; text-align: right;">
            <div class="soci">
            <p style="display: inline;">Follow Us:&nbsp;&nbsp;</p>
            <li><a href="http://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="http://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </div>
            <form method="post">
            <div class="profile-name"  onclick="myFunction()">
            <p style="display: inline;"><i class="fa fa-user"></i>'.$u_name.'</p>
            <div id="myDropdown" class="dropdown-content">
            <li><a href="user"><i class="fa fa-user"></i>My Profile</a></li>
            <li><a href="my-recipes"><i class="fa fa-cutlery"></i>My Recipes</a></li>
            <li><a href="logout"><i class="fa fa-sign-out"></i>Logout</a></li>
            </div>
            </div>
            </form>
            </div>';
          }
        }
        ?>
        <!-- /user section -->
      </div>
    </div>
  </header>
  <?php if (is_page('')){ ?>
    <section id="header-image">
  <?php }?>
  <!-- navigation-bar -->
<div class="navigation-bar">
  <div class="container">
    <!-- navigation -->
    <div class="row start-sm start-md start-lg start-xs" style="margin:0;">
      <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10" id="remove-padding">
        <nav id="navbar" class="stroke">
          <?php
          $args = array(
            'theme_location' => 'primary'
          )
           ?>
        <?php wp_nav_menu( $args ); ?>
        </nav>
      </div>
      <!-- submit recipe button -->
      <div class="col-xs-2 col-sm-3 col-md-2 col-lg-2" id="submit-nav">
        <button type="button" onclick="window.location.href='http://localhost/wordpress/wordpress/submit-recipe/'" id="submit-recipe-button" name="button">Submit Recipe</button>
      </div>
      <!-- /submit recipe button -->
    </div>
    <!-- /navigation -->
    <!-- navigation icons for mobile -->
    <div class="row start-xs start-sm start-md start-lg" id="navbar-xs">
      <!-- left navigation icon -->
      <div class="col-xs-2 button-responsive">
        <span class="fa-stack fa-1x">
          <i class="fa fa-circle-thin fa-stack-2x"></i>
          <i class="fa fa-bars fa-stack-1x" onclick="openNav()"></i>
        </span>
      </div>
      <!-- /left navigation icon -->
      <!-- logo -->
      <div class="col-xs-8 logo-icon">
        <?php if (is_page('')){
          echo '
            <img src="../wp-content/uploads/2018/04/logo-xs.png" alt="">
            ';
          } else {
            echo '<img src="wp-content/uploads/2018/04/logo-xs.png" alt="">';
          }
          ?>
      </div>
      <!-- /logo -->
      <!-- right navigation icon -->
      <div class="col-xs-2 right-navigation-icon">
        <span class="fa-stack fa-1x">
          <i class="fa fa-circle-thin fa-stack-2x"></i>
          <i class="fa fa-user fa-stack-1x" onclick="openProfile()"></i>
        </span>
      </div>
      <!-- /right navigation icon -->
    </div>
    <!-- /navigation for mobile -->
  </div>
</div>
<!-- /navigation bar -->
