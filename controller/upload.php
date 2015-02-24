<?php

new Upload();

class Upload{
	public function __construct(){
		session_start();

		if($_SESSION['id'] != null){
			$this->index();
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
}