<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}else{
    header("Location: dash.php");
}
?>