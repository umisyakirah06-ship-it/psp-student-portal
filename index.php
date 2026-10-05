<?php

session_start();

require_once "controllers/AuthController.php";

$error = "";

if (isset($_SESSION['student_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {

        $error = "Please enter username and password.";

    } else {

        $auth = new AuthController();

        if ($auth->login($username, $password)) {

            header("Location: dashboard.php");
            exit();

        } else {

            $error = "Invalid username or password.";

        }
    }
}

require_once "views/login.php";

?>