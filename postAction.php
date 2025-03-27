<?php 
require "database/conn.php";


$insert_user = $conn->prepare("INSERT INTO post (contentText,datePosted) VALUES (:text, :date)");
$insert_user->bindParam(":text", $_POST['textarea']);
$insert_user->bindParam(":date", date("Y-m-d"));

$insert_user->execute();

header("location: index.php");