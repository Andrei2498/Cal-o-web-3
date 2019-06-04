<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
    <link rel="stylesheet" type="text/css" href="../pageCod/css/register.css">
    <script src="../javascript/Register.js"></script>
</head>

<body>
    <div class="form" >
        <div id="errorMessages">

        </div>
        <h2>Register</h2>
        <form action="../pageCod/phpFile/RegisterFunctions/register.php" method="POST" name="restu">
            <input id="fm" name="FirstName" placeholder="FirstName" type="text" onkeyup="testNume(this.value,this.id);" />
            <input id="lm" name="LastName" placeholder="LastName" type="text" onkeyup="testNume(this.value,this.id);"/>
            <input id="em" name="Email" placeholder="Your e-mail address" type="text"/>
            <input id= "nm" name="Username" placeholder="Username" type="text" onkeyup="searchResult(this.value);" />
            <input id="pw" name="password" placeholder="Password" type="password" onkeyup="dinamicPassTest(this.value)"/>
            <input id="re-pw" name="re-password" placeholder="Re-Password" type="password" onkeyup="testPassword()"/>
            <div class="terms">
                <input checked="" id="terms" name="terms" type="checkbox"/>
                <label for="terms"></label><a href="">Termeni si Conditii.</a>
            </div>
            <input type="submit" value="Create Acount" onclick="return submitRegisetr();" />
        </form>
    </div>
</body>

</html>