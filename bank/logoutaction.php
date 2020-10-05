<?php
session_start();
session_unset($_SESSION['loggedin']);
session_destroy();
header("Location: ../index.php");
?>