<?php require ("partials/top.php"); ?>
    <div class="pageContent">
      <div class="createAndArticles">
        <div class="topNav">
          <ul>
            <li><a href="#">For you</a></li>
            <li><a href="#">Following</a></li>
          </ul>
        </div>
        <div class="createPost">
          <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
              <form class="contentAndLowernav" action="postAction.php" method="post">
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
                  <input class="postButton" type="submit" name="submit" id="submit" value="Post"> 
                </div>
            </form>
        </div>
        <div class="articles">
<!--        --><?php //
//          require ("database/conn.php");
//
//
//          $get_all_posts = $conn->prepare("SELECT * FROM post");
//          $get_all_posts->execute();
//          $posts = $get_all_posts->fetchAll();
//
//
//
//
//          foreach ($posts as $post){
//            $contentText = $post['contentText'];
//            $datePosted = $post['datePosted'];
//            $imageSrc = "assets/img/chicken-solid-white.png";
//            $imageAlt = "assets/img/chicken-line-white.png";
//              echo "<article>".
//                "<img src='$imageSrc' alt='$imageAlt'>".
//                "<div class='userAndContent'>".
//                "<div class='user'>".
//                "<p class='username'>De Kale Kip</p>".
//                "<p class='handle'>@DeKaleKip</p>".
//                "<p class='timePosted'>&middot;$datePosted</p>".
//                "</div>".
//                "<div class='content'>".
//                "<p>$contentText</p>".
//                "</div>".
//                "<div class='analytics'>".
//                "<ul>".
//                  "<li><a href='#'>reactions 12</a></li>".
//                  "<li><a href='#'>Reclucks 5</a></li>".
//                  "<li><a href='#'>likes 32</a></li>".
//                  "<li><a href='#'>views 103</a></li>".
//                  "<li><a href='#'>bookmark</a></li>".
//                "</ul>".
//              "</div>".
//            "</div>".
//          "</article>";
//          }
//        ?>
        </div>
        <div class="endOfContent">
            <img src="assets/img/chicken-line-white.png" alt="">
            <p>You've reached the end of Cluckle</p>
            <div>
              <p>How long have you been doomscrolling to see this?!</p>
              <p>Go touch some grass!</p>
            </div>
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