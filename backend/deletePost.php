<?php
require "../database/conn.php";
require "../partials/session.php";

$postId = isset($_POST['postId']) ? trim($_POST['postId']) : '';

if (empty($postId)) {
    header("Location: ../profile.php?error=Cannot validate postId");
    exit;
}

$postId = htmlspecialchars($postId, ENT_QUOTES, 'UTF-8');

try {
        $delete_post = $conn->prepare("DELETE FROM post WHERE userId = :userId AND id = :postId");
        $delete_post->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $delete_post->bindValue(':postId', $postId, PDO::PARAM_INT);
        $delete_post->execute();

    header("Location: ../profile.php");
    exit;
} catch (PDOException $e) {
    error_log("Error toggling like: " . $e->getMessage());
    header("Location: ../profile.php?error=Something went wrong. Please try again later.");
    exit;
}
?>





