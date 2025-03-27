<?php 
require "database/conn.php";


$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$handle = "@" . $_POST['handle'];


$insert_user = $conn->prepare("INSERT INTO account (name,handle,phonenumber,email,password) VALUES (:username, :handle, :phonenumber, :Email, :password)");
$insert_user->bindParam(":username", $_POST['username']);
$insert_user->bindParam(":handle", $handle);
$insert_user->bindParam(":phonenumber", $_POST['phonenumber']);
$insert_user->bindParam(":Email", $_POST['Email']);
$insert_user->bindParam(":password", $hash);

$insert_user->execute();

header("location: login.php");