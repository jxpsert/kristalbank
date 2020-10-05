<?php
session_start();
if($_SESSION['acctype'] != 2){
    header('Location: ../index.php');
}

$usertodelete = $_GET['user'];

$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
$sql = "DELETE FROM `kb_useraccounts` WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usertodelete);
$stmt->execute();
header('Location: index.php#gebruikers');

?>