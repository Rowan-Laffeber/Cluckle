<?php
session_start(); 

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || 
    !isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("location: login.php");
    exit;
}