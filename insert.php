<?php

$p_title = mysqli_real_escape_string($conn, $_POST['p_title']);
$p_short = mysqli_real_escape_string($conn, $_POST['p_short']);
$p_ingredients = mysqli_real_escape_string($conn, $_POST['p_ingredients']);
$p_ingredients1=mysqli_real_escape_string($conn,$_POST['p_ingredients1']);
$p_ingredients2=mysqli_real_escape_string($conn,$_POST['p_ingredients2']);
$p_ingredients3=mysqli_real_escape_string($conn,$_POST['p_ingredients3']);
$p_ingredients4=mysqli_real_escape_string($conn,$_POST['p_ingredients4']);
$p_ingredients5=mysqli_real_escape_string($conn,$_POST['p_ingredients5']);
$p_ingredients6=mysqli_real_escape_string($conn,$_POST['p_ingredients6']);
$p_ingredients7=mysqli_real_escape_string($conn,$_POST['p_ingredients7']);
$p_ingredients8=mysqli_real_escape_string($conn,$_POST['p_ingredients8']);
$p_ingredients9=mysqli_real_escape_string($conn,$_POST['p_ingredients9']);
$p_ingredients10=mysqli_real_escape_string($conn,$_POST['p_ingredients10']);
$p_ingredients11=mysqli_real_escape_string($conn,$_POST['p_ingredients11']);
$p_ingredients12=mysqli_real_escape_string($conn,$_POST['p_ingredients12']);
$p_ingredients13=mysqli_real_escape_string($conn,$_POST['p_ingredients13']);
$p_ingredients14=mysqli_real_escape_string($conn,$_POST['p_ingredients14']);
$p_ingredients15=mysqli_real_escape_string($conn,$_POST['p_ingredients15']);
$p_ingredients16=mysqli_real_escape_string($conn,$_POST['p_ingredients16']);
$p_ingredients17=mysqli_real_escape_string($conn,$_POST['p_ingredients17']);
$p_ingredients18=mysqli_real_escape_string($conn,$_POST['p_ingredients18']);
$p_ingredients19=mysqli_real_escape_string($conn,$_POST['p_ingredients19']);
$p_ingredients20=mysqli_real_escape_string($conn,$_POST['p_ingredients20']);
$p_ingredients21=mysqli_real_escape_string($conn,$_POST['p_ingredients21']);
$p_ingredients22=mysqli_real_escape_string($conn,$_POST['p_ingredients22']);
$p_ingredients23=mysqli_real_escape_string($conn,$_POST['p_ingredients23']);
$p_ingredients24=mysqli_real_escape_string($conn,$_POST['p_ingredients24']);
$p_ingredients25=mysqli_real_escape_string($conn,$_POST['p_ingredients25']);
$p_ingredients26=mysqli_real_escape_string($conn,$_POST['p_ingredients26']);
$p_ingredients27=mysqli_real_escape_string($conn,$_POST['p_ingredients27']);
$p_ingredients28=mysqli_real_escape_string($conn,$_POST['p_ingredients28']);
$p_ingredients29=mysqli_real_escape_string($conn,$_POST['p_ingredients29']);
$p_ingredients30=mysqli_real_escape_string($conn,$_POST['p_ingredients30']);
$p_ingredients31=mysqli_real_escape_string($conn,$_POST['p_ingredients31']);
$p_ingredients32=mysqli_real_escape_string($conn,$_POST['p_ingredients32']);
$p_ingredients33=mysqli_real_escape_string($conn,$_POST['p_ingredients33']);
$p_ingredients34=mysqli_real_escape_string($conn,$_POST['p_ingredients34']);
$p_ingredients35=mysqli_real_escape_string($conn,$_POST['p_ingredients35']);
$p_ingredients36=mysqli_real_escape_string($conn,$_POST['p_ingredients36']);
$p_ingredients37=mysqli_real_escape_string($conn,$_POST['p_ingredients37']);
$p_ingredients38=mysqli_real_escape_string($conn,$_POST['p_ingredients38']);
$p_ingredients39=mysqli_real_escape_string($conn,$_POST['p_ingredients39']);
$p_ingredients40=mysqli_real_escape_string($conn,$_POST['p_ingredients40']);
$p_ingredients41=mysqli_real_escape_string($conn,$_POST['p_ingredients41']);
$p_ingredients42=mysqli_real_escape_string($conn,$_POST['p_ingredients42']);
$p_ingredients43=mysqli_real_escape_string($conn,$_POST['p_ingredients43']);
$p_ingredients44=mysqli_real_escape_string($conn,$_POST['p_ingredients44']);
$p_ingredients45=mysqli_real_escape_string($conn,$_POST['p_ingredients45']);
$p_ingredients46=mysqli_real_escape_string($conn,$_POST['p_ingredients46']);
$p_ingredients47=mysqli_real_escape_string($conn,$_POST['p_ingredients47']);
$p_ingredients48=mysqli_real_escape_string($conn,$_POST['p_ingredients48']);
$p_ingredients49=mysqli_real_escape_string($conn,$_POST['p_ingredients49']);
$p_ingredients50=mysqli_real_escape_string($conn,$_POST['p_ingredients50']);
$p_steps = mysqli_real_escape_string($conn, $_POST['p_steps']);
$p_steps1=mysqli_real_escape_string($conn,$_POST['p_steps1']);
$p_steps2=mysqli_real_escape_string($conn,$_POST['p_steps2']);
$p_steps3=mysqli_real_escape_string($conn,$_POST['p_steps3']);
$p_steps4=mysqli_real_escape_string($conn,$_POST['p_steps4']);
$p_steps5=mysqli_real_escape_string($conn,$_POST['p_steps5']);
$p_steps6=mysqli_real_escape_string($conn,$_POST['p_steps6']);
$p_steps7=mysqli_real_escape_string($conn,$_POST['p_steps7']);
$p_steps8=mysqli_real_escape_string($conn,$_POST['p_steps8']);
$p_steps9=mysqli_real_escape_string($conn,$_POST['p_steps9']);
$p_steps10=mysqli_real_escape_string($conn,$_POST['p_steps10']);
$p_steps11=mysqli_real_escape_string($conn,$_POST['p_steps11']);
$p_steps12=mysqli_real_escape_string($conn,$_POST['p_steps12']);
$p_steps13=mysqli_real_escape_string($conn,$_POST['p_steps13']);
$p_steps14=mysqli_real_escape_string($conn,$_POST['p_steps14']);

