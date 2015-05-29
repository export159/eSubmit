<?php
require_once '../model/model_student.php';
require_once '../model/model_teacher.php';

new Users();

class Users{
	private $model_student;
	public function __construct(){
		session_start();
		$this->model_student = new Model_student();
		$this->model_teacher = new Model_teacher();
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
		$id = null;
		$id = $this->model_student->login($student_id);

		if($id != null){
			$_SESSION['id'] = $id;
		}
		return $id;
		//header("location: index.php");
	}
	function signup(){
		$credentials = $_POST;
		$status = null;
		if($_POST['type'] == 'student'){
			$status = $this->model_student->add_student($credentials);
		}else if($_POST['type'] == 'teacher'){
			$status = $this->model_teacher->add_teacher($credentials);
		}
		if($status){
			$id = 0;
			if($_POST['type'] == 'student'){
				$id = $this->model_student->login($credentials['number']);
				$_SESSION['type'] = 'student';
			}else if($_POST['type'] == 'teacher'){
				$id = $this->model_teacher->login($credentials['number']);
				$_SESSION['type'] = 'teacher';
			}
			

			if($id != null){
				$_SESSION['id'] = $id;
			}
			echo true;
		}else{
			echo false;
		}

	}

	function logout(){
		session_unset('id');
		session_unset('teacher');
		header("location: index.php");
	}
}