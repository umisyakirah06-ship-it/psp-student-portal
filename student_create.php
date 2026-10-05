<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

require_once "controllers/StudentController.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $ic = trim($_POST['ic']);
    $program = trim($_POST['program']);
    $marks = trim($_POST['marks']);

    if (empty($name) || empty($ic) || empty($program) || $marks === "") {

        $error = "All fields are required.";

    } elseif (!is_numeric($marks) || $marks < 0 || $marks > 100) {

        $error = "Marks must be between 0 and 100.";

    } else {

        $studentController = new StudentController();

        $result = $studentController->createStudent(
            $name,
            $ic,
            $program,
            $marks
        );

        if ($result) {
            header("Location: students.php");
            exit();
        } else {
            $error = "Failed to add student.";
        }
    }
}

require_once "views/students/create.php";
?>