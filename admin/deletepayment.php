<?php
session_start();
if($_SESSION['acctype'] != 2){
    header('Location: ../index.php');
}

$paymenttodelete = $_GET['payment'];

$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
$sql = "DELETE FROM `kb_payments` WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $paymenttodelete);
$stmt->execute();
header('Location: index.php#betalingen');

?>