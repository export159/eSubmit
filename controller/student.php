<?php
require_once '../model/model_student.php';

new Student();

class Student{
	private $model_student;
	public function __construct(){
		session_start();
		$this->model_student = new Model_student();
		if($_GET['action'] == 'login')
			$this->login();
		else if($_GET['action'] == 'signup')
			$this->signup();
	}

	function login(){
		$student_id = $_POST['student_number'];

		$id = $this->model_student->login($student_id);

		if($id != null){
			echo 'success'.$id;
		}
	}
}