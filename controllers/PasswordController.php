<?php

require_once __DIR__ . '/../models/Student.php';

class PasswordController
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student();
    }

    public function changePassword(
        $studentId,
        $oldPassword,
        $newPassword,
        $confirmPassword
    ) {
        $errors = [];

        if (
            empty($oldPassword) ||
            empty($newPassword) ||
            empty($confirmPassword)
        ) {
            $errors[] = "All password fields are required.";
            return $errors;
        }

        if (strlen($newPassword) < 8) {
            $errors[] = "New password must be at least 8 characters.";
            return $errors;
        }

        if (!preg_match('/[A-Z]/', $newPassword)) {
            $errors[] = "New password must contain at least one uppercase letter.";
            return $errors;
        }

        if (!preg_match('/[a-z]/', $newPassword)) {
            $errors[] = "New password must contain at least one lowercase letter.";
            return $errors;
        }

        if (!preg_match('/[0-9]/', $newPassword)) {
            $errors[] = "New password must contain at least one number.";
            return $errors;
        }

        if ($newPassword !== $confirmPassword) {
            $errors[] = "New password and confirm password do not match.";
            return $errors;
        }

        $user = $this->studentModel->getStudentPassword($studentId);

        if (
            !$user ||
            !password_verify($oldPassword, $user['password'])
        ) {
            $errors[] = "Current password is incorrect.";
            return $errors;
        }

        $hashedPassword = password_hash(
            $newPassword,
            PASSWORD_DEFAULT
        );

        $updated = $this->studentModel->updatePassword(
            $studentId,
            $hashedPassword
        );

        if (!$updated) {
            $errors[] = "Failed to update password.";
        }

        return $errors;
    }
}

?>