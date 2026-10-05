<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

require_once "controllers/StudentController.php";

$studentController = new StudentController();

$students = $studentController->getAllStudents();

require_once "views/students/index.php";

?>