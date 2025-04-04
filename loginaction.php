<?php 
session_start();

require "database/conn.php";

$email = isset($_POST['Email']) ? trim($_POST['Email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($email) || empty($password)) {
    header("Location: login.php?error=Please enter both email and password.");
    exit;
}

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: login.php?error=Invalid email format.");
    exit;
}

try {
    $stmt = $conn->prepare("SELECT * FROM account WHERE email = :Email");
    $stmt->bindParam(":Email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $account = $stmt->fetch();

    if ($account && password_verify($password, $account['password'])) {
        $_SESSION['userId'] = $account['id'];
        $_SESSION['email'] = $account['email'];
        $_SESSION['loggedIn'] = true;

        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=Invalid email or password.");
        exit;
    }
} catch (PDOException $e) {
    error_log("Login failed: " . $e->getMessage());
    header("Location: login.php?error=An error occurred. Please try again later.");
    exit;
}
?>
