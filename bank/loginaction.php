<?php
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];

$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
$query = "SELECT * FROM `kb_useraccounts` WHERE email = '$user'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['password'] == md5($pass)){
            $_SESSION['loggedin'] = true;
            $_SESSION['fullname'] = $row['fName'] . " " . $row['lName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['class'] = $row['class'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['secret'] = $row['password'];
            $_SESSION['acctype'] = $row['accType'];
            header("Location: dash.php");
        }else{
            header("Location: login.php?error=1");
        }
    }
}else{
    header("Location: login.php?error=2");
}
?>