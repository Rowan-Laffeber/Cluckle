 <?php 
session_start();

 require "database/conn.php";
 
 $stmt = $conn->prepare("SELECT * FROM account WHERE email =:Email");
 $stmt->bindParam(":Email", $_POST['Email']);
 $stmt->execute();
 $account = $stmt->fetch();


 if(password_verify($_POST['password'], $account['password'])){
    $_SESSION['user_id'] = $account['id'];
    $_SESSION['email'] = $account['email'];
    $_SESSION['logged_in'] = true; 

   echo $_SESSION['logged_in'];
   echo $_SESSION['user_id'];
   echo $_SESSION['email'];
   //  header("location: index.php");
 }else{
    echo "klopt niet";
 }


