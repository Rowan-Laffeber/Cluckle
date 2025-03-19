<?php
$username = "root";
$password = "";

try{
    $conn = new PDO(
        "mysql:host=localhost;dbname=database 1", 
        $username, 
        $password
    );    
    echo "Succesvolle database verbinding!";
}

catch (PDOException $foutmelding){    
    echo $foutmelding->getMessage();
}

$get_all_users = $conn->prepare("SELECT * FROM account");
$get_all_users->execute();
$users = $get_all_users->fetchAll();

foreach ($users as $user){    
    echo $user['name'];
}


