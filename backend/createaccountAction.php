<?php
require "../database/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $handle = isset($_POST['handle']) ? trim($_POST['handle']) : '';
    $phonenumber = isset($_POST['phonenumber']) ? trim($_POST['phonenumber']) : '';
    $email = isset($_POST['Email']) ? trim($_POST['Email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $repeatPassword = isset($_POST['repeatPassword']) ? $_POST['repeatPassword'] : '';

if ($password !== $repeatPassword) {
    header("Location: ../createAccount.php?error=Passwords do not match.");
    exit;
}

    if (empty($username) || empty($handle) || empty($phonenumber) || empty($email) || empty($password)) {
        header("Location: ../createAccount.php?error=Please fill in all fields.");
        exit;
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../createAccount.php?error=Invalid email format.");
        exit;
    }
    $handle = "@" . preg_replace("/[^a-zA-Z0-9_]/", "", $handle);
    $phonenumber = preg_replace("/[^0-9+()\- ]/", "", $phonenumber);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $check_handle = $conn->prepare("SELECT id FROM account WHERE handle = :handle");
        $check_handle->bindParam(":handle", $handle, PDO::PARAM_STR);
        $check_handle->execute();

        if ($check_handle->rowCount() > 0) {
            header("Location: ../createAccount.php?error=Handle is already taken.");
            exit;
        }
        $check_email = $conn->prepare("SELECT id FROM account WHERE email = :email");
        $check_email->bindParam(":email", $email, PDO::PARAM_STR);
        $check_email->execute();

        if ($check_email->rowCount() > 0) {
            header("Location: ../createAccount.php?error=Email is already registered.");
            exit;
        }

        $check_phone = $conn->prepare("SELECT id FROM account WHERE phonenumber = :phonenumber");
        $check_phone->bindParam(":phonenumber", $phonenumber, PDO::PARAM_STR);
        $check_phone->execute();

        if ($check_phone->rowCount() > 0) {
            header("Location: ../createAccount.php?error=Phone number is already in use.");
            exit;
        }

        $insert_user = $conn->prepare("INSERT INTO account (name, handle, phonenumber, email, password) VALUES (:username, :handle, :phonenumber, :email, :password)");
        $insert_user->bindParam(":username", $username, PDO::PARAM_STR);
        $insert_user->bindParam(":handle", $handle, PDO::PARAM_STR);
        $insert_user->bindParam(":phonenumber", $phonenumber, PDO::PARAM_STR);
        $insert_user->bindParam(":email", $email, PDO::PARAM_STR);
        $insert_user->bindParam(":password", $hash, PDO::PARAM_STR);
        $insert_user->execute();

        header("Location: ../login.php");
        exit;
    } catch (PDOException $e) {
        error_log("Error registering user: " . $e->getMessage());
        header("Location: ../createAccount.php?error=Registration failed. Please try again later.");
        exit;
    }
} else {
    header("Location: ../createAccount.php");
    exit;
}
?>
