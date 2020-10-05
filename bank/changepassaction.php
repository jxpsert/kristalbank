<?php
session_start(); 

$userid = $_SESSION['userid'];
$conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');

$passwd = md5($_POST['newpass']);

$query = "UPDATE `kb_useraccounts` SET password = '$passwd' WHERE id = '$userid'";
if($conn->query($query) === FALSE){
    header("Location: changepass.php?changed=0");
}else{
    header("Location: changepass.php?changed=1");
}

?>