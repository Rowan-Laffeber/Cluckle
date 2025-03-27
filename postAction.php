<?php 
require "database/conn.php";
require ("partials/session.php");
// $userId = $_SESSION['userId'];
$insert_user = $conn->prepare("INSERT INTO post (userId,contentText,datePosted) VALUES (:userId, :text, :date)");
$insert_user->bindParam(":userId", $_SESSION['userId']);
$insert_user->bindParam(":text", $_POST['textarea']);
// $insert_user->bindParam(":contentPic", $_POST['contentPic']);
// $insert_user->bindParam(":contentVid", $_POST['contentVid']);
$insert_user->bindParam(":date", date("Y-m-d"));

$insert_user->execute();

header("location: index.php");