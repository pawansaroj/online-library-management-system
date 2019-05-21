<?php
session_start();
unset($_SESSION['librarian']);

header('location:login.php');

?>
