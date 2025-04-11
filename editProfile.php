<?php
require ("partials/top.php");
require ("partials/session.php");
require ("database/conn.php");

$stmt = $conn->prepare("SELECT * FROM account WHERE id =:userId");
$stmt->bindParam(":userId", $_SESSION['userId'], PDO::PARAM_INT);
$stmt->execute();
$account = $stmt->fetch();

$userId = htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8');
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
                <form action="editProfileAction.php" method='post'>
                    <textarea name="textarea" id="textarea" ></textarea>
                    <input type='hidden' name='userId' id='userId' value='<?php echo $userId?>'>

                    <input type="submit" value="edit">
                </form>
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

