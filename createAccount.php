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

    <div class="createAccount">
        <img src="assets/img/chicken-line-white.png" alt="">
        <div class="createAccountSideText">
            <h1>Whats Clucking</h1>
            <form action="createaccount-action.php" method="POST"> <!-- loginaction.php -->
                <div class="createAccountFull">
                    <div class="createAccountHalf">
                        <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" required >
                        <label for="handle">Handle</label>
                            <input type="text" name="handle" id="handle" placeholder="Handle" required >
                        <label for="phonenumber">Phone number</label>
                            <input type="tel" name="phonenumber" id="phonenumber" placeholder="Phone number" required minlength="11" maxlength="14">
                    </div>
                    <div class="createAccountHalf createAccountRight">
                        <label for="Email">Email</label>
                            <input type="Email" name="Email" id="Email" placeholder="Email" required >
                        <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        <label for="repeatPassword">Repeat password</label>
                            <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Repeat Password" required>

                    </div>
                </div>
                
                <input class="createAccountButton" type="submit" name="submit" id="submit" value="Create account">

            </form>
            <div class=linksCreateAccountPage>
                <a href="#">forgot Password</a>
                <a href="login.php">already have an account?</a>
            </div>
        </div>
    </div>

</body>
</html>