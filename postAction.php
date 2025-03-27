<?php 
require "database/conn.php";


$insert_user = $conn->prepare("INSERT INTO post (contentText,datePosted,contentPic,contentVid) VALUES (:text, :date, :contentPic, :contentVid)");
$insert_user->bindParam(":text", $_POST['textarea']);
// $insert_user->bindParam(":contentPic", $_POST['contentPic']);
$insert_user->bindParam(":contentVid", $_POST['contentVid']);
$insert_user->bindParam(":date", date("Y-m-d"));

$insert_user->execute();

header("location: index.php");