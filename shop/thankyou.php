<html>
<?php session_start(); $conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');?>
<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/store.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Dankjewel!</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <?php
        if(isset($_SESSION['loggedin'])){
        echo "<a href='../bank/account.php'><span class='navbarname'>" . $_SESSION['fullname'] . "</span><a>";
        }
        ?>
    </div>
    <div id="headerimg">
        <span id="quote">Dankjewel voor je bestelling!</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
    
        <h3>Dankjewel voor je bestelling. Je krijgt binnenkort een e-mailbericht met een link/code voor je product.</h3>
        <a href="index.php" class="link">Terug naar de winkel</a>

    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>