<?php
include('connect.php');
session_start();
$_SESSION['username'] = "Rittik Goyal";
echo $_SESSION['username'];

session_unset();

?>