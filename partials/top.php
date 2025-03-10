<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="The social media website Cluckle">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/chicken-solid-white.png">
    <title>Cluckle.com</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <!-- <link id="color_mode" rel="stylesheet" href="assets/cluckle-darkmode.css"> -->
  </head>
  <body>
    <?php    $url =  $_SERVER['REQUEST_URI'];?>
    <nav class="desktop-nav">
      <ul>
        <img src="assets/img/chicken-line-white.png" alt="">

        <li><a <?php if ($url === '/Chirpify/index.php'){ echo "class='active'";} ?> href="index.php">&#128269; Home</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Explore</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Notifications</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Messages</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128193; Bookmarks</a></li>
        <li <?php if ($url === '/Chirpify/login.php'){ echo "class='active'";} ?>><a href="login.php">&#128269; Login</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Profile</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Premium</a></li>
        <li <?php if ($url === '/Chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; More</a></li>
      </ul>
    </nav>