$image_upload1 = $_FILES['image_upload1']['name'];
$image_upload2 = $_FILES['image_upload2']['name'];
$image_upload3 = $_FILES['image_upload3']['name'];
$image_upload4 = $_FILES['image_upload4']['name'];
$image_upload5 = $_FILES['image_upload5']['name'];
$image_upload6 = $_FILES['image_upload6']['name'];
$image_upload7 = $_FILES['image_upload7']['name'];
$image_upload8 = $_FILES['image_upload8']['name'];
$image_upload9 = $_FILES['image_upload9']['name'];
$image_upload10 = $_FILES['image_upload10']['name'];
$image_upload11 = $_FILES['image_upload11']['name'];
$image_upload12 = $_FILES['image_upload12']['name'];
$image_upload13 = $_FILES['image_upload13']['name'];
$image_upload14 = $_FILES['image_upload14']['name'];
$image_upload15 = $_FILES['image_upload15']['name'];

$id1 = uniqid('', true).".".$image_upload1;
$target1 = "wp-content/uploads/2018/04/".$id1;
$id2 = uniqid('', true).".".$image_upload2;
$target2 = "wp-content/uploads/2018/04/".$id2;
$id3 = uniqid('', true).".".$image_upload3;
$target3 = "wp-content/uploads/2018/04/".$id3;
$id4 = uniqid('', true).".".$image_upload4;
$target4 = "wp-content/uploads/2018/04/".$id4;
$id5 = uniqid('', true).".".$image_upload5;
$target5 = "wp-content/uploads/2018/04/".$id5;
$id6 = uniqid('', true).".".$image_upload6;
$target6 = "wp-content/uploads/2018/04/".$id6;
$id7 = uniqid('', true).".".$image_upload7;
$target7 = "wp-content/uploads/2018/04/".$id7;
$id8 = uniqid('', true).".".$image_upload8;
$target8 = "wp-content/uploads/2018/04/".$id8;
$id9 = uniqid('', true).".".$image_upload9;
$target9 = "wp-content/uploads/2018/04/".$id9;
$id10 = uniqid('', true).".".$image_upload10;
$target10 = "wp-content/uploads/2018/04/".$id10;
$id11 = uniqid('', true).".".$image_upload11;
$target11 = "wp-content/uploads/2018/04/".$id11;
$id12 = uniqid('', true).".".$image_upload12;
$target12 = "wp-content/uploads/2018/04/".$id12;
$id13 = uniqid('', true).".".$image_upload13;
$target13 = "wp-content/uploads/2018/04/".$id13;
$id14 = uniqid('', true).".".$image_upload14;
$target14 = "wp-content/uploads/2018/04/".$id14;
$id15 = uniqid('', true).".".$image_upload15;
$target15 = "wp-content/uploads/2018/04/".$id15;



