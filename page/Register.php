<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
    <link rel="stylesheet" type="text/css" href="../pageCod/css/register.css">
</head>

<body>
    <div class="form">
        <?php
        if (isset($_COOKIE['failed'])) {
            echo '<h2 style="color:red;">Acest nume deja exista</h2>';
        }
        if (isset($_COOKIE['ExistaDeja'])) {
            echo $_COOKIE['ExistaDeja'];
        }
        ?>
        <h2>Register</h2>
        <form action="../pageCod/phpFile/register.php" method="POST">
            <input name="FirstName" placeholder="FirstName" type="text" />
            <input name="LastName" placeholder="LastName" type="text" />
            <input name="Email" placeholder="Your e-mail address" type="text" />
            <input name="Username" placeholder="Username" type="text" />
            <input id="pw" name="password" placeholder="Password" type="password" />
            <input id="re-pw" name="re-password" placeholder="Re-Password" type="password" />
            <div class="terms">
                <input checked="" id="terms" name="terms" type="checkbox" />
                <label for="terms"></label><a href="">Termeni si Conditii.</a>
            </div>
            <input type="submit" value="Create Acount" />
        </form>


    </div>
</body>

</html>