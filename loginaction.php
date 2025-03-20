<?php 
require ("database/conn.php");


$get_all_users = $conn->prepare("SELECT * FROM account");
$get_all_users->execute();
$users = $get_all_users->fetchAll();

foreach ($users as $user){    
    echo $user['name'];
}