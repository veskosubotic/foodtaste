<?php

/*
Template Name: Login-Register Template
*/

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  // DATABASE CONNECT
require 'connect.php';

// SIDEBAR RECIPES
require 'sidebar-recipes.php';

if (is_page('login')) {
  $check_email = "";
$check_password = "";
if (!isset($_SESSION['u_id'])) {
  if (isset($_POST['user-login'])) {
    $u_email = $conn->real_escape_string($_POST['u_email']);
    $u_password = $conn->real_escape_string($_POST['u_password']);
    if ($u_email == "" || $u_password =="")
    $check_email = "Please check your inputs!";
    else {
      $sql = $conn->query("SELECT * FROM users WHERE u_email='$u_email'");
      if ($sql->num_rows > 0){
        $data = $sql->fetch_array();
        if ($u_password == $data['u_password']) {
          if ($data['u_email_confirmed'] == 0)
          $verify = "Please Verify ";
          else {
            $_SESSION['u_id'] = $data['u_id'];
            $a = $data['u_id'];
            header("Location: http://localhost/wordpress/wordpress/");
            exit();
          }
        } else {
          $check_password = "Please Check ";
        }
      } else {
        $check_email = "Please Check ";
      }
    }
  }
}
else {
header("Location: http://localhost/wordpress/wordpress/");
}
}

if (is_page('register')) {
  if (!isset($_SESSION['u_id'])) {
require 'connect.php';
  if (isset($_POST['submit-your-registration'])) {
    $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
    $u_about = mysqli_real_escape_string($conn, $_POST['u_about']);
    $u_email = mysqli_real_escape_string($conn, $_POST['u_email']);
    $u_password = mysqli_real_escape_string($conn, $_POST['u_password']);
    $u_cpassword = mysqli_real_escape_string($conn, $_POST['u_cpassword']);
    $secretKey = "6LfXszgUAAAAAHFz8wTD_RbsDTdPP8luCv9nrUA9";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success) {
      $sql = $conn->query("SELECT u_id FROM users WHERE u_email='$u_email'");
      if ($sql->num_rows > 0)
      echo "Email already exist in the database!";
      else {
        $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890$!*';
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);

        $conn->query("INSERT INTO users (u_name, u_about, u_email, u_email_confirmed, token, u_password, u_cpassword, u_picture) VALUES ('$u_name', '$u_about', '$u_email', '0', '$token', '$u_password', '$u_cpassword','chefs.jpg');");
        include_once "PHPMailer/PHPMailerAutoload.php";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = 'mail.planetcar.me ';
        $mail->Port = 465;
        $mail->Username = 'vesko@planetcar.me';
        $mail->ContentType ='text/html';
        $mail->Password = '123456v';
        $mail->setFrom('vesko@planetcar.me');
        $mail->addAddress($u_email);
        $mail->Subject = 'Confirm Registration';
        $message = 'In order to be registered on our Website you must confirm your registration by clicking this link <a href="http://localhost/wordpress/wordpress/confirm/?u_email='.$u_email.'&token='.$token.'">Confirm Your Registration</a>';
        $mail->Body = $message;

        if ($mail->send()) {
          header("Location: http://localhost/wordpress/wordpress/register-sent/?u_email=$u_email");
        }else
        echo "Something wrong happend! Please try agin!";
      }
    }
  }
}else {
  header("Location: http://localhost/wordpress/wordpress/");
}
}

if (is_page('register-sent')) {
  if (!isset($_SESSION['u_id'])) {
  $u_email = mysqli_real_escape_string($conn, $_GET['u_email']);
} else {
  header("Location: http://localhost/wordpress/wordpress/");
}
}

