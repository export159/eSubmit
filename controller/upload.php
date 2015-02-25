<?php
require_once '../model/model_student.php';
require_once '../model/model_files.php';

new Upload();

class Upload{
	private $model_student;
	private $model_files;
	public function __construct(){
		session_start();
		$this->model_student = new Model_student();
		$this->model_files = new Model_files();
		if($_SESSION['id'] != null){
			if(!isset($_GET['action'])){
				$this->index();
			}else{
				$this->submit();
			}
		}else{
			echo 'wahahaha';
		}
	}

	function index(){
		$session = $_SESSION['id'];
		include '../view/header.php';
		include '../view/pages/upload.php';
		include '../view/footer.php';
	}

	function submit(){
		$info['student_id'] = $_SESSION['id'];
		$info['file'] = $_FILES['document'];
		$info['schedule'] = $_POST['schedule'];
		$info['description'] = $_POST['description'];
		$info['destination'] = $this->generateFilePath($info['file'], $_SESSION['id']);
		$info['date_submitted'] = date("m/d/y : H:i:s", time());
		
		$this->model_files->upload_file($info);

		header("location: upload.php");;
	}

	function generateFilePath($file, $id){
		$name = $this->model_student->getStudent($id);
        $source_file = '../files/'.$name['last_name'].', '.$name['first_name'].' '.$name['middle_name'].'/'.$file['name'];
        move_uploaded_file($file['tmp_name'], $source_file);
        
        return $source_file;
    }
}