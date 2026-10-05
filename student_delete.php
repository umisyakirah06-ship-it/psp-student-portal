<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

require_once "controllers/StudentController.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: students.php");
    exit();
}

$id = (int) $_GET['id'];

$studentController = new StudentController();

$studentController->deleteStudent($id);

header("Location: students.php");
exit();

?>