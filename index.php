<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="The social media website Cluckle">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
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

        <li><a <?php if ($url === '/chirpify/index.php'){ echo "class='active'";} ?> href="index.php">Home</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">Explore</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">Notifications</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">Messages</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">Bookmarks</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="login.php">Login</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">Profile</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">Premium</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">More</a></li>
      </ul>
    </nav>
    <div class="articles">
    <article>
      <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
      <div class="userAndContent">
        <div class="user">
          <p class="username">De Kale Kip</p>
          <p class="tag">@DeKaleKip</p>
          <p class="timePosted">&middot; 12-03-24</p>
        </div>
        <div class="content">
          <p>lorem</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>bdgfbgfeht</p>
        </div>
        <div class="analytics">
          <ul>
            <li><a href="#">reactions 12</a></li>
            <li><a href="#">shares 5</a></li>
            <li><a href="#">likes 32</a></li>
            <li><a href="#">views 103</a></li>
            <li><a href="#">bookmark</a></li>
          </ul>
        </div>
      </div>  
    </article>


    <article>
      <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
      <div class="userAndContent">
        <div class="user">
          <p class="username">De Kale Kip</p>
          <p class="tag">@DeKaleKip</p>
          <p class="timePosted">&middot; 12-03-24</p>
        </div>
        <div class="content">
          <p>lorem</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>bdgfbgfeht</p>
        </div>
        <div class="analytics">
          <ul>
            <li><a href="#">reactions 12</a></li>
            <li><a href="#">shares 5</a></li>
            <li><a href="#">likes 32</a></li>
            <li><a href="#">views 103</a></li>
            <li><a href="#">bookmark</a></li>
          </ul>
        </div>
      </div>  
    </article>
    <article>
      <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
      <div class="userAndContent">
        <div class="user">
          <p class="username">De Kale Kip</p>
          <p class="tag">@DeKaleKip</p>
          <p class="timePosted">&middot; 12-03-24</p>
        </div>
        <div class="content">
          <p>lorem</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>bdgfbgfeht</p>
        </div>
        <div class="analytics">
          <ul>
            <li><a href="#">reactions 12</a></li>
            <li><a href="#">shares 5</a></li>
            <li><a href="#">likes 32</a></li>
            <li><a href="#">views 103</a></li>
            <li><a href="#">bookmark</a></li>
          </ul>
        </div>
      </div>  
    </article>
    <article>
      <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
      <div class="userAndContent">
        <div class="user">
          <p class="username">De Kale Kip</p>
          <p class="tag">@DeKaleKip</p>
          <p class="timePosted">&middot; 12-03-24</p>
        </div>
        <div class="content">
          <p>lorem</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>bdgfbgfeht</p>
        </div>
        <div class="analytics">
          <ul>
            <li><a href="#">reactions 12</a></li>
            <li><a href="#">shares 5</a></li>
            <li><a href="#">likes 32</a></li>
            <li><a href="#">views 103</a></li>
            <li><a href="#">bookmark</a></li>
          </ul>
        </div>
      </div>  
    </article>
    <article>
      <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
      <div class="userAndContent">
        <div class="user">
          <p class="username">De Kale Kip</p>
          <p class="tag">@DeKaleKip</p>
          <p class="timePosted">&middot; 12-03-24</p>
        </div>
        <div class="content">
          <p>lorem</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
          <p>bdgfbgfeht</p>
        </div>
        <div class="analytics">
          <ul>
            <li><a href="#">reactions 12</a></li>
            <li><a href="#">shares 5</a></li>
            <li><a href="#">likes 32</a></li>
            <li><a href="#">views 103</a></li>
            <li><a href="#">bookmark</a></li>
          </ul>
        </div>
      </div>  
    </article>

</div>
</body>
</html>