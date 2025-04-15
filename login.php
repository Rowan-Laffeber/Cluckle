<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="The social media website Cluckle">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/chicken-solid-white.png">
    <title>Cluckle.com</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <!-- <link id="color_mode" rel="stylesheet" href="assets/cluckle-darkmode.css"> -->
  </head>
  <body>

    <div class="login">
        <img src="assets/img/chicken-line-white.png" alt="">
        <div class="loginSideText">
            <h1>Whats Clucking</h1>
            <form action="backend/loginaction.php" method="post">
                <label for="Email">Email</label>
                    <input type="Email" name="Email" id="Email" placeholder="Email" required >
                <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                <input class="loginButton" type="submit" name="submit" id="submit" value="Log in">
            </form>
            <div class=linksLoginPage>
                <a href="#">forgot Password</a>
                <a href="createAccount.php">create an account</a>
            </div>
        </div>
    </div>
    
</body>
</html>