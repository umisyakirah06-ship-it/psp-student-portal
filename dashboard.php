<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);

require_once "views/dashboard.php";

?>