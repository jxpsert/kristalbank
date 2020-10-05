<html>
<?php session_start(); $conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');?>
<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/store.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Winkel</title>
</head>

<?php
    $statement = $conn->prepare("SELECT * FROM `kb_storeproducts` WHERE id=?");
    $statement->bind_param("i", $_GET['p']);
    $statement->execute();
    $result = $statement->get_result();
    $productinfo = $result->fetch_assoc();
?>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="index.php"><span class="item">Terug naar winkel</span><a>
        <?php
        if(isset($_SESSION['loggedin'])){
            echo "<a href='../bank/account.php'><span class='navbarname'>" . $_SESSION['fullname'] . "</span><a>";
        }
        ?>
    </div>
    <div id="headerimg">
        <span id="quote"><?php echo $productinfo['name']; ?></span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
    <br><br>
        <span>Je bent '<?php echo $productinfo['name']; ?>' aan het kopen voor</span><br>
        <span style="color: #FFB019; font-size: 25px;"><?php echo $productinfo['price']; ?></span><br>
        <span>kristallen.</span>
        <br><br>
        <span style="font-family: OpenSansBold;">Beschrijving:</span><br><span><?php echo $productinfo['description']; ?></span>
        <br><br>
        <form action="buyaction.php?p=<?php echo $productinfo['id']; ?>" method="POST">
        <input style="width: 15%;" type="submit" value="Betalen">
    </form>
    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>