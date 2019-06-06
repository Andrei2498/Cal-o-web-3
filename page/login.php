<!DOCTYPE html>
<html lang="EN">
    <head>
            <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
            <link rel="stylesheet" type="text/css" href="../pageCod/css/login.css">
        <title>
            Login
        </title>
        
    </head>
    <body>
        <div class="login">
            <?php
                if(isset($_COOKIE['failed'])){
                    echo '<h2 style="color:red;">Unsername sau parola introduse incorect.</h2>';
                }
            ?>
            <h2>Sign in</h2>
            <form action="../pageCod/phpFile/loginFunction.php" method="POST">
                <input id="un" name="username" placeholder="Username" type="text"/>
                <input id="pw" name="password" placeholder="Password" type="password"/>
                <div class="remember">
                  <input checked="" id="remember" name="remember" type="checkbox"/>
                  <label for="remember"></label>Remember me
                </div>
                <input id="sbm" type="submit" value="Sign in" onclick="collectDataForm()"/>
            </form>
            <a class="forgot" href="Register.html">Not Registered?</a>
            <a class="forgot" href="RecoverPassword.html">Forgot your password?</a>
        </div>
        <script src="../javascript/loginFile.js"></script>
    </body>
</html>