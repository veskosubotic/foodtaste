<?php

// DATABASE CONNECT
require 'connect.php';

// /NEWSLETTER

if (isset($_POST['email'])) {
  $email = $_POST['email'];

  $result = mysqli_query($conn, "INSERT INTO subscribers (email) VALUES ('$email')");
}

// /NEWSLETTER
?>

<!-- footer for large screens -->
<footer id="footer" class="footer-lg">
  <div class="container">
    <div class="row center-xs center-sm center-md center-lg">
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <?php if (is_page('')): ?>
          <img src="../wp-content/uploads/2018/04/logo.png" width="150px" alt="">
        <?php else: ?>
          <img src="wp-content/uploads/2018/04/logo.png" width="150px" alt="">
        <?php endif; ?>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
      </div>
    </div>
    <div class="row center-xs center-sm start-md start-lg" style="padding-top:20px; width: 70%; margin: auto;">
      <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="bord2">
        <h2>Newsletter Signup</h2>
      </div>
      <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="bord3">
        <h2>Get Social With Us</h2>
      </div>
      <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="enter-email">
        <?php if (is_page('')): ?>
          <form method="post">
            <input type="text" name="email" placeholder="Enter your email adress" style="background-image: url('../wp-content/uploads/2018/04/paper.png'); background-size: 20px; background-position: 97% 50%; background-repeat: no-repeat;">
          </form>
        <?php else: ?>
          <form method="post">
            <input type="text" name="email" placeholder="Enter your email adress" style="background-image: url('wp-content/uploads/2018/04/paper.png'); background-size: 20px; background-position: 97% 50%; background-repeat: no-repeat;">
          </form>
        <?php endif; ?>
      </div>
      <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="social-icons">
        <ul>
          <?php if (is_page('')): ?>
            <li><a href="http://www.facebook.com"><img src="../wp-content/uploads/2018/04/socialm.png" width="40px"></a></li>
            <li><a href="http://www.twitter.com>"><img src="../wp-content/uploads/2018/04/socialt.png" width="40px"></a></li>
            <li><a href="http://www.instagram.com"><img src="../wp-content/uploads/2018/04/sociali.png" width="40px"></a></li>
          <?php else: ?>
            <li><a href="http://www.facebook.com"><img src="wp-content/uploads/2018/04/socialm.png" width="40px"></a></li>
            <li><a href="http://www.twitter.com>"><img src="wp-content/uploads/2018/04/socialt.png" width="40px"></a></li>
            <li><a href="http://www.instagram.com"><img src="wp-content/uploads/2018/04/sociali.png" width="40px"></a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <div class="row center-xs center-sm center-md center-lg" style="padding-top:20px;">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p style="color: #676666;">Copyright 2018.All Rights Reserved by Food Recipe</p>
      </div>
    </div>
  </div>
</footer>
</div>
<!-- /footer for large screens -->
<!-- footer for mobile -->
<footer id="footer" class="footer-xs">
  <div class="container">
    <div class="row center-xs center-sm center-md center-lg">
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <?php if (is_page('')): ?>
          <img src="../wp-content/uploads/2018/04/logo.png" width="150px" alt="">
        <?php else: ?>
          <img src="wp-content/uploads/2018/04/logo.png" width="150px" alt="">
        <?php endif; ?>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
      </div>
    </div>
    <div class="row center-xs center-sm center-md center-lg" style="padding-top:20px;">
      <div class="col-xs-7 col-sm-5 col-md-4 col-lg-4" id="bord2">
        <h2>Newsletter Signup</h2>
        <?php if (is_page('')): ?>
          <form method="post">
            <input type="text" name="email" placeholder="Enter your email adress" style="background-image: url('../wp-content/uploads/2018/04/paper.png'); background-size: 20px; background-position: 97% 50%; background-repeat: no-repeat;">
          </form>
        <?php else: ?>
          <form method="post">
            <input type="text" name="email" placeholder="Enter your email adress" style="background-image: url('wp-content/uploads/2018/04/paper.png'); background-size: 20px; background-position: 97% 50%; background-repeat: no-repeat;">
          </form>
        <?php endif; ?>      </div>
        <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4" id="bord">
          <h2>Get Social With Us</h2>
          <ul>
            <?php if (is_page('')): ?>
              <li><a href="http://www.facebook.com"><img src="../wp-content/uploads/2018/04/socialm.png" width="40px"></a></li>
              <li><a href="http://www.twitter.com>"><img src="../wp-content/uploads/2018/04/socialt.png" width="40px"></a></li>
              <li><a href="http://www.instagram.com"><img src="../wp-content/uploads/2018/04/sociali.png" width="40px"></a></li>
            <?php else: ?>
              <li><a href="http://www.facebook.com"><img src="wp-content/uploads/2018/04/socialm.png" width="40px"></a></li>
              <li><a href="http://www.twitter.com>"><img src="wp-content/uploads/2018/04/socialt.png" width="40px"></a></li>
              <li><a href="http://www.instagram.com"><img src="wp-content/uploads/2018/04/sociali.png" width="40px"></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="row center-xs center-sm center-md center-lg" style="padding-top:20px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p style="color: #676666;">Copyright 2018.All Rights Reserved by Food Recipe</p>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- /footer for mobile -->
<?php wp_footer(); ?>
</body>
</html>
