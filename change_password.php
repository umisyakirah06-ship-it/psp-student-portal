<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

require_once "controllers/PasswordController.php";

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldPassword = $_POST['old_password'] ?? "";
    $newPassword = $_POST['new_password'] ?? "";
    $confirmPassword = $_POST['confirm_password'] ?? "";

    $passwordController = new PasswordController();

    $errors = $passwordController->changePassword(
        $_SESSION['student_id'],
        $oldPassword,
        $newPassword,
        $confirmPassword
    );

    if (empty($errors)) {

        $message = "Password updated successfully.";

    } else {

        $error = $errors[0];
    }
}

require_once "views/change_password.php";

?>