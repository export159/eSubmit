<?php
require_once '../model/model_student.php';

new Student();

class Student{
	private $model_student;
	public function __construct(){
		session_start();
		$this->model_student = new Model_student();
		if($_SESSION['id'] == "" || $_GET['action'] == 'logout'){
			if($_GET['action'] == 'login')
				$this->login();
			else if($_GET['action'] == 'signup')
				$this->signup();
			else if($_GET['action'] == 'logout')
				$this->logout();
		}else{
			echo $_SESSION['id'];
			echo 'wahaha';
		}
	}

	function login(){
		$student_id = $_POST['student_number'];

		$id = $this->model_student->login($student_id);

		if($id != null){
			$_SESSION['id'] = $id;
		}
		header("location: index.php");
	}
	function signup(){
		$credentials = $_POST;

		if($this->model_student->add_student($credentials)){
			$id = $this->model_student->login($credentials['student_number']);

			if($id != null){
				$_SESSION['id'] = $id;
			}
		}

		header("location: index.php");	

	}

	function logout(){
		session_unset('id');
		header("location: index.php");
	}
}