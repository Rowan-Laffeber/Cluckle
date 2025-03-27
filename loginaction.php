 <?php 
// require ("database/conn.php");


// $get_all_users = $conn->prepare("SELECT * FROM account");
// $get_all_users->execute();
// $users = $get_all_users->fetchAll();

// foreach ($users as $user){    
//     echo $user['name'];
// }

 
 require "database/conn.php";
 
 $stmt = $conn->prepare("SELECT * FROM account WHERE email =:Email");
 $stmt->bindParam(":Email", $_POST['Email']);
 $stmt->execute();
 $userEmail = $stmt->fetch();
 var_dump($userEmail);
// header("location: test.php");
