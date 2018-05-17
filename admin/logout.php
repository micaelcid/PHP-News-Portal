<?php
session_start();
session_destroy();
setcookie("login", "");
setcookie("senha", "");
header("location:login.php");
?>