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
    $check_like = $conn->prepare("SELECT * FROM likes WHERE userId = :userId AND postId = :postId");
    $check_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $check_like->bindValue(':postId', $postId, PDO::PARAM_INT);
    $check_like->execute();

    if ($check_like->rowCount() > 0) {
        $delete_like = $conn->prepare("DELETE FROM likes WHERE userId = :userId AND postId = :postId");
        $delete_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $delete_like->bindValue(':postId', $postId, PDO::PARAM_INT);
        $delete_like->execute();
    } else {
        $insert_like = $conn->prepare("INSERT INTO likes (userId, postId) VALUES (:userId, :postId)");
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
