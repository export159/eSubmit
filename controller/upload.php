<?php

new Upload();

class Upload{
	public function __construct(){
		$this->index();
	}

	function index(){
		include '../view/header.php';
		include '../view/pages/upload.php';
		include '../view/footer.php';
	}
}