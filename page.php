<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  if (is_page('contact-us')) {
    require 'connect.php';
    if (isset($_POST['submit-message'])) {
      $mailfrom = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

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
      $mail->setFrom($mailfrom);
      $mail->addAddress('vesko@planetcar.me');
      $mail->Subject = $subject;
      $mail->Body = $message;
      if ($mail->send()) {
        header("Location: http://localhost/wordpress/wordpress/contact-us-sent/");
      }else
      echo "Something wrong happend! Please try agin!";
    }
  }

  if (is_page('contact-us-sent')) {
    header("Refresh:2; url='http://localhost/wordpress/wordpress/contact-us/'");
  }

  if (is_page('send')) {
    if (isset($_SESSION['u_id']) == '2') {
      require 'connect.php';
      if (isset($_POST['send'])) {

        $users = mysqli_query($conn, "SELECT email FROM subscribers");

        $results = mysqli_fetch_all($users, MYSQLI_ASSOC);
        foreach ($results as $result) {
          $mails = $result['email'];
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
          $mail->addAddress($mails);
          $subject = $_POST['subject'];
          $mail->Subject = $subject;
          $message = $_POST['message'];
          $a = "<br><br><p>If you want to remove us from newsletter click this link<a href='http://localhost/wordpress/wordpress/remove-news-letter/?email=$mails'>Remove Us From Newsletter</a></p>";
          $mail->Body = "$message $a";
          if ($mail->send()) {
            echo "Your message is sent to $mails<br><br>";
          }else
          echo "Something wrong happend! Please try agin!";

        }
      }
    } else {
      header("Location: http://localhost/wordpress/wordpress/");
    }
  }

  ?>

  <!-- title and find recipes section -->
  <?php get_template_part('find-recipes') ?>
  <!-- /title and find-recipes section -->

</section>

<?php the_content(); ?>

<?php endwhile;

else :
  echo '<p> No content found</p>';

endif;

get_footer();
?>
