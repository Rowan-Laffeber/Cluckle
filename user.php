<?php
require ("partials/top.php");
require ("partials/session.php");
require ("database/conn.php");

$stmt = $conn->prepare("SELECT * FROM account WHERE id =:userId");
$stmt->bindParam(":userId", $_SESSION['userId'], PDO::PARAM_INT);
$stmt->execute();
$account = $stmt->fetch();

$username = htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8');
$handle = htmlspecialchars($account['handle'], ENT_QUOTES, 'UTF-8');
?>

<div class="pageContent">
    <div class="createAndArticles">

        <div class="userpage">

            <div class="bannerPfp">
                <img class="banner" src="assets/img/banner.png" alt="">
                <img class="profilePicture" src="assets/img/chicken-solid-white.png" alt="">
            </div>

            <div class="textUser">
                <div class="usernameHandle">
                    <p class="username"><?php echo $username; ?> </p>
                    <p class="handle"><?php echo $handle; ?></p>
                </div>
                <p class="status">What's Clucking?!</p>
                <div class="userInfo">
                    <div class="userAbout">
                        <p>everywhere</p>
                        <p><a href="/chirpify/about.php">cluckle.com/about</a></p>
                        <p>born 12-12-12</p>
                    </div>
                    <p>joined 12-12-12</p>
                </div>
                <div class="followingFollowers">
                    <div class="following">
                        <p class="followNumber">10</p>
                        <p class="followText">following</p>
                    </div>
                    <div class="followers">
                        <p class="followNumber">10</p>
                        <p class="followText">followers</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="topNav">
            <ul>
                <li><a href="#">Clucks</a></li>
                <li><a href="#">Replies</a></li>
                <li><a href="#">Subs</a></li>
                <li><a href="#">Highlights</a></li>
                <li><a href="#">Media</a></li>
            </ul>
        </div>

        <div class="articles">
             <?php
             $get_all_posts = $conn->prepare("SELECT * FROM post WHERE userId =:userId");
             $get_all_posts->bindParam(":userId", $_SESSION['userId'], PDO::PARAM_INT);
             $get_all_posts->execute();
             $posts = $get_all_posts->fetchAll(PDO::FETCH_ASSOC);

             foreach ($posts as $post) {
                $postId = (int)$post['id'];
                $contentText = htmlspecialchars($post['contentText'], ENT_QUOTES, 'UTF-8');
                $datePosted = htmlspecialchars($post['datePosted'], ENT_QUOTES, 'UTF-8');
                $imageSrc = "assets/img/chicken-solid-white.png";
                $imageAlt = "assets/img/chicken-line-white.png";

                echo "<article>".
                     "<img src='$imageSrc' alt='$imageAlt'>".
                     "<div class='userAndContent'>".
                     "<div class='user'>".
                     "<p class='username'>$username</p>".
                     "<p class='handle'>$handle</p>".
                     "<p class='timePosted'>&middot;$datePosted</p>".
                     "</div>".
                     "<a class='content' href='post.php?postId=$postId'>".
                     "<p>$contentText</p>".
                     "</a>".
                     "<div class='analytics'>".
                     "<ul>".
                     "<li><a href='#'>reactions 12</a></li>".
                     "<li><a href='#'>Reclucks 5</a></li>".
                     "<li><a href='#'>likes 32</a></li>".
                     "<li><a href='#'>views 103</a></li>".
                     "<li><a href='#'>bookmark</a></li>".
                     "</ul>".
                     "</div>".
                     "</div>".
                     "</article>";
             }
            ?>

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
