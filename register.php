<?php

session_start();

require_once "controllers/AuthController.php";

$error = "";
$success = "";

if (isset($_SESSION['student_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $ic = trim($_POST['ic']);
    $program = trim($_POST['program']);
    $marks = trim($_POST['marks']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (
        empty($name) ||
        empty($ic) ||
        empty($program) ||
        empty($marks) ||
        empty($username) ||
        empty($password) ||
        empty($confirmPassword)
    ) {
        $error = "Please fill in all fields.";

    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";

    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";

    } elseif (!is_numeric($marks) || $marks < 0 || $marks > 100) {
        $error = "Marks must be between 0 and 100.";

    } else {

        $auth = new AuthController();

        $result = $auth->register(
            $name,
            $ic,
            $program,
            $marks,
            $username,
            $password
        );

        if ($result === true) {
            $success = "Account created successfully. You can now login.";
        } else {
            $error = $result;
        }
    }
}

require_once "views/register.php";

?>