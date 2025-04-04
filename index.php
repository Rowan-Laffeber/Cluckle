<?php
require("partials/session.php");
require("partials/top.php");
?>

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
                <textarea name="textarea" id="textarea" placeholder="What's Clucking?!"></textarea>
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
            <?php
            require("database/conn.php");

            $get_all_posts = $conn->prepare("SELECT * FROM post");
            $get_all_posts->execute();
            $posts = $get_all_posts->fetchAll(PDO::FETCH_ASSOC);

            foreach ($posts as $post) {
                $stmt = $conn->prepare("SELECT * FROM account WHERE id = :userId");
                $stmt->bindParam(":userId", $post['userId'], PDO::PARAM_INT);
                $stmt->execute();
                $account = $stmt->fetch(PDO::FETCH_ASSOC);

                $username = htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8');
                $handle = htmlspecialchars($account['handle'], ENT_QUOTES, 'UTF-8');
                $postId = (int) $post['id'];
                $contentText = htmlspecialchars($post['contentText'], ENT_QUOTES, 'UTF-8');
                $datePosted = htmlspecialchars($post['datePosted'], ENT_QUOTES, 'UTF-8');
                $imageSrc = "assets/img/chicken-solid-white.png";
                $imageAlt = "assets/img/chicken-line-white.png";

                echo "
                <article>
                    <img src='$imageSrc' alt='$imageAlt'>
                    <div class='userAndContent'>
                        <div class='user'>
                            <p class='username'>$username</p>
                            <p class='handle'>$handle</p>
                            <p class='timePosted'>&middot; $datePosted</p>
                        </div>
                        <a class='content' href='post.php?postId=$postId'>
                            <p>$contentText</p>
                        </a>
                        <div class='analytics'>
                            <ul>
                                <li><a href='#'>reactions 12</a></li>
                                <li><a href='#'>Reclucks 5</a></li>
                                <li><a href='#'>likes 32</a></li>
                                <li><a href='#'>views 103</a></li>
                                <li><a href='#'>bookmark</a></li>
                            </ul>
                        </div>
                    </div>
                </article>";
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
                <input class="search" type="text" name="Search" id="Search" placeholder="Search" required>
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
