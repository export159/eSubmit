<?php
require_once '../model/model_files.php';

new View();

class View{
	private $model_files;
	public function __construct(){
		session_start();
		$this->model_files = new model_files();

		if($_SESSION['id'] != null){
			$this->index();
		}else{
			echo 'wahahaha';
		}

	}

	function index(){
		$session = $_SESSION['id'];
		$files = $this->model_files->view_submitted_files();
		include '../view/header.php';
		include '../view/pages/view.php';
		include '../view/footer.php';		
	}
}