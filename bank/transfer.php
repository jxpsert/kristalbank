<html>

<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Overmaken</title>
</head>

<body>
<div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="../index.php"><span class="item">Terug</span><a>
        <a href="dash.php"><span class="item">Dashboard</span><a>
        <a href="../shop/index.php"><span class="item">Winkel</span><a>
        <a href="account.php"><span class="item">Account</span><a>
        <?php
                if($_SESSION['acctype'] == 2){
                    echo "<a href='../admin'><span class='item'>Admin</span><a>";
                }
            ?>
        <a href="logoutaction.php"><span class="item">Log uit</span><a>
    </div>
    <div id="headerimg">
        <span id="quote">Kristallen overmaken</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
    <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 1){
                    print "<p style='font-family: OpenSansRegular; color: red;'>Je hebt niet genoeg kristallen.</p>";
                }else if($_GET['error'] == 2){
                    print "<p style='font-family: OpenSansRegular; color: red;'>Er is geen account gevonden met dit ID.</p>";
                }else if($_GET['error'] == 3){
                    print "<p style='font-family: OpenSansRegular; color: red;'>De gegeven hoeveelheid is geen nummer.</p>";
                }else if($_GET['error'] == 4){
                    print "<p style='font-family: OpenSansRegular; color: red;'>Databasefout. Probeer het later opnieuw.</p>";
                }else if($_GET['error'] == 0){
                    print "<p style='font-family: OpenSansRegular; color: green;'>Gelukt!</p>";
                }
            }
        ?>
        <!--<div id="loginbox">
                <form method="POST" action="transferaction.php">
                    <label>Ontvanger</label>
                    <input type="text" name="recipient" placeholder="12345" required>
                    <label>Hoeveelheid</label>
                    <input type="text" name="amount" placeholder="5" required><br>
                    <input type="submit" value="Overmaken">
                </form>
        </div>-->
        <h4 style="color: red;">Deze functie is tijdelijk uitgeschakeld.</h4>
    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>