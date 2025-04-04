<?php
require "database/conn.php";
require "partials/session.php";

$text = isset($_POST['textareaReply']) ? trim($_POST['textareaReply']) : '';

if (empty($text)) {
    header("Location: post.php?postId=" . $_GET['postId'] . "&error=Content is required");
    exit;
}

$text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

$postId = isset($_GET['postId']) ? (int) $_GET['postId'] : null;

if ($postId && $text) {
    try {
        $stmt = $conn->prepare("INSERT INTO comments (postId, userId, contentText, datePosted) VALUES (:postId, :userId, :text, :date)");
        
        $stmt->bindValue(":postId", $postId, PDO::PARAM_INT);
        $stmt->bindValue(":userId", $_SESSION['userId'], PDO::PARAM_INT);
        $stmt->bindValue(":text", $text, PDO::PARAM_STR);
        $stmt->bindValue(":date", date("Y-m-d"), PDO::PARAM_STR);

        $stmt->execute();

        header("Location: post.php?postId=" . $postId);
        exit;
    } catch (PDOException $e) {
        error_log("Error inserting comment: " . $e->getMessage());
        header("Location: post.php?postId=" . $postId . "&error=Something went wrong. Please try again later.");
        exit;
    }
} else {
    header("Location: post.php?postId=" . $postId . "&error=Invalid postId or comment content.");
    exit;
}
?>
