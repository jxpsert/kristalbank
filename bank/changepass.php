<html>
<?php session_start(); 
?>
<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Verander wachtwoord</title>
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
        <span>Wachtwoord veranderen</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
    <?php
        if(isset($_GET['changed'])){
            if($_GET['changed'] == 1){
                echo "<p>Je wachtwoord is veranderd.</p>";
            }else{
                echo "<p>Er ging iets mis.</p>";
            }
        }
    ?>
    <div id="loginbox" style="height: 150px;">
            <form method="POST" action="changepassaction.php">
            <label>Nieuw wachtwoord</label>
            <input type="password" name="newpass" placeholder="Wachtwoord" required>
            <input type="submit" value="Verander">
            </div>
    <div class="bottomspacer">
        
        </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>