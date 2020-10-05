<?php
session_start();
if($_SESSION['acctype'] != 2){
    header('Location: ../index.php');
}
?>

<html>

<head>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/logo-01.svg">
    <script type="text/javascript" src="../js/search.js"></script>
    <title>Kristalbank - Admin</title>
</head>

<body>
    <div id="navbar">
        <img id="navbarlogo" src="../img/logo-01.svg"><a href=""><span id="title">Kristalbank</span></a>
        <a href="../bank/index.php"><span class="item">Terug naar dashboard</span><a>
        <a href="#gebruikers"><span class="item">Gebruikers</span><a>
        <a href="#betalingen"><span class="item">Betalingen</span><a>
        <a href="#bestellingen"><span class="item">Bestellingen</span><a>
        <a href="#uitbetalen"><span class="item">Uitbetalen</span><a>
    </div>
    <div id="headerimg">
        <span id="quote">Admin panel</span>
    </div>
    <div id="contentwrapper" style="text-align: center;">

        <div class="bottomspacer">
            <h1 id="gebruikers">Gebruikers</h1>
            <input style="width: 15%; font-family: OpenSansRegular;" type='text' id="gebruikersZoeken" onkeyup="searchusers()" placeholder="Zoek naar namen"><span>   </span><input style="width: 15%; font-family: OpenSansRegular;" type='text' id="gebruikersZoekenId" onkeyup="searchusersbyid()" placeholder="Zoek naar id's"><span>   </span><input style="width: 15%; font-family: OpenSansRegular;" type='text' id="gebruikersZoekenKlas" onkeyup="searchusersbyclass()" placeholder="Zoek naar klassen"><br>
            <?php
                $conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
                $query = "SELECT * FROM `kb_useraccounts` ORDER BY id ASC";
                
                $result = $conn->query($query);
                
                if ($result->num_rows > 0) {
                    echo "<table id='gebruikersTabel' class='table'><tr><th>ID</th><th>Accounttype</th><th>Naam</th><th>E-mailadres</th><th>Kristallen</th><th>Klas</th><th>Acties</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td><p>" . $row['id'] . "</p></td>";
                        echo "<td><p>" . accountType($row['accType']) . "</p></td>";
                        echo "<td><p>" . $row['fName'] . " " . $row['lName'] . "</p></td>";
                        echo "<td><p>" . $row['email'] . "</p></td>";
                        echo "<td><p>" . $row['balance'] . "</p></td>";
                        echo "<td><p>" . $row['class'] . "</p></td>";
                        echo "<td><a href='deleteaccount.php?user=" . $row['id'] . "'><p style='color: red; text-decoration-color: white;'>Verwijderen</p></a></td></tr>";
                    }
                    echo "</table>";
                }

                function accountType($typeid){
                    switch($typeid){
                        case 2:
                            return "Administrator";
                            break;
                        case 1:
                            return "Medewerker";
                            break;
                        case 0:
                            return "Gebruiker";
                            break;
                    }
                }
            ?>
            <h1 id="betalingen">Betalingen</h1>
            <?php
                                $query2 = "SELECT * FROM `kb_payments` ORDER BY date ASC";
                
                                $result2 = $conn->query($query2);
                                
                                if ($result2->num_rows > 0) {
                                    echo "<table class='table'><tr><th>Datum</th><th>ID</th><th>Naar</th><th>Reden</th><th>Kristallen</th><th>Acties</th></tr>";
                                    while($row = $result2->fetch_assoc()) {
                                        echo "<tr><td><p>" . $row['date'] . "</p></td>";
                                        echo "<td><p>" . $row['id'] . "</p></td>";
                                        echo "<td><p>" . $row['user'] . "</p></td>";
                                        echo "<td><p>" . $row['reason'] . "</p></td>";
                                        echo "<td><p>" . posneg($row['posneg']) . $row['amount'] . "</p></td>";
                                        echo "<td><a href='deletepayment.php?payment=" . $row['id'] . "'><p style='color: red; text-decoration-color: white;'>Verwijderen</p></a></td></tr>";
                                    }
                                    echo "</table>";
                                }

                                function posneg($posneg){
                                    switch($posneg){
                                        case "pos":
                                            return "+";
                                            break;
                                        case "neg":
                                            return "-";
                                            break;
                                    }
                                }
                                ?>
                            <h1 id="bestellingen">Bestellingen</h1>
            <?php
                                $query3 = "SELECT * FROM `kb_orders` ORDER BY date ASC";
                
                                $result3 = $conn->query($query3);
                                
                                if ($result3->num_rows > 0) {
                                    echo "<table class='table'><tr><th>Datum</th><th>ID</th><th>Gebruiker</th><th>Product ID</th><th>Productnaam</th><th>Acties</th></tr>";
                                    while($row = $result3->fetch_assoc()) {
                                        echo "<tr><td><p>" . $row['date'] . "</p></td>";
                                        echo "<td><p>" . $row['id'] . "</p></td>";
                                        echo "<td><p>" . $row['user'] . "</p></td>";
                                        echo "<td><p>" . $row['product'] . "</p></td>";
                                        echo "<td><p>" . $row['productName'] . "</p></td>";
                                        echo "<td><a href='deleteorder.php?order=" . $row['id'] . "'><p style='color: red; text-decoration-color: white;'>Verwijderen</p></a></td></tr>";
                                    }
                                    echo "</table>";
                                }else{
                                    echo "<p style='color: red; font-family: OpenSansRegular;'>Geen bestellingen.</p>";
                                }
                                ?>
                <h1 id="uitbetalen">Uitbetalen</h1>
                <div id="loginbox" style="height: auto;">
                    <?php
                       if(isset($_GET['error'])){
                        switch($_GET['error']){
                            case 0:
                                echo "<p style='font-family: OpenSansRegular; color: green;'>Gelukt!</p>";
                                break;
                        }
                    }
                    ?>
                    <form method="POST" action="payout.php">
                        <label>ID</label><br>
                        <input type="text" name="user" placeholder="12345" required><br>
                        <label>Kristallen</label><br>
                        <input type="text" name="amount" placeholder="6" required><br>
                        <label>Reden</label><br>
                        <input type="text" name="reason" placeholder="8 voor Engels" required><br>
                        <input type="submit" value="Uitbetalen">
                    </form>
                </div>
        <div class="bottomspacer">
        
        </div>    
    </div>
    </div>
    <div id="footer">
        Kristalbank 2020 &copy; Jasper Platenburg
    </div>
</body>

</html>