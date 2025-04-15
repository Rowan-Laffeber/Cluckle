<?php
require "../database/conn.php";
require "../partials/session.php";

$text = isset($_POST['textarea']) ? trim($_POST['textarea']) : '';

if (empty($text)) {
    header("Location: ../index.php?error=Content is required");
    exit;
}

$text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

try {

    $insert_user = $conn->prepare("INSERT INTO post (userId, contentText, datePosted) VALUES (:userId, :text, :date)");

    $insert_user->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $insert_user->bindValue(':text', $text, PDO::PARAM_STR);
    $insert_user->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);

    $insert_user->execute();

    header("Location: ../index.php");
    exit;
} catch (PDOException $e) {
    error_log("Error inserting post: " . $e->getMessage());
    header("Location: ../index.php?error=Something went wrong. Please try again later.");
    exit;
}
?>

