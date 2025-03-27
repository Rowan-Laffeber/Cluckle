<?php 
require "database/conn.php";
require ("partials/session.php");

$insert_user = $conn->prepare("INSERT INTO post (userId,contentText,datePosted,contentPic,contentVid) VALUES (:userId, :text, :date, :contentPic, :contentVid)");
$insert_user->bindParam(":userId", $_POST['textarea']);


$insert_user->bindParam(":text", $_SESSION['userId']);
// $insert_user->bindParam(":contentPic", $_POST['contentPic']);
// $insert_user->bindParam(":contentVid", $_POST['contentVid']);
$insert_user->bindParam(":date", date("Y-m-d"));

$insert_user->execute();

header("location: index.php");