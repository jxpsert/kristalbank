<html>
<?php
session_start();
?>
<head>
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo-01.svg">
    <script type="text/javascript" src="js/quote.js"></script>
    <title>Kristalbank - Home</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="#"><span class="item">Home</span><a>
        <a href="bank/"><span class="item">

        <?php
            if(!isset($_SESSION['loggedin'])){
                echo "Log in";
            }else{
                echo "Dashboard";
            }
        ?>

        </span><a>
       <?php
       if(!isset($_SESSION['loggedin'])){
           echo "<a href='bank/register.php'><span class='item'>Registreren</span><a>";
       }
        ?>
        <a href="about.php"><span class="item">Over</span><a>
        <?php
        if(isset($_SESSION['loggedin'])){
        echo "<a href='bank/account.php'><span class='navbarname'>" . $_SESSION['fullname'] . "</span><a>";
        }
        ?>
    </div>
    <div id="headerimg">
        <span id="quote"></span>
    </div>
    <div id="contentwrapper">
        <p class="partitle">Waarom Kristalbank?</p>
        <p>Kristalbank is een bank, speciaal gecreeërd voor leerlingen van <a class="link"
                href="https://www.kristallis.nl/">Kristallis</a>. Bij Kristalbank spaar je geen euro's, maar
            <span class="money">kristallen</span>. <!--Een kristal is ongeveer 50 <span class="money">eurocent</span> waard.-->
            Door schoolpunten te behalen kan je kristallen verdienen. Hoe hoger je punt, des te meer kristallen je krijgt.</p>
            <p class="disclaimer">Het is niet mogelijk om kristallen in te wisselen tegen euro's.</p>
        <table class="table">
            <tr>
                <th>Je behaalde punt</th>
                <th>Kristallen</th>
            </tr>
            <tr>
                <td>3,0 tot 5,0</td>
                <td>2</td>
            </tr>
            <tr>
                <td>5,0 tot 7,0</td>
                <td>4</td>
            </tr>
            <tr>
                <td>7,0 tot 9,0</td>
                <td>6</td>
            </tr>
            <tr>
                <td>9,0 tot en met 10</td>
                <td>8</td>
            </tr>
        </table>
        <p class="partitle">Wat kan ik met kristallen?</p>
        <p>Binnen het dashboard bevindt zich een winkel, waar leerlingen met hun kristallen online producten kunnen kopen. Denk hierbij aan codes voor videogames, cadeaukaarten, etc.</p>
        <div class="bottomspacer">
        </div>
    </div>
    <div class="bottomspacer"></div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>