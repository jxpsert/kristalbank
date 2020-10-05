<html>

<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Registreren</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="../index.php"><span class="item">Terug</span><a>
    </div>
    <div id="headerimg">
        <span id="quote">Registreer</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
        <div id="loginbox" style="height: auto;">
<?php
if(isset($_GET['error'])){
    switch($_GET['error']){
        case 1:
            echo "<p style='font-family: OpenSansRegular; color: red;'>E-mailadres invalide.</p>";
            break;
        
    }
}
?>
                <form method="POST" action="registeraction.php">
                    <label>Voornaam</label><br>
                    <input type="text" name="fname" placeholder="Sjef" required><br>
                    <label>Achternaam</label><br>
                    <input type="text" name="lname" placeholder="Mirakel" required><br>
                    <label>E-mailadres</label><br>
                    <input type="text" class="email" name="email" placeholder="smirakel@kristallis.nl" required><br>
                    <label>Klas</label><br>
                    <input type="text" name="class" placeholder="PNB_H5A" required><br>
                    <label>Wachtwoord</label>
                    <input type="password" name="pass" placeholder="Wachtwoord" required>
                    <input type="submit" value="Registreer">
                </form>
        </div>
    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>