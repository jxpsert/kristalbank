<html>
<?php session_start(); 
?>
<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Account</title>
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
        <span>Account</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
        <p class="partitle">Accountinformatie</p>
        <p>Account ID: <?php echo $_SESSION['userid']; ?><p>
        <p>Volledige naam: <?php echo $_SESSION['fullname']; ?></p>
        <p>E-Mail adres: <?php echo $_SESSION['email']; ?></p>
        <p>Accounttype: <?php
            if($_SESSION['acctype'] == 0){
                echo "Gebruiker";
            }else if($_SESSION['acctype'] == 1){
                echo "Medewerker";
            }else if($_SESSION['acctype'] == 2){
                echo "Administrator";
            }else{
                echo "Onbekend";
            }
        ?>
        </p>
        <p>Klas: <?php echo $_SESSION['class']; ?></p>
        <a href="changepass.php" class="link">Verander wachtwoord</a>
        <br>
        <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=<?php echo "KRISTALBANK - " . $_SESSION['userid'] . " / " . $_SESSION['fullname'] . " / " . $_SESSION['class']; ?>">
    <div class="bottomspacer">
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>