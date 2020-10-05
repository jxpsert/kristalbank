<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $pass = md5($_POST['pass']);

    $conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
    $sql1 = "INSERT INTO `kb_useraccounts` (accType, fName, lName, email, password, balance, class) VALUES (0, ?, ?, ?, ?, 0, ?)";

    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("sssss", $fname, $lname, $email, $pass, $class);
    $stmt->execute();
    $conn->close();
   header('Location: login.php?error=0');
?>