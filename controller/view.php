<?php
require_once '../model/model_files.php';

new View();

class View{
	private $model_files;
	public function __construct(){
		$this->model_files = new model_files();

		$this->index();

	}

	function index(){
		$files = $this->model_files->view_submitted_files();
		include '../view/header.php';
		include '../view/pages/view.php';
		include '../view/footer.php';		
	}
}