<?php
require "../database/conn.php";
require "../partials/session.php";

$commentId = isset($_POST['commentId']) ? trim($_POST['commentId']) : '';

if (empty($commentId)) {
    header("Location: ../index.php?error=Cannot validate commentId");
    exit;
}

$commentId = htmlspecialchars($commentId, ENT_QUOTES, 'UTF-8');

try {
    $check_like = $conn->prepare("SELECT * FROM likecomment WHERE userId = :userId AND commentId = :commentId");
    $check_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $check_like->bindValue(':commentId', $commentId, PDO::PARAM_INT);
    $check_like->execute();

    if ($check_like->rowCount() > 0) {
        $delete_like = $conn->prepare("DELETE FROM likecomment WHERE userId = :userId AND commentId = :commentId");
        $delete_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $delete_like->bindValue(':commentId', $commentId, PDO::PARAM_INT);
        $delete_like->execute();
    } else {
        $insert_like = $conn->prepare("INSERT INTO likecomment (userId, commentId) VALUES (:userId, :commentId)");
        $insert_like->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $insert_like->bindValue(':commentId', $commentId, PDO::PARAM_INT);
        $insert_like->execute();
    }

    header("Location: ../index.php");
    exit;
} catch (PDOException $e) {
    error_log("Error toggling like: " . $e->getMessage());
    header("Location: ../index.php?error=Something went wrong. Please try again later.");
    exit;
}
?>
