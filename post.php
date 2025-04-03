<?php require ("partials/session.php"); ?>
<?php require ("partials/top.php"); ?>
<div class="pageContent">
    <div class="createAndArticles">
        <div class="currentPost">
        <?php


        echo "<article class='post'>".

            "<div class='userAndContent'>".
            "<div class='imgUser'>".

                "<img src='assets/img/chicken-line-white.png' alt=''>".
                    "<div class='user'>".
                        "<p class='username'>name</p>".
                        "<p class='handle'>handle</p>".
                    "</div>".
                "</div>".
                "<div class='content'>".
                    "<p>content</p>".
                "</div>".
                "<p class='timePosted'>time</p>".
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
        ?>
        </div>
        <div class="createComment">
            <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
            <form class="addComment" action="postAction.php" method="post">
                <textarea class="" name="textareaReply" id="textareaReply" placeholder="Cluck your clucks.."></textarea>
                <input class="postButton" type="submit" name="submit" id="submit" value="Post">
            </form>
        </div>


        <div class="articles">
            <?php
            require ("database/conn.php");


            $get_all_posts = $conn->prepare("SELECT * FROM post");
            $get_all_posts->execute();
            $posts = $get_all_posts->fetchAll();

            foreach ($posts as $post){
                $stmt = $conn->prepare("SELECT * FROM account WHERE id =:userId");
                $stmt->bindParam(":userId", $post['userId']);
                $stmt->execute();
                $account = $stmt->fetch();

                $username = $account['name'];
                $handle = $account['handle'];

                $contentText = $post['contentText'];
                $datePosted = $post['datePosted'];
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
                    "<div class='content'>".
                    "<p>$contentText</p>".
                    "</div>".
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
