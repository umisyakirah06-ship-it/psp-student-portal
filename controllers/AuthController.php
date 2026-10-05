<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Student.php';

class AuthController
{
    private $userModel;
    private $studentModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->studentModel = new Student();
    }

    public function login($username, $password)
    {
        $user = $this->userModel->login($username);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['username'] = $user['username'];

            return true;
        }

        return false;
    }

    public function register(
        $name,
        $ic,
        $program,
        $marks,
        $username,
        $password
    ) {
        if ($this->userModel->usernameExists($username)) {
            return "Username already exists.";
        }

        if (strlen($password) < 8) {
            return "Password must be at least 8 characters.";
        }

        if (!preg_match('/[A-Z]/', $password)) {
            return "Password must contain at least one uppercase letter.";
        }

        if (!preg_match('/[a-z]/', $password)) {
            return "Password must contain at least one lowercase letter.";
        }

        if (!preg_match('/[0-9]/', $password)) {
            return "Password must contain at least one number.";
        }

        $studentId = $this->studentModel->createStudent(
            $name,
            $ic,
            $program,
            $marks
        );

        if (!$studentId) {
            return "Failed to create student account.";
        }

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        if (!$this->userModel->register(
            $username,
            $hashedPassword,
            $studentId
        )) {
            return "Failed to create user account.";
        }

        return true;
    }
}

?>