<?php

require_once __DIR__ . '/../config/database.php';

class Student
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    // Get student profile
    public function getStudentById($id)
    {
        $sql = "SELECT id, name, ic, program, marks, profile_picture
                FROM students
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Update current student's profile picture
    public function updateProfilePicture($id, $filename)
    {
        $sql = "UPDATE students
                SET profile_picture = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $filename, $id);

        return $stmt->execute();
    }

    // Get current student's existing profile picture
    public function getProfilePicture($id)
    {
        $sql = "SELECT profile_picture
                FROM students
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Get current student's password
    public function getStudentPassword($id)
    {
        $sql = "SELECT password
                FROM users
                WHERE student_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Update student's password
    public function updatePassword($id, $password)
    {
        $sql = "UPDATE users
                SET password = ?
                WHERE student_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $password, $id);

        return $stmt->execute();
    }

    // Get all students
    public function getAllStudents()
    {
        $sql = "SELECT id, name, ic, program, marks
                FROM students
                ORDER BY id ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Create new student
    public function createStudent($name, $ic, $program, $marks)
    {
        $sql = "INSERT INTO students (name, ic, program, marks)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $ic, $program, $marks);

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        }

        return false;
    }

    // Update student
    public function updateStudent($id, $name, $ic, $program, $marks)
    {
        $sql = "UPDATE students
                SET name = ?, ic = ?, program = ?, marks = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "sssii",
            $name,
            $ic,
            $program,
            $marks,
            $id
        );

        return $stmt->execute();
    }

    // Delete student
    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}

?>