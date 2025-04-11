<?php
require ("partials/top.php");
require ("partials/session.php");
require ("database/conn.php");

$stmt = $conn->prepare("SELECT * FROM account WHERE id =:userId");
$stmt->bindParam(":userId", $_GET['userId'], PDO::PARAM_INT);
$stmt->execute();
$account = $stmt->fetch();

$status = htmlspecialchars($account['status'], ENT_QUOTES, 'UTF-8');
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
                <p class="status"><?php echo $status?></p>
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
                $userId = (int)$post['userId'];
                $contentText = htmlspecialchars($post['contentText'], ENT_QUOTES, 'UTF-8');
                $datePosted = htmlspecialchars($post['datePosted'], ENT_QUOTES, 'UTF-8');
                $imageSrc = "assets/img/chicken-solid-white.png";
                $imageAlt = "assets/img/chicken-line-white.png";

                $likeStmt = $conn->prepare("SELECT COUNT(*) AS likeCount FROM likes WHERE postId = :postId");
                $likeStmt->bindParam(":postId", $postId, PDO::PARAM_INT);
                $likeStmt->execute();
                $likeData = $likeStmt->fetch(PDO::FETCH_ASSOC);
                $likeCount = $likeData['likeCount'];

                $commentStmt = $conn->prepare("SELECT COUNT(*) AS commentCount FROM comments WHERE postId = :postId");
                $commentStmt->bindParam(":postId", $postId, PDO::PARAM_INT);
                $commentStmt->execute();
                $commentData = $commentStmt->fetch(PDO::FETCH_ASSOC);
                $commentCount = $commentData['commentCount'];



                echo "<article>".
                     "<img src='$imageSrc' alt='$imageAlt'>".
                     "<div class='userAndContent'>
                        <a class='user' href='user.php?userId=$userId'>
                            <p class='username'>$username</p>
                            <p class='handle'>$handle</p>
                            <p class='timePosted'>&middot; $datePosted</p>
                        </a>
                     <a class='content' href='post.php?postId=$postId'>".
                     "<p>$contentText</p>".
                     "</a>".
                     "<div class='analytics'>
                     <ul>
                     <li><a> comment $commentCount</a>
                     </li>
                     <li><a href='#'>Reclucks</a></li>
                     <li>
                     <form class='contentAndLowernav' action='likeAction.php' method='post'>
                         <input class='' type='hidden' name='postId' id='postId' value='$postId'>
                         <input class='' type='submit' name='submit' id='submit' value='like'>
                         <a>$likeCount</a>
                     </form>
                     </li>
                     <li><a href='#'>views</a></li>
                     <li><a href='#'>bookmark</a></li>
                 </ul>
                     </div>".
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
