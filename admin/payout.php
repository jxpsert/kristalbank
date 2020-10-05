<?php
session_start();
if($_SESSION['acctype'] != 2){
    header('Location: ../index.php');
}

$userToPayOut = $_POST['user'];
$amountToPayOut = $_POST['amount'];
$reason = $_POST['reason'];

$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
$sql = "INSERT INTO `kb_payments` (user, amount, posneg, reason, date) VALUES (?,?,'pos',?,NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $userToPayOut, $amountToPayOut, $reason);
$stmt->execute();

$sql1 = "SELECT balance FROM `kb_useraccounts` WHERE id=?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $userToPayOut);
$stmt1->execute();
$result = $stmt1->get_result();
$resultParsed = $result->fetch_assoc();

$sql2 = "UPDATE `kb_useraccounts` SET balance=? WHERE id=?";
$stmt2 = $conn->prepare($sql2);
if(!$stmt2){
    echo $conn->error;
}
$newBalance = $resultParsed['balance'] + $amountToPayOut;
$stmt2->bind_param("ii", $newBalance, $userToPayOut);
$stmt2->execute();

$conn->close();

header('Location: index.php#uitbetalen?error=0');
?>