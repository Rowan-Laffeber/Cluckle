<?php
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true || 
    !isset($_SESSION['userId']) || !isset($_SESSION['email'])) {
    header("location: login.php");
    exit;
 } //else{
//     header("location: login.php");
// }

