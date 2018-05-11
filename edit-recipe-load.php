<?php

if (!defined('edit-recipe-load')) {
  exit();
}
?>

<?php

$p_id = mysqli_real_escape_string($conn, $_GET['p_id']);

$query = "SELECT * FROM p_recipe WHERE p_id=$p_id";

$result = mysqli_query($conn, $query);

$edit_p_recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$querys = "SELECT p_ingredients, p_ingredients1, p_ingredients2, p_ingredients3, p_ingredients4, p_ingredients5, p_ingredients6, p_ingredients7, p_ingredients8, p_ingredients9, p_ingredients10, p_ingredients11, p_ingredients12, p_ingredients13, p_ingredients14, p_ingredients15, p_ingredients16, p_ingredients17, p_ingredients18,
p_ingredients19, p_ingredients20, p_ingredients21, p_ingredients22, p_ingredients23, p_ingredients24, p_ingredients26, p_ingredients27, p_ingredients28, p_ingredients29, p_ingredients30, p_ingredients31, p_ingredients32, p_ingredients33, p_ingredients34, p_ingredients35, p_ingredients36, p_ingredients37, p_ingredients38, p_ingredients39, p_ingredients40,
p_ingredients41, p_ingredients42, p_ingredients43, p_ingredients44, p_ingredients45, p_ingredients46, p_ingredients47, p_ingredients48, p_ingredients49, p_ingredients50 FROM ingredients WHERE id='$p_id'";

$resulti = mysqli_query($conn, $querys);

$edit_p_recipe_ingredients = mysqli_fetch_assoc($resulti);

$queryss = "SELECT p_steps,p_steps1,p_steps2,p_steps3,p_steps4,p_steps5,p_steps6,p_steps7,p_steps8,p_steps9,p_steps10,p_steps11,p_steps12,p_steps13,p_steps14 FROM steps WHERE id='$p_id'";

$results = mysqli_query($conn, $queryss);

$edit_p_recipe_steps = mysqli_fetch_assoc($results);

$querysss = "SELECT image_upload1,image_upload2,image_upload3,image_upload4,image_upload5,image_upload6,image_upload7,image_upload8,image_upload9,image_upload10,image_upload11,image_upload12,image_upload13,image_upload14,image_upload15 FROM image WHERE id='$p_id'";

$resulti = mysqli_query($conn, $querysss);

$edit_p_recipe_images = mysqli_fetch_assoc($resulti);

$session_id = $_SESSION['u_id'];

$queryssss = "SELECT u_name FROM users WHERE u_id=$session_id";

$resultis = mysqli_query($conn, $queryssss);

$users = mysqli_fetch_all($resultis, MYSQLI_ASSOC);

foreach ($users as $user) {
  $user_name = $user['u_name'];
  $sql = "SELECT * FROM p_recipe WHERE p_id=$p_id";

  $result = mysqli_query($conn, $sql);

  while($p_authors = mysqli_fetch_all($result, MYSQLI_ASSOC)){
    foreach ($p_authors as $p_authorss) {
      $p_author = $p_authorss['p_author'];
      if ($user_name == $p_author) {
      }
      else {
        exit();
      }
    }
  }
}

