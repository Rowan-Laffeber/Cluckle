<?php
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['logged_in'] !== true ||
    !isset($_SESSION['userId']) || !isset($_SESSION['email'])) {
    header("location: login.php");
    exit;
}