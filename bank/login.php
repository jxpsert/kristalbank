<html>

<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Log in</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="../index.php"><span class="item">Terug</span><a>
    </div>
    <div id="headerimg">
        <span id="quote">Log in</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
    <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 1){
                    print "<p style='font-family: OpenSansRegular; color: red;'>Onjuist wachtwoord.</p>";
                }else if($_GET['error'] == 2){
                    print "<p style='font-family: OpenSansRegular; color: red;'>Er is geen account gevonden met dit e-mailadres.</p>";
                }
                else if($_GET['error'] == 0){
                    print "<p style='font-family: OpenSansRegular; color: green;'>Geregistreerd. Log in.</p>";
                }else if($_GET['error'] == 4){
                    print "<p style='font-family: OpenSansRegular; color: red;'>Je sessie is verlopen. Log opnieuw in.</p>";
                }
            }
        ?>
        <div id="loginbox" style="height: auto;">

                <form method="POST" action="loginaction.php">
                    <label>E-mailadres</label>
                    <input type="text" name="user" placeholder="E-mailadres" required>
                    <label>Wachtwoord</label>
                    <input type="password" name="pass" placeholder="Wachtwoord" required>
                    <input type="submit" value="Log in">
                </form>
                <a class="link" href="register.php">Nog geen account? Registreer nu!</a>
        </div>
    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>