<?php
session_start();
if($_SESSION['acctype'] != 2){
    header('Location: ../index.php');
}

$ordertodelete = $_GET['order'];

$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
$sql = "DELETE FROM `kb_orders` WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ordertodelete);
$stmt->execute();
header('Location: index.php#bestellingen');

?>