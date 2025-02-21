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

        <li><a <?php if ($url === '/chirpify/index.php'){ echo "class='active'";} ?> href="index.php">&#128269; Home</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Explore</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Notifications</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Messages</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Bookmarks</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="login.php">&#128269; Login</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Profile</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; Premium</a></li>
        <li <?php if ($url === '/chirpify/#'){ echo "class='active'";} ?>><a href="#">&#128269; More</a></li>
      </ul>
    </nav>
    <div class="pageContent">
      <div class="createAndArticles">
        <div class="createPost">
        <img src="assets/img/chicken-solid-white.png" alt="profilePicture">

            <div class="contentAndLowernav">
              <textarea name="textarea" id="textarea" placeholder="Whats Clucking?!"></textarea>
              <div class="lowerNav">
                <div class="addables">
                  <ul>
                    <li class="firstIcon"><p>picture</p></li>
                    <li><p>emoji</p></li>
                    <li><p>gif</p></li>
                    <li><p>video</p></li>
                    <li><p>poll</p></li>
                    <li><p>location</p></li>
                  </ul>
                </div>
                <button>post</button>
            </div>
          </div>
        </div>
        <div class="articles">
        <article>
            <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
            <div class="userAndContent">
              <div class="user">
                <p class="username">De Kale Kip</p>
                <p class="handle">@DeKaleKip</p>
                <p class="timePosted">&middot; 12-03-24</p>
              </div>
              <div class="content">
                <p>lorem</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
                <p>lorem</p>
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
                <p class="handle">@DeKaleKip</p>
                <p class="timePosted">&middot; 12-03-24</p>
              </div>
              <div class="content">
                <p>lorem</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores corrupti at officiis est quam excepturi nostrum reiciendis totam omnis, sequi exercitationem, perferendis repellat animi ea ab tenetur dolor perspiciatis labore.</p>
                <p>lorem insum</p>
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
      </div>

      <div class="sideMenu">
        <div class="search">
          <form action="search.php" method="post">
            <input class="searchbutton" type="submit" name="submit" id="submit" value="&#128269;">
            <label for="Search"></label>
              <input class="search" type="Search" name="Search" id="Search" placeholder="Search" required >
          </form>
        </div>
        <div class="premium">
          <h2>Subscribe to Premium</h2>
          <p>Subscribe to Premium for absolutely no benefits</p>
          <button>Get Premium</button>
        </div>
        <div class="trending">
          <h2>What's Clucking</h2>
          <a href="#">trending</a>  
          <a href="#">trending</a>  
          <a href="#">trending</a>  
          <a href="#">trending</a>  
          <a href="#">trending</a>  
          <a href="#">trending</a>  
        </div>
      </div>
    </div>

</body>
</html>