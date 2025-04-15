<?php
require "../database/conn.php";
require "../partials/session.php";

$status = isset($_POST['textarea']) ? trim($_POST['textarea']) : '';

if (empty($status)) {
    header("Location: ../profile.php?error=Status cannot be empty");
    exit;
}

$status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');

try {
    $update_status = $conn->prepare("UPDATE account SET status = :status WHERE id = :userId");
    $update_status->bindValue(':status', $status, PDO::PARAM_STR);
    $update_status->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $update_status->execute();

    header("Location: ../profile.php?success=Status updated");
    exit;
} catch (PDOException $e) {
    error_log("Error updating status: " . $e->getMessage());
    header("Location: ../profile.php?error=Something went wrong. Please try again later.");
    exit;
}
?>