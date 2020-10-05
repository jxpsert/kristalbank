<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: ../bank/login.php");
}else{
    header("Location: store.php");
}
?>