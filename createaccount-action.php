<?php
require "database/conn.php";

// Ensure the form is submitted and inputs are present
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $handle = isset($_POST['handle']) ? trim($_POST['handle']) : '';
    $phonenumber = isset($_POST['phonenumber']) ? trim($_POST['phonenumber']) : '';
    $email = isset($_POST['Email']) ? trim($_POST['Email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if any input field is empty and redirect if true
    if (empty($username) || empty($handle) || empty($phonenumber) || empty($email) || empty($password)) {
        header("Location: register.php?error=Please fill in all fields.");
        exit;
    }

    // Sanitize the email and validate format
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=Invalid email format.");
        exit;
    }

    // Sanitize the handle and ensure it starts with @
    $handle = "@" . preg_replace("/[^a-zA-Z0-9_]/", "", $handle); // Allow only alphanumeric characters and underscores

    // Sanitize the phone number to allow only digits and a few special characters
    $phonenumber = preg_replace("/[^0-9+()\- ]/", "", $phonenumber); // Only allow numbers and common phone symbols

    // Hash the password securely
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query
    try {
        $insert_user = $conn->prepare("INSERT INTO account (name, handle, phonenumber, email, password) VALUES (:username, :handle, :phonenumber, :email, :password)");

        // Bind the parameters
        $insert_user->bindParam(":username", $username, PDO::PARAM_STR);
        $insert_user->bindParam(":handle", $handle, PDO::PARAM_STR);
        $insert_user->bindParam(":phonenumber", $phonenumber, PDO::PARAM_STR);
        $insert_user->bindParam(":email", $email, PDO::PARAM_STR);
        $insert_user->bindParam(":password", $hash, PDO::PARAM_STR);

        // Execute the query
        $insert_user->execute();

        // Redirect to the login page after successful registration
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        // Log the error and redirect to the registration page
        error_log("Error registering user: " . $e->getMessage());
        header("Location: createAccount.php?error=Registration failed. Please try again later.");
        exit;
    }
} else {
    header("Location: createAccount.php");
    exit;
}
?>
