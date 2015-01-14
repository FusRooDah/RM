<?php
include(__DIR__ . "/config.php");
unset($_SESSION['user']);
header('Location: index.php');
?>