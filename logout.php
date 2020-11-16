<?php 
session_start();
if(!isset($_SESSION["login"])){
header("location:login.php");
} else {
session_unset();
session_destroy();
header("location:http://localhost/");}
?>
