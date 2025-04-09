<?php
require "database/conn.php";
require "partials/session.php";

$postId = isset($_POST['postId'])? trim($_POST['postId']) : '';

if (empty($postId)) {
    header("Location: index.php?error=Cannot validate post");
    exit;
}
$postId = htmlspecialchars($postId, ENT_QUOTES, 'UTF-8');   

try {

    $insert_user = $conn->prepare("INSERT INTO likes (userId, postId) VALUES (:userId, :postId)");

    $insert_user->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $insert_user->bindValue(':postId', $postId, PDO::PARAM_INT);

    $insert_user->execute();

    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    error_log("Error inserting like: " . $e->getMessage());
    header("Location: index.php?error=Something went wrong. Please try again later.");
    exit;
}
?>