$querys = "INSERT INTO image (image_upload1,image_upload2,image_upload3,image_upload4,image_upload5,image_upload6,image_upload7,image_upload8,image_upload9,image_upload10,image_upload11,image_upload12,image_upload13,image_upload14,image_upload15)
VALUES ('$image_upload1','$image_upload2','$image_upload3','$image_upload4','$image_upload5','$image_upload6','$image_upload7','$image_upload8','$image_upload9','$image_upload10','$image_upload11','$image_upload12','$image_upload13','$image_upload14','$image_upload15')";

$result = mysqli_query($conn, $querys);

if (move_uploaded_file($_FILES['image_upload1']['tmp_name'], $target1) or move_uploaded_file($_FILES['image_upload2']['tmp_name'], $target2) or move_uploaded_file($_FILES['image_upload3']['tmp_name'], $target3) or move_uploaded_file($_FILES['image_upload4']['tmp_name'], $target4) or move_uploaded_file($_FILES['image_upload5']
['tmp_name'], $target5) or move_uploaded_file($_FILES['image_upload6']['tmp_name'], $target6) or move_uploaded_file($_FILES['image_upload7']['tmp_name'], $target7) or move_uploaded_file($_FILES['image_upload8']['tmp_name'], $target8) or move_uploaded_file($_FILES['image_upload9']['tmp_name'], $target9)
or move_uploaded_file($_FILES['image_upload10']['tmp_name'], $target10) or move_uploaded_file($_FILES['image_upload11']['tmp_name'], $target11) or move_uploaded_file($_FILES['image_upload12']['tmp_name'], $target12) or move_uploaded_file($_FILES['image_upload13']['tmp_name'], $target13) or move_uploaded_file($_FILES['image_upload14']
['tmp_name'], $target14) or move_uploaded_file($_FILES['image_upload15']['tmp_name'], $target15)) {
  $msg = "Image uploaded successfully";
}else{
  $msg = "Failed to upload image";
}


$p_tags = mysqli_real_escape_string($conn, $_POST['p_tags']);
$p_prepare = mysqli_real_escape_string($conn, $_POST['p_prepare']);
$p_cook = mysqli_real_escape_string($conn, $_POST['p_cook']);
$p_servings = mysqli_real_escape_string($conn, $_POST['p_servings']);
$p_ready = mysqli_real_escape_string($conn, $_POST['p_ready']);
$p_yield = mysqli_real_escape_string($conn, $_POST['p_yield']);
$p_cuisine = mysqli_real_escape_string($conn, $_POST['p_cuisine']);
$p_course = mysqli_real_escape_string($conn, $_POST['p_course']);
$p_skill = mysqli_real_escape_string($conn, $_POST['p_skill']);
$p_type = mysqli_real_escape_string($conn, $_POST['p_type']);

$image_upload = $_FILES['image_upload']['name'];

$id = uniqid('', true).".".$image_upload;
$target = "wp-content/uploads/2018/04/".$id;