if (is_page('forgot-password')) {
  if (!isset($_SESSION['u_id'])) {
  if (isset($_POST["forgotpassword"])) {
  $u_email = $conn->real_escape_string($_POST["u_email"]);
  $data = $conn->query("SELECT u_id FROM users WHERE u_email='$u_email'");
  if ($data->num_rows > 0) {
    $str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
    $str = str_shuffle($str);
    $str = substr($str, 0, 10);
    include_once "PHPMailer/PHPMailerAutoload.php";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'mail.planetcar.me ';
    $mail->Port = 465;
    $mail->Username = 'vesko@planetcar.me';
    $mail->ContentType ='text/html';
    $mail->Password = '123456v';
    $mail->setFrom('vesko@planetcar.me');
    $mail->addAddress($u_email);
    $mail->Subject = 'Reset Your Password';
    $message = "<p>To Reset Password Click <a href='http://localhost/wordpress/wordpress/reset-password/?token=$str&u_email=$u_email'>Reset Password</a>";
    $mail->Body = $message;

    if ($mail->send()) {
      $conn->query("UPDATE users SET token='$str' WHERE u_email='$u_email'");
      header("Location: http://localhost/wordpress/wordpress/forgot-password-sent/?u_email=$u_email");
    }else
    echo "Something wrong happend! Please try agin!";
}
}
} else {
  header("Location: http://localhost/wordpress/wordpress/");
}
}

if (is_page('forgot-password-sent')) {
  if (!isset($_SESSION['u_id'])) {
$u_email = mysqli_real_escape_string($conn, $_GET['u_email']);
} else {
  header("Location: http://localhost/wordpress/wordpress/");
}
}

if (is_page('reset-password')) {
  if (!isset($_SESSION['u_id'])){
  $u_email = mysqli_real_escape_string($conn, $_GET['u_email']);
  $token = mysqli_real_escape_string($conn, $_GET['token']);
  $u_password = $_POST['u_password'];
  if (isset($_POST['resetpassword'])) {
    $reset = mysqli_query($conn, "UPDATE users SET u_password='$u_password' WHERE token='$token' AND u_email='$u_email'");
    header("Location: http://localhost/wordpress/wordpress/reset-password-update");
  }
} else {
  header("Location: http://localhost/wordpress/wordpress/");
}
}

?>

<!-- title and find recipes section -->
<?php get_template_part('find-recipes') ?>
<!-- /title and find-recipes section-->

</section>

<?php if (is_page('login')): ?>
<!-- LOGIN SECTION -->
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg" id="widh">
      <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h3>User Login Form</h3>
          </div>
          <hr>
        </div>
        <div class="submit-recipe-form">
          <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
            <label><?php echo  $verify; ?><?php if ($check_email != "") echo $check_email?>Your Email</label>
            <input class="form-control" name="u_email" type="email"><br>
            <label><?php if ($check_password != "") echo $check_password?>Your Password</label>
            <input class="form-control" name="u_password" id="password" type="password"><br>
            <button class="btn btn-primary" type="submit" name="user-login">Login</button>
            <li class="forgotpassword"><p class="forgotpassword">or</p><a href="http://localhost/wordpress/wordpress/forgot-password">Forgot Password ?</a></li>
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
  <!-- /LOGIN SECTION -->

  <?php endif; ?>

