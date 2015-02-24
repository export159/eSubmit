<?php
new Index();

class Index{
	public function __construct(){
		session_start();
		if(!isset($_SESSION)){
			$_SESSION['id'] = null;
		}
		$this->index();

	}

	function index(){
		$session = $_SESSION['id'];
		include '../view/header.php';
		include '../view/pages/index.php';
		include '../view/footer.php';
	}
}