if (isset($_POST['update_title'])) {
  $p_title = $_POST['p_title'];
  $sql2 = "UPDATE p_recipe SET p_title='$p_title' WHERE p_id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}

if (isset($_POST['update_short'])) {
  $p_short = $_POST['p_short'];
  $sql2 = "UPDATE p_recipe SET p_short='$p_short' WHERE p_id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}

if (isset($_POST['update_image'])) {
  if (isset($_FILES['image_upload']['name']) && ($_FILES['image_upload']['name'] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload FROM p_recipe WHERE p_id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload'];
      $size = $_FILES['image_upload']['size'];
      $temp = $_FILES['image_upload']['tmp_name'];
      $type = $_FILES['image_upload']['type'];
      $profile_name = $_FILES['image_upload']['name'];
      $recipe_image = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$recipe_image");
    }
  }
  else {
    $recipe_image = $pic;
  }
  $update = mysqli_query($conn, "UPDATE p_recipe SET image_upload='$recipe_image' WHERE p_id='$p_id'");
  header("Refresh: 0.5");
}

if (isset($_POST['update_ingredients'])) {
  $p_ingredients = $_POST['p_ingredients'];
  $sql2 = "UPDATE ingredients SET p_ingredients='$p_ingredients' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");

}

if (isset($_POST['update_ingredients1'])) {
  $p_ingredients1 = $_POST['p_ingredients1'];
  $sql2 = "UPDATE ingredients SET p_ingredients1='$p_ingredients1' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients2'])) {
  $p_ingredients2 = $_POST['p_ingredients2'];
  $sql2 = "UPDATE ingredients SET p_ingredients2='$p_ingredients2' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients3'])) {
  $p_ingredients3 = $_POST['p_ingredients3'];
  $sql2 = "UPDATE ingredients SET p_ingredients3='$p_ingredients3' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients4'])) {
  $p_ingredients4 = $_POST['p_ingredients4'];
  $sql2 = "UPDATE ingredients SET p_ingredients4='$p_ingredients4' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients5'])) {
  $p_ingredients5 = $_POST['p_ingredients5'];
  $sql2 = "UPDATE ingredients SET p_ingredients5='$p_ingredients5' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients6'])) {
  $p_ingredients6 = $_POST['p_ingredients6'];
  $sql2 = "UPDATE ingredients SET p_ingredients6='$p_ingredients6' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients7'])) {
  $p_ingredients7 = $_POST['p_ingredients7'];
  $sql2 = "UPDATE ingredients SET p_ingredients7='$p_ingredients7' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients8'])) {
  $p_ingredients8 = $_POST['p_ingredients8'];
  $sql2 = "UPDATE ingredients SET p_ingredients8='$p_ingredients8' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients9'])) {
  $p_ingredients9 = $_POST['p_ingredients9'];
  $sql2 = "UPDATE ingredients SET p_ingredients9='$p_ingredients9' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients10'])) {
  $p_ingredients10 = $_POST['p_ingredients10'];
  $sql2 = "UPDATE ingredients SET p_ingredients10='$p_ingredients10' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients11'])) {
  $p_ingredients11 = $_POST['p_ingredients11'];
  $sql2 = "UPDATE ingredients SET p_ingredients11='$p_ingredients11' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients12'])) {
  $p_ingredients12 = $_POST['p_ingredients12'];
  $sql2 = "UPDATE ingredients SET p_ingredients12='$p_ingredients12' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients13'])) {
  $p_ingredients13 = $_POST['p_ingredients13'];
  $sql2 = "UPDATE ingredients SET p_ingredients13='$p_ingredients13' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients14'])) {
  $p_ingredients14 = $_POST['p_ingredients14'];
  $sql2 = "UPDATE ingredients SET p_ingredients14='$p_ingredients14' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients15'])) {
  $p_ingredients15 = $_POST['p_ingredients15'];
  $sql2 = "UPDATE ingredients SET p_ingredients15='$p_ingredients15' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients16'])) {
  $p_ingredients16 = $_POST['p_ingredients16'];
  $sql2 = "UPDATE ingredients SET p_ingredients16='$p_ingredients16' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients17'])) {
  $p_ingredients17 = $_POST['p_ingredients17'];
  $sql2 = "UPDATE ingredients SET p_ingredients17='$p_ingredients17' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients18'])) {
  $p_ingredients18 = $_POST['p_ingredients18'];
  $sql2 = "UPDATE ingredients SET p_ingredients18='$p_ingredients18' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients19'])) {
  $p_ingredients19 = $_POST['p_ingredients19'];
  $sql2 = "UPDATE ingredients SET p_ingredients19='$p_ingredients19' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients20'])) {
  $p_ingredients20 = $_POST['p_ingredients20'];
  $sql2 = "UPDATE ingredients SET p_ingredients20='$p_ingredients20' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients21'])) {
  $p_ingredients21 = $_POST['p_ingredients21'];
  $sql2 = "UPDATE ingredients SET p_ingredients21='$p_ingredients21' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients22'])) {
  $p_ingredients22 = $_POST['p_ingredients22'];
  $sql2 = "UPDATE ingredients SET p_ingredients22='$p_ingredients22' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients23'])) {
  $p_ingredients23 = $_POST['p_ingredients23'];
  $sql2 = "UPDATE ingredients SET p_ingredients23='$p_ingredients23' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients24'])) {
  $p_ingredients24 = $_POST['p_ingredients24'];
  $sql2 = "UPDATE ingredients SET p_ingredients24='$p_ingredients24' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients25'])) {
  $p_ingredients25 = $_POST['p_ingredients25'];
  $sql2 = "UPDATE ingredients SET p_ingredients25='$p_ingredients25' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients26'])) {
  $p_ingredients26 = $_POST['p_ingredients26'];
  $sql2 = "UPDATE ingredients SET p_ingredients26='$p_ingredients26' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients27'])) {
  $p_ingredients27 = $_POST['p_ingredients27'];
  $sql2 = "UPDATE ingredients SET p_ingredients27='$p_ingredients27' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients28'])) {
  $p_ingredients28 = $_POST['p_ingredients28'];
  $sql2 = "UPDATE ingredients SET p_ingredients28='$p_ingredients28' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients29'])) {
  $p_ingredients29 = $_POST['p_ingredients29'];
  $sql2 = "UPDATE ingredients SET p_ingredients29='$p_ingredients29' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients30'])) {
  $p_ingredients30 = $_POST['p_ingredients30'];
  $sql2 = "UPDATE ingredients SET p_ingredients30='$p_ingredients30' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients31'])) {
  $p_ingredients31 = $_POST['p_ingredients31'];
  $sql2 = "UPDATE ingredients SET p_ingredients31='$p_ingredients31' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients32'])) {
  $p_ingredients32 = $_POST['p_ingredients32'];
  $sql2 = "UPDATE ingredients SET p_ingredients32='$p_ingredients32' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients33'])) {
  $p_ingredients33 = $_POST['p_ingredients33'];
  $sql2 = "UPDATE ingredients SET p_ingredients33='$p_ingredients33' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients34'])) {
  $p_ingredients34 = $_POST['p_ingredients34'];
  $sql2 = "UPDATE ingredients SET p_ingredients34='$p_ingredients34' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients35'])) {
  $p_ingredients35 = $_POST['p_ingredients35'];
  $sql2 = "UPDATE ingredients SET p_ingredients35='$p_ingredients35' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients36'])) {
  $p_ingredients36 = $_POST['p_ingredients36'];
  $sql2 = "UPDATE ingredients SET p_ingredients36='$p_ingredients36' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients37'])) {
  $p_ingredients37 = $_POST['p_ingredients37'];
  $sql2 = "UPDATE ingredients SET p_ingredients37='$p_ingredients37' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients38'])) {
  $p_ingredients38 = $_POST['p_ingredients38'];
  $sql2 = "UPDATE ingredients SET p_ingredients38='$p_ingredients38' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients39'])) {
  $p_ingredients39 = $_POST['p_ingredients39'];
  $sql2 = "UPDATE ingredients SET p_ingredients39='$p_ingredients39' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients40'])) {
  $p_ingredients40 = $_POST['p_ingredients40'];
  $sql2 = "UPDATE ingredients SET p_ingredients40='$p_ingredients40' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients41'])) {
  $p_ingredients41 = $_POST['p_ingredients41'];
  $sql2 = "UPDATE ingredients SET p_ingredients41='$p_ingredients41' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients42'])) {
  $p_ingredients42 = $_POST['p_ingredients42'];
  $sql2 = "UPDATE ingredients SET p_ingredients42='$p_ingredients42' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients43'])) {
  $p_ingredients43 = $_POST['p_ingredients43'];
  $sql2 = "UPDATE ingredients SET p_ingredients43='$p_ingredients43' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients44'])) {
  $p_ingredients44 = $_POST['p_ingredients44'];
  $sql2 = "UPDATE ingredients SET p_ingredients44='$p_ingredients44' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients45'])) {
  $p_ingredients45 = $_POST['p_ingredients45'];
  $sql2 = "UPDATE ingredients SET p_ingredients45='$p_ingredients45' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients46'])) {
  $p_ingredients46 = $_POST['p_ingredients46'];
  $sql2 = "UPDATE ingredients SET p_ingredients46='$p_ingredients46' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients47'])) {
  $p_ingredients47 = $_POST['p_ingredients47'];
  $sql2 = "UPDATE ingredients SET p_ingredients47='$p_ingredients47' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients48'])) {
  $p_ingredients48 = $_POST['p_ingredients48'];
  $sql2 = "UPDATE ingredients SET p_ingredients48='$p_ingredients48' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients49'])) {
  $p_ingredients49 = $_POST['p_ingredients49'];
  $sql2 = "UPDATE ingredients SET p_ingredients49='$p_ingredients49' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_ingredients50'])) {
  $p_ingredients50 = $_POST['p_ingredients50'];
  $sql2 = "UPDATE ingredients SET p_ingredients50='$p_ingredients50' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}

if (isset($_POST['update_step'])) {
  $p_steps = $_POST['p_steps'];
  $sql2 = "UPDATE steps SET p_steps='$p_steps' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step1'])) {
  $p_steps1 = $_POST['p_steps1'];
  $sql2 = "UPDATE steps SET p_steps1='$p_steps1' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step2'])) {
  $p_steps2 = $_POST['p_steps2'];
  $sql2 = "UPDATE steps SET p_steps2='$p_steps2' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step3'])) {
  $p_steps3 = $_POST['p_steps3'];
  $sql2 = "UPDATE steps SET p_steps3='$p_steps3' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step4'])) {
  $p_steps4 = $_POST['p_steps4'];
  $sql2 = "UPDATE steps SET p_steps4='$p_steps4' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step5'])) {
  $p_steps5 = $_POST['p_steps5'];
  $sql2 = "UPDATE steps SET p_steps5='$p_steps5' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step6'])) {
  $p_steps6 = $_POST['p_steps6'];
  $sql2 = "UPDATE steps SET p_steps6='$p_steps6' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step7'])) {
  $p_steps7 = $_POST['p_steps7'];
  $sql2 = "UPDATE steps SET p_steps7='$p_steps7' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step8'])) {
  $p_steps8 = $_POST['p_steps8'];
  $sql2 = "UPDATE steps SET p_steps8='$p_steps8' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step9'])) {
  $p_steps9 = $_POST['p_steps9'];
  $sql2 = "UPDATE steps SET p_steps9='$p_steps9' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step10'])) {
  $p_steps10 = $_POST['p_steps10'];
  $sql2 = "UPDATE steps SET p_steps10='$p_steps10' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step11'])) {
  $p_steps11 = $_POST['p_steps11'];
  $sql2 = "UPDATE steps SET p_steps11='$p_steps11' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step12'])) {
  $p_steps12 = $_POST['p_steps12'];
  $sql2 = "UPDATE steps SET p_steps12='$p_steps12' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step13'])) {
  $p_steps13 = $_POST['p_steps13'];
  $sql2 = "UPDATE steps SET p_steps13='$p_steps13' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step14'])) {
  $p_steps14 = $_POST['p_steps14'];
  $sql2 = "UPDATE steps SET p_steps14='$p_steps14' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}
if (isset($_POST['update_step15'])) {
  $p_steps15 = $_POST['p_steps15'];
  $sql2 = "UPDATE steps SET p_steps15='$p_steps15' WHERE id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh:0.3");
}

if (isset($_POST["update_step_image1"])) {
  if (isset($_FILES["image_upload1"]["name"]) && ($_FILES["image_upload1"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload1 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload1'];
      $size = $_FILES["image_upload1"]["size"];
      $temp = $_FILES["image_upload1"]["tmp_name"];
      $type = $_FILES["image_upload1"]["type"];
      $profile_name = $_FILES["image_upload1"]["name"];
      $step_image1 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image1");
    }
  }
  else {
    $step_image1 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload1='$step_image1' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image2"])) {
  if (isset($_FILES["image_upload2"]["name"]) && ($_FILES["image_upload2"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload2 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload2'];
      $size = $_FILES["image_upload2"]["size"];
      $temp = $_FILES["image_upload2"]["tmp_name"];
      $type = $_FILES["image_upload2"]["type"];
      $profile_name = $_FILES["image_upload2"]["name"];
      $step_image2 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image2");
    }
  }
  else {
    $step_image2 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload2='$step_image2' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image3"])) {
  if (isset($_FILES["image_upload3"]["name"]) && ($_FILES["image_upload3"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload3 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload3'];
      $size = $_FILES["image_upload3"]["size"];
      $temp = $_FILES["image_upload3"]["tmp_name"];
      $type = $_FILES["image_upload3"]["type"];
      $profile_name = $_FILES["image_upload3"]["name"];
      $step_image3 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image3");
    }
  }
  else {
    $step_image3 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload3='$step_image3' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image4"])) {
  if (isset($_FILES["image_upload4"]["name"]) && ($_FILES["image_upload4"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload4 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload4'];
      $size = $_FILES["image_upload4"]["size"];
      $temp = $_FILES["image_upload4"]["tmp_name"];
      $type = $_FILES["image_upload4"]["type"];
      $profile_name = $_FILES["image_upload4"]["name"];
      $step_image4 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image4");
    }
  }
  else {
    $step_image4 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload4='$step_image4' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image5"])) {
  if (isset($_FILES["image_upload5"]["name"]) && ($_FILES["image_upload5"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload5 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload5'];
      $size = $_FILES["image_upload5"]["size"];
      $temp = $_FILES["image_upload5"]["tmp_name"];
      $type = $_FILES["image_upload5"]["type"];
      $profile_name = $_FILES["image_upload5"]["name"];
      $step_image5 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image5");
    }
  }
  else {
    $step_image5 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload5='$step_image5' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image6"])) {
  if (isset($_FILES["image_upload6"]["name"]) && ($_FILES["image_upload6"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload6 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload6'];
      $size = $_FILES["image_upload6"]["size"];
      $temp = $_FILES["image_upload6"]["tmp_name"];
      $type = $_FILES["image_upload6"]["type"];
      $profile_name = $_FILES["image_upload6"]["name"];
      $step_image6 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image6");
    }
  }
  else {
    $step_image6 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload6='$step_image6' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image7"])) {
  if (isset($_FILES["image_upload7"]["name"]) && ($_FILES["image_upload7"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload7 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload7'];
      $size = $_FILES["image_upload7"]["size"];
      $temp = $_FILES["image_upload7"]["tmp_name"];
      $type = $_FILES["image_upload7"]["type"];
      $profile_name = $_FILES["image_upload7"]["name"];
      $step_image7 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image7");
    }
  }
  else {
    $step_image7 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload7='$step_image7' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image8"])) {
  if (isset($_FILES["image_upload8"]["name"]) && ($_FILES["image_upload8"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload8 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload8'];
      $size = $_FILES["image_upload8"]["size"];
      $temp = $_FILES["image_upload8"]["tmp_name"];
      $type = $_FILES["image_upload8"]["type"];
      $profile_name = $_FILES["image_upload8"]["name"];
      $step_image8 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image8");
    }
  }
  else {
    $step_image8 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload8='$step_image8' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image9"])) {
  if (isset($_FILES["image_upload9"]["name"]) && ($_FILES["image_upload9"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload9 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload9'];
      $size = $_FILES["image_upload9"]["size"];
      $temp = $_FILES["image_upload9"]["tmp_name"];
      $type = $_FILES["image_upload9"]["type"];
      $profile_name = $_FILES["image_upload9"]["name"];
      $step_image9 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image9");
    }
  }
  else {
    $step_image9 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload9='$step_image9' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image10"])) {
  if (isset($_FILES["image_upload10"]["name"]) && ($_FILES["image_upload10"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload10 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload10'];
      $size = $_FILES["image_upload10"]["size"];
      $temp = $_FILES["image_upload10"]["tmp_name"];
      $type = $_FILES["image_upload10"]["type"];
      $profile_name = $_FILES["image_upload10"]["name"];
      $step_image10 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image10");
    }
  }
  else {
    $step_image10 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload10='$step_image10' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image11"])) {
  if (isset($_FILES["image_upload11"]["name"]) && ($_FILES["image_upload11"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload11 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload11'];
      $size = $_FILES["image_upload11"]["size"];
      $temp = $_FILES["image_upload11"]["tmp_name"];
      $type = $_FILES["image_upload11"]["type"];
      $profile_name = $_FILES["image_upload11"]["name"];
      $step_image11 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image11");
    }
  }
  else {
    $step_image11 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload11='$step_image11' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image12"])) {
  if (isset($_FILES["image_upload12"]["name"]) && ($_FILES["image_upload12"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload12 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload12'];
      $size = $_FILES["image_upload12"]["size"];
      $temp = $_FILES["image_upload12"]["tmp_name"];
      $type = $_FILES["image_upload12"]["type"];
      $profile_name = $_FILES["image_upload12"]["name"];
      $step_image12 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image12");
    }
  }
  else {
    $step_image12 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload12='$step_image12' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image13"])) {
  if (isset($_FILES["image_upload13"]["name"]) && ($_FILES["image_upload13"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload13 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload13'];
      $size = $_FILES["image_upload13"]["size"];
      $temp = $_FILES["image_upload13"]["tmp_name"];
      $type = $_FILES["image_upload13"]["type"];
      $profile_name = $_FILES["image_upload13"]["name"];
      $step_image13 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image13");
    }
  }
  else {
    $step_image13 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload13='$step_image13' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image14"])) {
  if (isset($_FILES["image_upload14"]["name"]) && ($_FILES["image_upload14"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload14 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload14'];
      $size = $_FILES["image_upload14"]["size"];
      $temp = $_FILES["image_upload14"]["tmp_name"];
      $type = $_FILES["image_upload14"]["type"];
      $profile_name = $_FILES["image_upload14"]["name"];
      $step_image14 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image14");
    }
  }
  else {
    $step_image14 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload14='$step_image14' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}
if (isset($_POST["update_step_image15"])) {
  if (isset($_FILES["image_upload15"]["name"]) && ($_FILES["image_upload15"]["name"] !="")) {
    $query = mysqli_query($conn, "SELECT image_upload15 FROM image WHERE id='$p_id'");
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
      $pic = $result['image_upload15'];
      $size = $_FILES["image_upload15"]["size"];
      $temp = $_FILES["image_upload15"]["tmp_name"];
      $type = $_FILES["image_upload15"]["type"];
      $profile_name = $_FILES["image_upload15"]["name"];
      $step_image15 = uniqid('', true).".".$profile_name;
      unlink("wp-content/uploads/2018/04/$pic");
      move_uploaded_file($temp, "wp-content/uploads/2018/04/$step_image15");
    }
  }
  else {
    $step_image15 = $pic;
  }
  $update = mysqli_query($conn, "UPDATE image SET image_upload15='$step_image15' WHERE id='$p_id'");
  header( "Refresh:0.5;");
}

if (isset($_POST['update_yield_servings'])) {
  $p_yield = $_POST['p_yield'];
  $p_servings = $_POST['p_servings'];
  $sql2 = "UPDATE p_recipe SET p_yield='$p_yield', p_servings='$p_servings' WHERE p_id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh: 0.3");
}

if (isset($_POST['update_time'])) {
  $p_prepare = $_POST['p_prepare'];
  $p_cook = $_POST['p_cook'];
  $p_ready = $_POST['p_ready'];
  $sql2 = "UPDATE p_recipe SET p_prepare='$p_prepare', p_cook='$p_cook', p_ready='$p_ready' WHERE p_id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh: 0.3");
}

if (isset($_POST['update_tags'])) {
  $p_tags = $_POST['p_tags'];
  $sql2 = "UPDATE p_recipe SET p_tags='$p_tags' WHERE p_id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh: 0.3");
}

if (isset($_POST['update_select'])) {
  $p_cuisine = $_POST['p_cuisine'];
  $p_course = $_POST['p_course'];
  $p_skill = $_POST['p_skill'];
  $p_type = $_POST['p_type'];
  $sql2 = "UPDATE p_recipe SET p_cuisine='$p_cuisine', p_course='$p_course', p_skill='$p_skill', p_type='$p_type' WHERE p_id='$p_id'";
  $resultsb = mysqli_query($conn, $sql2);
  header("Refresh: 0.3");
}

?>
