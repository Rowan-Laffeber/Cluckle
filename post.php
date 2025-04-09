<?php require ("partials/session.php"); ?>
<?php require ("partials/top.php");
require ("database/conn.php"); ?>
<div class="pageContent">
    <div class="createAndArticles">
        <div class="currentPost">
        <?php


        $stmt = $conn->prepare("SELECT * FROM post WHERE id =:postId");
        $stmt->bindParam(":postId", $_GET['postId'], PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch();
        

        $stmt = $conn->prepare("SELECT * FROM account WHERE id =:userId");
        $stmt->bindParam(":userId", $post['userId'], PDO::PARAM_INT);
        $stmt->execute();
        $account = $stmt->fetch();
        
        $username = htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8');
        $handle = htmlspecialchars($account['handle'], ENT_QUOTES, 'UTF-8');

        $contentText = htmlspecialchars($post['contentText'], ENT_QUOTES, 'UTF-8');
        $datePosted = htmlspecialchars($post['datePosted'], ENT_QUOTES, 'UTF-8');
        
        $imageSrc = "assets/img/chicken-solid-white.png";
        $imageAlt = "assets/img/chicken-line-white.png";
        


        echo "<article class='post'>".

            "<div class='userAndContent'>".
            "<div class='imgUser'>".

                "<img src='$imageSrc' alt='$imageAlt'>".
                    "<div class='user'>".
                        "<p class='username'>$username</p>".
                        "<p class='handle'>$handle</p>".
                    "</div>".
                "</div>".
                "<div class='content'>".
                    "<p>$contentText</p>".
                "</div>".
                "<p class='timePosted'>$datePosted</p>".
                "<div class='analytics'>".
                    "<ul>".
                        "<li><a href='#'>reactions 12</a></li>".
                        "<li><a href='#'>Reclucks 5</a></li>".
                        "<li>
                            <form class='contentAndLowernav' action='likeAction.php' method='post'>
                                <input class='' type='hidden' name='postId' id='postId' value='$postId'>
                                <input class='' type='submit' name='submit' id='submit' value='like'>
                            </form>
                        </li>".
                        "<li><a href='#'>views 103</a></li>".
                        "<li><a href='#'>bookmark</a></li>".
                    "</ul>".
                "</div>".
            "</div>".
            "</article>";
        ?>
        </div>
        <?php 
        $postId = $post['id'];
        ?>
        <div class="createComment">
            <img src="assets/img/chicken-solid-white.png" alt="profilePicture">
            <form class="addComment" action="commentAction.php?postId=<?php echo $postId; ?>" method="post">
                <textarea class="" name="textareaReply" id="textareaReply" placeholder="Cluck your clucks.." required></textarea>
                <input class="postButton" type="submit" name="submit" id="submit" value="Reply">
            </form>
        </div>


        <div class="articles">
            <?php
            
            if (isset($_GET['postId']) && is_numeric($_GET['postId'])) {
                $postId = $_GET['postId'];
                
                $get_all_comments = $conn->prepare("SELECT * FROM comments WHERE postId = :postId");
                $get_all_comments->bindParam(":postId", $postId, PDO::PARAM_INT);
                $get_all_comments->execute();
            
                $comments = $get_all_comments->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($comments as $comment) {
                    $stmt = $conn->prepare("SELECT * FROM account WHERE id = :userId");
                    $stmt->bindParam(":userId", $comment['userId'], PDO::PARAM_INT);
                    $stmt->execute();
            
                    $account = $stmt->fetch(PDO::FETCH_ASSOC);
            
                    if ($account) {
                        $username = htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8');
                        $handle = htmlspecialchars($account['handle'], ENT_QUOTES, 'UTF-8');
                    } else {
                        $username = "Unknown User";
                        $handle = "@unknown";
                    }
            
                    $contentText = htmlspecialchars($comment['contentText'], ENT_QUOTES, 'UTF-8');
                    $datePosted = htmlspecialchars($comment['datePosted'], ENT_QUOTES, 'UTF-8');
                    
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
                                        "<li><a href='#'>Reclucks 5</a></li>".
                                        "<li>
                                            <form class='contentAndLowernav' action='likeCommentAction.php' method='post'>
                                                <input class='' type='hidden' name='postId' id='postId' value='$postId'>
                                                <input class='' type='submit' name='submit' id='submit' value='like'>
                                            </form>
                                        </li>".
                                        "<li><a href='#'>bookmark</a></li>".
                                    "</ul>".
                                "</div>".
                            "</div>".
                        "</article>";
                }
            } else {
                echo "Invalid or missing postId.";
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
