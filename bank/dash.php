<html>
<?php session_start(); 

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php?error=4");
}

$userid = $_SESSION['userid'];
$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
$queryone = "SELECT * FROM `kb_useraccounts` WHERE id = '$userid' LIMIT 1";

$balance = 0;

$resultone = $conn->query($queryone);

if ($resultone->num_rows > 0) {
    while($row = $resultone->fetch_assoc()) {
        $balance = $row['balance'];
    }
}
?>
<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="icon" href="../img/logo-01.svg">
    <title>Kristalbank - Dashboard</title>
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
    <div id="headerimg" style="line-height: 112px;">
        <span>Welkom, <?php echo $_SESSION['fullname'];?>!</span><br>
        <span>Je hebt <?php echo $balance; ?> kristallen.</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">
    <p class="partitle">Meest recente uitbetaling</p>
    <?php
        $query = "SELECT * FROM `kb_payments` WHERE user = '$userid' AND posneg = 'pos' ORDER BY date DESC LIMIT 1";
        
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<table class='table'><tr><th>Datum</th><th>Kristallen</th><th>Reden</th></tr><tr>";
                echo "<td><p>" . $row['date'] . "</p></td>";
                echo "<td><p>" . $row['amount'] . " kristallen</p></td>";
                echo "<td><p>" . $row['reason'] . "</p></td>";
                echo "</tr></table>";
            }
        }else{
            echo "<p style='font-family: OpenSansRegular'>Er zijn geen uitbetalingen gevonden.</p>";
        }
    ?>

    <p class="partitle">Alle betalingen</p>
    <?php
        $query = "SELECT * FROM `kb_payments` WHERE user = '$userid' ORDER BY date DESC";
        
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            echo "<table class='table'><tr><th>Datum</th><th>Kristallen</th><th>Reden</th></tr>";
            while($row = $result->fetch_assoc()) {
                if($row['posneg'] === 'pos'){
                    $posneg = "+ ";
                }else{
                    $posneg = "- ";
                }
                echo "<tr><td><p>" . $row['date'] . "</p></td>";
                echo "<td><p>" . $posneg . $row['amount'] . " kristallen</p></td>";
                echo "<td><p>" . $row['reason'] . "</p></td></tr>";
   
            }
            echo "</table>";
        }else{
            echo "<p style='font-family: OpenSansRegular'>Er zijn geen betalingen gevonden.</p>";
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