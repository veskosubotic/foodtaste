<?php
// POPULAR RECIPES SIDEBAR

// select results
$addquery = 'SELECT * FROM p_recipe ORDER BY views DESC LIMIT 0,4';

// get results
$result = mysqli_query($conn, $addquery);

// fetch data
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);


// LATEST RECIPES SIDEBAR

$latest = 'SELECT * FROM p_recipe ORDER BY p_date DESC LIMIT 0,3';

$results = mysqli_query($conn, $latest);

$latest_recipes = mysqli_fetch_all($results, MYSQLI_ASSOC);

mysqli_free_result($results);
?>
