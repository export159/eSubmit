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
			}else if($_GET['action'] == 'submit'){
				$this->submit();
			}else if($_GET['action'] == 'resubmit'){
				$this->resubmit();
			}else if($_GET['action'] == 'delete'){
				$this->delete();
			}else if($_GET['action'] == 'check'){
				$this->checkFIle();
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
		$info['destination'] = $this->generateFilePath($info['file']['name'], $_SESSION['id'], $info['schedule']);
		$info['date_submitted'] = date("m/d/y : H:i:s", time());

		if($this->checkFile($info['schedule'], $info['destination'])){
		//if($this->checkFile($info['schedule'], $info['file']['name'])){
			echo 'false';
		}else{
			move_uploaded_file($info['file']['tmp_name'], $info['destination']);
			$this->model_files->upload_file($info);
			echo 'ok';
		}
		//header("location: upload.php");;
	}
	function checkFile($schedule, $path){
	//function checkFile($schedule, $filename){

		
		//$path = $this->generateFilePath($filename, $_SESSION['id'], $schedule);

		if(file_exists($path)){
			return true;
		}else{
			return false;
		}
	}

	function resubmit(){
		$info['student_id'] = $_SESSION['id'];
		$info['file'] = $_FILES['document'];
		$info['schedule'] = $_POST['schedule'];
		$info['description'] = $_POST['description'];
		$info['destination'] = $this->generateFilePath($info['file'], $_SESSION['id'], $info['schedule']);
		$info['date_submitted'] = date("m/d/y : H:i:s", time());

		$this->model_files->replace_file($info);

		return true;
	}

	function delete(){
		$id = $_GET['id'];
		$path = $this->model_files->get_file_where_id($id);
		$this->delete_file($path);
		$this->model_files->remove_file($id);
	}


	function generateFilePath($filename, $id, $schedule){
		$name = $this->model_student->getStudent($id);
        $source_file = '../files/'.str_replace(':', ' ', $schedule).'/'.$name['last_name'].', '.$name['first_name'].' '.$name['middle_name'].'/'.$filename;
        $this->check_folder($name, $schedule);
        //move_uploaded_file($file['tmp_name'], $source_file);
        
        return $source_file;
    }

    function delete_file($file_path){
    	unlink($file_path);

    }

   	function check_folder($name, $schedule){
   		if(!file_exists('../files/'.str_replace(':', ' ', $schedule))){
   			mkdir('../files/'.str_replace(':', ' ', $schedule));
   			mkdir('../files/'.str_replace(':', ' ', $schedule).'/'.$name['last_name'].', '.$name['first_name'].' '.$name['middle_name']);
   			
   		}else{
   			if(!file_exists('../files/'.str_replace(':', ' ', $schedule).'/'.$name['last_name'].', '.$name['first_name'].' '.$name['middle_name'])){
   				mkdir('../files/'.str_replace(':', ' ', $schedule).'/'.$name['last_name'].', '.$name['first_name'].' '.$name['middle_name']);	
   			}
	
   		}
   		
   	}
}