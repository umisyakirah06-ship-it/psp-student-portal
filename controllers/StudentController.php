<?php

require_once __DIR__ . '/../models/Student.php';

class StudentController
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student();
    }

    public function getAllStudents()
    {
        return $this->studentModel->getAllStudents();
    }

    public function createStudent($name, $ic, $program, $marks)
	{
	    return $this->studentModel->createStudent(
	        $name,
	        $ic,
	        $program,
	        $marks
	    );
	}

	public function updateStudent($id, $name, $ic, $program, $marks)
	{
	    return $this->studentModel->updateStudent(
	        $id,
	        $name,
	        $ic,
	        $program,
	        $marks
	    );
	}

	public function getStudentById($id)
	{
	    return $this->studentModel->getStudentById($id);
	}

	public function deleteStudent($id)
	{
	    return $this->studentModel->deleteStudent($id);
	}

}

?>