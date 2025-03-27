 <?php 
session_start();

 require "database/conn.php";
 
 $stmt = $conn->prepare("SELECT * FROM account WHERE email =:Email");
 $stmt->bindParam(":Email", $_POST['Email']);
 $stmt->execute();
 $account = $stmt->fetch();


 if(password_verify($_POST['password'], $account['password'])){
    echo "Klopt!";
    //Nu nog opzoeken hoe je een session plaats zodat jouw ingelogde status onthouden blijft over de website
   $_SESSION
    header("location: index.php");
 }else{
    echo "klopt niet";
 }


