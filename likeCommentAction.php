<?php
require "database/conn.php";
require "partials/session.php";

$commentId = isset($_POST['commentId'])? trim($_POST['commentId']) : '';

if (empty($commentId)) {
    header("Location: index.php?error=Cannot validate commentId");
    exit;
}
$commentId = htmlspecialchars($commentId, ENT_QUOTES, 'UTF-8');   

try {

    $insert_user = $conn->prepare("INSERT INTO likecomment (userId, commentId) VALUES (:userId, :commentId)");

    $insert_user->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $insert_user->bindValue(':commentId', $commentId, PDO::PARAM_INT);

    $insert_user->execute();

    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    error_log("Error inserting like: " . $e->getMessage());
    header("Location: index.php?error=Something went wrong. Please try again later.");
    exit;
}
?>