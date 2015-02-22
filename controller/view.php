<?php

new View();

class View{
	public function __construct(){
		$this->index();
	}

	function index(){
		include '../view/header.php';
		include '../view/pages/view.php';
		include '../view/footer.php';		
	}
}