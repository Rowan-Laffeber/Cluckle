<?php
require("partials/session.php");
require("partials/top.php");
?>

<div class="pageContent">
    <div class="createAndArticles">


        <div class="privacy">
            <h1>What is Cluckle?</h1>
            <p>Cluckle is a social networking platform where users can share short messages, reply, and interact with others around the world. Similar to Twitter, Cluckle is all about fast, short updates — called cluckles — that let you share your thoughts, news, memes, or opinions with your followers.</p>

            <h2>What can you do on Cluckle?</h2>
            <ul>
                <li><strong>Post Clucks</strong><br>
                    Share short messages (up to 255 characters) with your followers or publicly. You can use text, images, hashtags, and mentions to make your message clearer.</li>

                <li><strong>Follow other users</strong><br>
                    Stay up to date with what friends, influencers, or public figures have to say by following them.</li>

                <li><strong>React and like</strong><br>
                    Reply to other users' cluckles and leave a like or a comment to show you agree — or just to show support.</li>

                <li><strong>Share Clucks (hrecluck)</strong><br>
                    See a fun or interesting cluck? Share it with your own followers with just one click.</li>

                <li><strong>Customize profiles</strong><br>
                    Set up your own profile with a profile picture, bio, banner, and your favorite cluck style.</li>
            </ul>

            <h2>What kind of website is Cluckle?</h2>
            <p>Cluckle is a blog-style website focused on fast communication and real-time conversations. It's designed for ease of use, speed, and social interaction. Whether you want to share news, express your opinion, or just post funny content — Cluckle gives you the space to make your voice heard.</p>

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
