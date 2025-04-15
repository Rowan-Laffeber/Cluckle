<?php
require "../database/conn.php";
require "../partials/session.php";

$stmt = $conn->prepare("SELECT * FROM account WHERE id = :adminId");
$stmt->bindParam(":adminId", $_SESSION['userId'], PDO::PARAM_INT);
$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_ASSOC);

$admin = htmlspecialchars($account['admin'], ENT_QUOTES, 'UTF-8');

if ($admin < 1){
    header("Location: ../profile.php?error=youre not an admin");
    exit;
}

$userId = isset($_POST['userId']) ? trim($_POST['userId']) : '';

if (empty($userId)) {
    header("Location: ../profile.php?error=Cannot validate userId");
    exit;
}

$userId = htmlspecialchars($userId, ENT_QUOTES, 'UTF-8');

try {
        $delete_post = $conn->prepare("DELETE FROM user WHERE userId = :userId");
        $delete_post->bindValue(':userId', $userId, PDO::PARAM_INT);
        $delete_post->execute();

    header("Location: ../profile.php");
    exit;
} catch (PDOException $e) {
    error_log("Error toggling like: " . $e->getMessage());
    header("Location: ../profile.php?error=Something went wrong. Please try again later.");
    exit;
}
?>





