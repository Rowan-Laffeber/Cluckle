<?php
require "database/conn.php";
require "partials/session.php";

$postId = isset($_POST['postId']) ? trim($_POST['postId']) : '';

if (empty($postId)) {
    header("Location: index.php?error=Cannot validate postId");
    exit;
}

$postId = htmlspecialchars($postId, ENT_QUOTES, 'UTF-8');

try {
    // Check if the like already exists
    $check_like = $conn->prepare("SELECT * FROM likes WHERE userId = :userId AND postId = :postId");
    $check_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $check_like->bindValue(':postId', $postId, PDO::PARAM_INT);
    $check_like->execute();

    if ($check_like->rowCount() > 0) {
        // Like exists, so remove it
        $delete_post = $conn->prepare("DELETE FROM post WHERE userId = :postId AND postId = :postId");
        $delete_post->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $delete_post->bindValue(':postId', $postId, PDO::PARAM_INT);
        $delete_post->execute();
    } else {
        // Like does not exist, so insert it
        $insert_like = $conn->prepare("INSERT INTO likes (postId, postId) VALUES (:userId, :postId)");
        $insert_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $insert_like->bindValue(':postId', $postId, PDO::PARAM_INT);
        $insert_like->execute();
    }

    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    error_log("Error toggling like: " . $e->getMessage());
    header("Location: index.php?error=Something went wrong. Please try again later.");
    exit;
}
?>

<form class='contentAndLowernav' action='user.php.php' method='post'>
                         <input class='' type='hidden' name='postId' id='postId' value='$postId'>
                         <input class='' type='submit' name='submit' id='submit' value='like'>
                         <a>$likeCount</a>
                     </form>



