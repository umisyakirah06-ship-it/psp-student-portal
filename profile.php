<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

require_once "controllers/ProfileController.php";

$profileController = new ProfileController();
$studentId = (int) $_SESSION['student_id'];
$uploadMessage = '';
$uploadSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $uploadResult = $profileController->uploadProfilePicture(
        $studentId,
        $_FILES['profile_picture']
    );

    if ($uploadResult === true) {
        $uploadSuccess = true;
        $uploadMessage = 'Profile picture uploaded successfully.';
    } else {
        $uploadMessage = $uploadResult;
    }
}

$student = $profileController->getProfile($studentId);

if (!$student) {
    echo "Student profile not found.";
    exit();
}

require_once "views/profile.php";

?>