<?php if (is_page('register')): ?>

  <!-- REGISTER FORM SECTION -->
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg" id="widh">
      <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
        <div class="recipe-title-content">
          <div class="recipe-title">
            <h3>User Registration Form</h3>
          </div>
          <hr>
        </div>
        <div class="submit-recipe-form">
          <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
            <label>Your Name</label>
            <input class="form-control" type="text" name="u_name"><br>
            <p>*You must enter at least 4 charachters!</p>
            <label>About You</label>
            <textarea name="u_about"></textarea><br>
            <p>*You must enter at least 250 charachters!</p>
            <label>Your Email</label>
            <input class="form-control" type="text" name="u_email" type="email"><br>
            <label>Your Password</label>
            <input class="form-control" name="u_password" id="password" type="password"><br>
            <label>Confirm Password</label>
            <input class="form-control" name="u_cpassword" type="password"><br>
            <div class="g-recaptcha" name="g_recaptcha" data-sitekey="6LfXszgUAAAAAE9ntj7MytkxeKKbu-rcY7-Am6Ld"></div>
            <button class="btn btn-primary" type="submit" name="submit-your-registration" style="display: block; margin: auto;">Register</button>
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
  <!-- /REGISTER FORM SECTION -->

  <?php endif; ?>

  <?php if (is_page('register-sent')): ?>

    <!-- REGISTER SENT FORM SECTION -->
    <div class="container">
      <div class="row center-xs start-sm start-md start-lg" id="widh">
        <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
          <div class="recipe-title-content">
            <div class="recipe-title">
              <h3>User Registration Form</h3>
            </div>
            <hr>
          </div>
          <div class="submit-recipe-form">
            <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
              <p>We sent an email to <b><?php echo $u_email; ?></b> to confirm your registration. Please check your inbox!</p>
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
    <!-- /REGISTER SENT FORM SECTION -->

    <?php endif; ?>

  <?php if (is_page('forgot-password')): ?>

    <!-- FORGOT PASSWORD SECTION -->
  <div class="container">
    <div class="row center-xs start-sm start-md start-lg" id="widh">
      <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
        <div class="row center-xs start-sm start-md middle-xs middle-sm middle-md middle-lg" style="padding-top: 30px; padding-bottom: 28px;">
          <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3" id="remove-padding">
            <h3>Forgot Your Password</h3>
          </div>
          <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9" id="remove-padding">
            <hr>
          </div>
        </div>
        <div class="submit-recipe-form">
          <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
            <label>Your Email</label>
            <input class="form-control" type="text" name="u_email" type="email"><br>
            <button type="submit" name="forgotpassword">Send</button>
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
  <!-- /FORGOT PASSWORD SECTION -->

    <?php endif; ?>

    <?php if (is_page('forgot-password-sent')): ?>

      <!-- FORGOT PASSWORD SENT SECTION -->
    <div class="container">
      <div class="row center-xs start-sm start-md start-lg" id="widh">
        <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
          <div class="row center-xs start-sm start-md middle-xs middle-sm middle-md middle-lg" style="padding-top: 30px; padding-bottom: 28px;">
            <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3" id="remove-padding">
              <h3>Forgot Your Password</h3>
            </div>
            <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9" id="remove-padding">
              <hr>
            </div>
          </div>
          <div class="submit-recipe-form">
            <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
              <p>We sent you an email to <b><?php echo $u_email; ?></b> to reset your password. Please check your inbox!</p>
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
    <!-- /FORGOT PASSWORD SENT SECTION -->

      <?php endif; ?>

    <?php if (is_page('reset-password')): ?>

      <!-- RESET PASSWORD SECTION -->
    <div class="container">
      <div class="row center-xs start-sm start-md start-lg" id="widh">
        <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
          <div class="row center-xs start-sm start-md middle-xs middle-sm middle-md middle-lg" style="padding-top: 30px; padding-bottom: 28px;">
            <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3" id="remove-padding">
              <h3>Reset Your Password</h3>
            </div>
            <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9" id="remove-padding">
              <hr>
            </div>
          </div>
          <div class="submit-recipe-form">
            <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
              <label>New Password</label>
              <input class="form-control" type="text" name="u_password" type="password"><br>
              <button type="submit" name="resetpassword">Reset</button>
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
    <!-- /RESET PASSWORD SECTION -->

      <?php endif; ?>

      <?php if (is_page('reset-password-update')): ?>

        <!-- RESET PASSWORD UPDATE SECTION -->
      <div class="container">
        <div class="row center-xs start-sm start-md start-lg" id="widh">
          <div class="col-xs-10 col-sm-12 col-md-9 col-lg-9" id="remove-padding">
            <div class="row center-xs start-sm start-md middle-xs middle-sm middle-md middle-lg" style="padding-top: 30px; padding-bottom: 28px;">
              <div class="col-xs-8 col-sm-3 col-md-3 col-lg-3" id="remove-padding">
                <h3>Reset Your Password</h3>
              </div>
              <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9" id="remove-padding">
                <hr>
              </div>
            </div>
            <div class="submit-recipe-form">
              <form class="submit-form" id="registerform" method="post" style="padding-top: 20px; padding-bottom: 10px;">
                <p>You successfully reset your password. You can now <b><a style="text-decoration: none;"href="http://localhost/wordpress/wordpress/login/">login</a></b> to our website!</p>
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
      <!-- /RESET PASSWORD UPDATE SECTION -->

        <?php endif; ?>

  <?php the_content(); ?>

<?php endwhile;

else :
  echo '<p> No content found</p>';

endif;

get_footer();
 ?>
