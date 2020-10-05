<?php
session_start();

$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');

if(!isset($_SESSION['loggedin'])){
    header('Location: ../bank/login.php');
}

$getcurrentbalance = $conn->prepare("SELECT * FROM `kb_useraccounts` WHERE id=? LIMIT 1");
$getcurrentbalance->bind_param("i", $_SESSION['userid']);
//$getcurrentbalance->execute();
if(!$getcurrentbalance->execute()){
    echo $conn->error;
}
$balanceresults = $getcurrentbalance->get_result();
$currentbalance = $balanceresults->fetch_assoc();

$getproduct = $conn->prepare("SELECT * FROM `kb_storeproducts` WHERE id=? LIMIT 1");
if(!$getproduct){
    echo $conn->error;
}
$getproduct->bind_param("i", $_GET['p']);
$getproduct->execute();
$productresult = $getproduct->get_result();
$product = $productresult->fetch_assoc();
$productprice = $product['price'];

$newbalance = $currentbalance['balance'] - $productprice;

if($newbalance >= 0){
    $reason = $product['name'] . " gekocht";
    $addpayment = $conn->prepare("INSERT INTO `kb_payments` (user, amount, posneg, reason, date) VALUES (?, ?, 'neg', ?, NOW())");
    $addpayment->bind_param("iis", $_SESSION['userid'], $productprice, $reason);
    $addpayment->execute();

    $setnewbalance = $conn->prepare("UPDATE `kb_useraccounts` SET balance=? WHERE id=?");
    $setnewbalance->bind_param("ii", $newbalance, $_SESSION['userid']);
    $setnewbalance->execute();

    $createorder = $conn->prepare("INSERT INTO `kb_orders` (user, product, productName, productDesc, date) VALUES (?,?,?,?, NOW())");
    $createorder->bind_param("iiss", $_SESSION['userid'], $product['id'], $product['name'], $product['description']);
    $createorder->execute();

    if($addpayment && $setnewbalance && $createorder){
        header('Location: thankyou.php');
    }else{
        echo "Fuck.";
    }
}else{
    header('Location: store.php?error=1');
}


?>