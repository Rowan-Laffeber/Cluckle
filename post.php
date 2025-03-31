
     <?php
// Simpele PHP variabelen voor dynamische content
$username = "handle";
$join_date = "12-12-12";
$following = 10;
$followers = 10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clucker</title>
    <link rel="stylesheet" href="styles/main.css"
</head>
<body>
    <div class="sidebar-left">
        <div class="logo">Clucker</div>
        <nav>
            <ul>
                <li>Home</li>
                <li>Explore</li>
                <li>Notifications</li>
                <li>Messages</li>
                <li>Bookmarks</li>
                <li>Profile</li>
                <li>Premium</li>
                <li>More</li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">Home</div>

        <div class="profile-header">
            <h1><?php echo $username; ?></h1>
            <p>What's Clucking?</p>
            <p>Joined <?php echo $join_date; ?></p>
            <div class="profile-stats">
                <span><strong><?php echo $following; ?></strong> following</span>
                <span><strong><?php echo $followers; ?></strong> followers</span>
            </div>
        </div>
    </div>

    <div class="sidebar-right">
        <div class="search-box">
            <input type="text" placeholder="Search">
        </div>
    </div>
</body>
</html>