$u_id = $_SESSION['u_id'];
$getname1 = mysqli_query($conn, "SELECT u_name,u_about,u_picture FROM users WHERE u_id=$u_id");
while ($getname3 = mysqli_fetch_assoc($getname1)) {
  $p_author = $getname3['u_name'];
  $p_image = $getname3['u_picture'];
  $p_about = $getname3['u_about'];
  $query = "INSERT INTO p_recipe (p_id, p_title, p_short, image_upload, p_tags, p_author, p_image, p_about, p_prepare, p_cook, p_servings, p_ready, p_yield, p_cuisine, p_course, p_skill, p_type)
  VALUES ((SELECT LAST_INSERT_ID()),'$p_title', '$p_short', '$image_upload','$p_tags','$p_author','$p_image','$p_about','$p_prepare','$p_cook','$p_servings','$p_ready','$p_yield','$p_cuisine','$p_course','$p_skill','$p_type')";

  $result = mysqli_query($conn, $query);
}
if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $target)) {
  $msg = "Image uploaded successfully";
}else {
  $msg = "Failed to upload image";
}

$querys = "INSERT INTO ingredients (id, p_ingredients,
  p_ingredients1,p_ingredients2,p_ingredients3,p_ingredients4,
  p_ingredients5,p_ingredients6,p_ingredients7,p_ingredients8,
  p_ingredients9,p_ingredients10,p_ingredients11,p_ingredients12,
  p_ingredients13,p_ingredients14,p_ingredients15,p_ingredients16,
  p_ingredients17,p_ingredients18,p_ingredients19,p_ingredients20,
  p_ingredients21,p_ingredients22,p_ingredients23,p_ingredients24,
  p_ingredients25,p_ingredients26,p_ingredients27,p_ingredients28,
  p_ingredients29,p_ingredients30,p_ingredients31,p_ingredients32,
  p_ingredients33,p_ingredients34,p_ingredients35,p_ingredients36,
  p_ingredients37,p_ingredients38,p_ingredients39,p_ingredients40,
  p_ingredients41,p_ingredients42,p_ingredients43,p_ingredients44,
  p_ingredients45,p_ingredients46,p_ingredients47,p_ingredients48,
  p_ingredients49,p_ingredients50)
  VALUES ( (SELECT LAST_INSERT_ID()),'$p_ingredients', '$p_ingredients1','$p_ingredients2','$p_ingredients3',
  '$p_ingredients4','$p_ingredients5','$p_ingredients6',
  '$p_ingredients7','$p_ingredients8','$p_ingredients9',
  '$p_ingredients10','$p_ingredients11','$p_ingredients12',
  '$p_ingredients13','$p_ingredients14','$p_ingredients15',
  '$p_ingredients16','$p_ingredients17','$p_ingredients18',
  '$p_ingredients19','$p_ingredients20','$p_ingredients21',
  '$p_ingredients22','$p_ingredients23','$p_ingredients24',
  '$p_ingredients25','$p_ingredients26','$p_ingredients27',
  '$p_ingredients28','$p_ingredients29','$p_ingredients30',
  '$p_ingredients31','$p_ingredients32','$p_ingredients33',
  '$p_ingredients34','$p_ingredients35','$p_ingredients36',
  '$p_ingredients37','$p_ingredients38','$p_ingredients39',
  '$p_ingredients40','$p_ingredients41','$p_ingredients42',
  '$p_ingredients43','$p_ingredients44','$p_ingredients45',
  '$p_ingredients46','$p_ingredients47','$p_ingredients48',
  '$p_ingredients49','$p_ingredients50')";

  $result = mysqli_query($conn, $querys);


  $query = "INSERT INTO steps (id, p_steps,p_steps1,p_steps2,p_steps3,
    p_steps4,p_steps5,p_steps6,p_steps7,p_steps8,p_steps9,p_steps10,p_steps11,
    p_steps12,p_steps13,p_steps14)
    VALUES ( (SELECT LAST_INSERT_ID()),'$p_steps','$p_steps1','$p_steps2','$p_steps3','$p_steps4',
    '$p_steps5','$p_steps6','$p_steps7','$p_steps8','$p_steps9','$p_steps10','$p_steps11','$p_steps12','$p_steps13','$p_steps14')";

    $result = mysqli_query($conn, $query);

    header("Location: http://localhost/wordpress/wordpress/my-recipes/");

    ?>
