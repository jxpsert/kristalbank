<html>
<?php session_start(); ?>
<head>
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo-01.svg">
    <title>Kristalbank - Over</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="index.php"><span class="item">Home</span><a>
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
        <span id="quote">Over Kristalbank</span>
    </div>
    <div id="contentwrapper">
        <p class="partitle">Wie?</p>
        <p>Kristalbank is en wordt gemaakt door Jasper Platenburg, HAVO 5 leerling op Kristallis Park Neerbosch.<br><br>jplatenburg@outlook.com<br><a class="link" href="https://www.jxpr.eu">www.jxpr.eu</a></p>
        <p class="partitle">Waarom?</p>
        <p>Kristalbank is eigenlijk meer een oefenproject dan een echt systeem. Wel is het uiterste best gedaan deze website/dienst zo goed mogelijk uit te werken, zodat het lijkt op een echte bank.</p>
        <p class="partitle">Vacatures</p>
        <p>Zoals hoogstwaarschijnlijk verwacht zijn er bij Kristalbank op dit moment geen open vacatures. Dit door het gebrek aan budget, lidmaatschap van de KvK en het feit dat <span class="money">kristallen</span> eigenlijk niks waard zijn.</p>
        <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>