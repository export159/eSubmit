<?php
new Index();

class Index{
	public function __construct(){
		$this->index();
	}

	function index(){
		include '../view/header.php';
		include '../view/pages/index.php';
		include '../view/footer.php';
	}
}