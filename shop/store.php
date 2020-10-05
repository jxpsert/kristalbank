<html>
<?php session_start(); $conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');?>
<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/store.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Winkel</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="../bank/index.php"><span class="item">Terug naar dashboard</span><a>
        <?php
        if(isset($_SESSION['loggedin'])){
        echo "<a href='../bank/account.php'><span class='navbarname'>" . $_SESSION['fullname'] . "</span><a>";
        }
        ?>
    </div>
    <div id="headerimg">
        <span id="quote">Kristallen uitgeven</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">

    <p style='color: red; font-family: OpenSansRegular;'>Deze functies zijn nog in ontwikkeling. Bestellingen zullen niet ontvangen worden, en kristallen zullen niet worden geretourneerd.</p>

    <?php
        if(isset($_GET['error'])){
            switch($_GET['error']){
                case 1:
                    echo "<p style='color: red; font-family: OpenSansRegular;'>Je hebt niet genoeg kristallen.</p>";
                break;
            }
        }
    ?>
    <?php
        $statement = $conn->prepare("SELECT * FROM kb_storeproducts WHERE available=1");
        $statement->execute();
        $result = $statement->get_result();
        if(!$result->num_rows < 1){
            while($row = $result->fetch_assoc()){
        echo "<div class='product'>";
        echo "<span class='productname'>" . $row['name'] . "</span>";
        echo "<span class='productdesc'>" . $row['description'] . "</span>";
        echo "<span class='productprice'>" . $row['price'] . "</span>";
        echo "<a href='buy.php?p=" . $row['id'] . "' class='productbutton'><span>Kopen</span></a>";
        echo "</div>";
            }
        }
    ?>

    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>