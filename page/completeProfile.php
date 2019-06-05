<html>
    <head>
        <title>New Profile</title>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
        <link rel="stylesheet" type="text/css" href="../pageCod/css/competeProfile.css">
        <script src="../javascript/competeProfile.js"></script>
    </head>
    <body>
        <header>
            <img src="../image/banner-2.0.png" alt="Big-Logo">
        </header>

        <div class="form">
            <div id="errorMessages">

            </div>
            <form action="../pageCod/phpFile/RegisterFunctions/insertProfileAndAccount.php" method="POST" name="restu">
                <h2>Formular de introducere a datelor de profil.</h2>
                <h2>Daca daca renuntati acum toate datele vor fi pierdute.</h2>
                <ol>
                    <li>Inaltime    <input id="in" name="Inaltime" type="number" onkeyup="heightPeople();"/> </li>
                    <li>Greutate <input id="gr" name="Greutate" type="number"  onkeyup="wheitPeople()"/> </li>
                    <li>Varsta <input id="vr" name="Varsta"  type="number" onkeyup="age()" /> </li>
                    <li>Gen <input id="sx" name="Gen"  type="text" onkeyup="gen()" /> </li>
                </ol>
                <input id="send" name="request" type="submit" value="Send Data" onclick=" return sendData();">
            </form>
        </div>
    </body>
</html>