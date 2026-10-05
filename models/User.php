<?php

require_once __DIR__ . '/../config/database.php';

class User
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function login($username)
    {
        $sql = "SELECT * FROM users WHERE username = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function usernameExists($username)
    {
        $sql = "SELECT id FROM users WHERE username = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    public function register($username, $password, $studentId)
    {
        $sql = "INSERT INTO users (username, password, student_id)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $password, $studentId);

        return $stmt->execute();
    }
}

?>